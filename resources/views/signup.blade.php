@extends("layout.master_sign")

@section("title", "Inscription")

@section('content')
                <form action="{{ route('userStore') }}" method="POST" enctype="multipart/form-data">
                    @if (session("isValidate"))
                        <div class="alert alert-secondary text-center" role="alert">
                            <strong>Message success</strong> <br>{{ session("isValidate") }}
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger mt-3" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Photo</label>
                        <input type="file" name="avatar" class="form-control" placeholder="Choisir une photo">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nom</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Saisir votre Nom">
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