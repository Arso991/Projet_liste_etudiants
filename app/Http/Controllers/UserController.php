<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function login(){
        return view('signin');
    }

    public function register(){
        return view('signup');
    }

    public function store(Request $request){
        $data = $request->all();


        $request->validate([
            "avatar" => "required|mimes:jpg,jpeg,png",
            "name" => "required|min:2",
            "email" => array(
                "required",
                "unique:users",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
            ),
            "password" => array(
                "required",
                "confirmed:password_confirmation",
                "regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z])(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,].{8,}$/",
            )
            ]);

            $image = null;
        if($request->hasFile("avatar")){
            $image = $request->file("avatar")->store("avatar");
        }

        $save = User::create([
            "avatar" => $image,
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => Hash::make($data['password'])
        ]);

        $host = URL::temporarySignedRoute('verifyEmail', now()->addMinute(30), ['email' => $data['email']]);

        Mail::send('mailconfirm', ['host' => $host, $data['name']], function($message) use($data){

            $config = config('mail');

            $name = $data['name'];

            $message->subject("Verification de votre inscription")
                    ->from($config['from']['address'], $config['from']['name'])
                    ->to($data['email'], $name);
        });

        return redirect()->back()->with("isValidate", "Un mail vous est envoyé pour activer votre compte !");
    }

    public function verify(Request $request, $email){
        $user = User::where('email', $email)->first();

        if(!$user){
            abort(404);
        }

        if(!$request->hasValidSignature()){
            abort(404);
        }

        $user->update([
            "email_verified" => true,
            "email_verified_at" => now()
        ]);

        return redirect()->route('signin')->with("isValidate", "Compte confirmer ! Vous pouvez vous connecter pour acceder à votre compte");
    }

    //
}
