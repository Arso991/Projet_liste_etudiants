@extends("layout.master_sign")

@section("title", "Authentification")

@section('content')
                <form action="{{ route("setPassword") }}" method="POST" autocomplete="off">
                    @if (session("error"))
                        <div class="alert alert-danger text-center" role="alert">
                            <strong>Message error</strong> <br>{{ session("error") }}
                        </div>
                    @endif
                    @if (session("validate"))
                        <div class="alert alert-secondary text-center" role="alert">
                            <strong>Message success</strong> <br>{{ session("validate") }}
                        </div>
                    @endif
                    @if (session("failed"))
                        <div class="alert alert-danger text-center" role="alert">
                            <strong>Message error</strong> <br>{{ session("failed") }}
                        </div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Saisir votre email">
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Connexion</button>
                </form>
                <p>Vous n'avez pas un compte ? <a href="{{ route('signup') }}">Cliquez ici</a></p>
@stop