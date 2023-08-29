@extends("layout.master-registry")

@section("title", "Inscription")

@section('content')
                <form action="{{ route('storeUser') }}" method="POST" enctype="multipart/form-data">
                    {{-- @if (session("success"))
                        <div class="alert alert-secondary text-center" role="alert">
                            <strong>Message success</strong> <br>{{ session("success") }}
                        </div>
                    @endif --}}
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Photo</label>
                        <input type="file" name="avatar" class="form-control" placeholder="Choisir une photo">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nom</label>
                        <input type="text" value="{{ old('lastname') }}" name="name" class="form-control" placeholder="Saisir votre Nom">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" value="{{ old('email') }}" name="email" class="form-control" placeholder="Saisir votre mail">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" placeholder="Saisir votre mot de passe">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirmez mot de passe</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmez votre mot de passe">
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Enrégistrer</button>
                </form>
                <p>Vous avez déjà un compte ? <a href="{{ route('signin') }}">Cliquez ici</a></p>
@stop