<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        Mail::send('mailconfirm', ['host' => $host, 'name' => $data['name']], function($message) use($data){

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

    public function authenticate(Request $request){

        $data = $request->all();

        $users = Auth::attempt([
            "email" => $data['email'],
            "password" => $data['password'],
            "email_verified" => true
        ]);

        if($users){
            return redirect()->route('index');
        }else{
            return redirect()->back()->with("error", "[Combinaison email/mot de passe invalide !]");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('signin');
    }

    public function forgot(){
        return view('forgotpassword');
    }

    public function setpassword(Request $request){
        $data = $request->all();

        $request->validate([
            'email' => array(
                "required",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/"
            )
            ]);

            $email = $data['email'];

            $exist = User::where('email', $email)->exists();

            if(!$exist){
                return redirect()->back()->with('error', 'Email invalide !');
            }else{
                $link = URL::temporarySignedRoute('resetPassword', now()->addMinutes(20),['email'=>$email]);

                Mail::send('mailpassword', ['link'=>$link, 'email'=>$email], function($message) use($data){
                    $config = config('mail');

                    $message -> subject('Reinitialisation de mot de passe !')
                    ->from($config['from']['address'], $config['from']['name'])
                    ->to($data['email']);

                    return redirect()->back()->with("validate", "Un mail a ete envoyé pour reinitialiser votre mot de passe");
                });
            }
    }

    public function resetpassword(Request $request, $email){
        $consumer = User::where('email', $email)->first();

        if(!$consumer){
            abort(404);
        }

        if(!$request->hasValidSignature()){
            return redirect()->route('forgotPassword')->with('failed', 'Votre lien a expiré, veuillez reéssayer');
        }

        return view('resetPassword', compact('email'));
    }

    public function updatePassword(Request $request, $email){
        $consumer = User::where('email', $email)->first();

        if(!$consumer){
            abort(404);
        }

        if(!$request->hasValidSignature()){
            return redirect()->route('forgotPassword')->with('failed', 'Votre lien a expiré, veuillez reéssayer');
        }

        $data = $request->all();

        $request->validate([
            'password' => array(
                "required",
                "regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z])(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,].{8,}$/",
                "confirmed:password_confirmation"
            )
        ]);

        $consumer->update([
            "password" => Hash::make($data['password'])
        ]);

        return redirect()->route('signin')->with('verified', 'Connectez vous avec votre nouveau mot de passe.');
    }
    //
}
