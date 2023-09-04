@extends("layout.master_sign")

@section("title", "Authentification")

@section('content')
                <form action="{{ route("updatePassword", ['email' => $email]) }}" method="POST" autocomplete="off">
                    
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" placeholder="Saisir votre mot de passe">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmer votre mot de passe">
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Connexion</button>
                </form>
@stop