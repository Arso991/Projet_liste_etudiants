@extends('layout.master')
@section('title', 'StudentList')

@section('content')
<div class="container">
    <form action="{{ route('addCategory') }}" method="POST" style="width: 500px" class="container">
        @csrf
        <div class="d-flex align-items-center">
            <button type="submit" style="white-space: nowrap" class="btn btn-primary me-2">Ajouter une catégorie</button>
            <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Saisir le nom de la catégorie">
        </div>
    </form>

    <form method="POST" action="{{ route("addClassStore") }}" class="container">
        @csrf
        <div class="mt-5 me-5 ms-5">
            <h2 class="text-center muted">Vous pouvez ajouter un cours ici</h2>

            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="mb-3">
                <label for="" class="form-label">Intitulé</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Saisir le nom du cours">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Horaire</label>
                <input type="number" value="{{ old('schedule') }}" name="schedule" class="form-control" placeholder="Saisir la masse horaire">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Coéfficient</label>
                <input type="text" value="{{ old('coefficient') }}" name="coefficient" class="form-control" placeholder="Saisir le coefficient">
            </div>
            <label for="" class="form-label">Categorie</label>
            @if ($category)
            <select name="category_id" class="form-select" aria-label="Default select example">
                <option selected>Selectionner une catégorie</option>
                @foreach ($category as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>
            @endif
        </div> 
        <button class="btn btn-success mt-3 " type="submit">Enregistrer</button>
    </form>
</div>
@endsection