@extends("layout.master_sign")

@section("title", "Authentification")

@section('content')
                <form action="{{ route("authenticate") }}" method="POST" autocomplete="off">
                    @if (session("error"))
                        <div class="alert alert-danger text-center" role="alert">
                            <strong>Message error</strong> <br>{{ session("error") }}
                        </div>
                    @endif
                    @if (session("verified"))
                        <div class="alert alert-danger text-center" role="alert">
                            <strong>Message error</strong> <br>{{ session("verified") }}
                        </div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Saisir votre email">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" placeholder="Saisir votre mot de passe">
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Connexion</button>
                </form>
                <p>Vous n'avez pas un compte ? <a href="{{ route('signup') }}">Cliquez ici</a></p>
                <p>Mot de passe oublié ? <a href="{{ route('forgotPassword') }}">Cliquez ici</a></p>
@stop