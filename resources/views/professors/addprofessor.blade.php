@extends('layout.master')
@section('title', 'StudentList')

@section('content')
<div class="container">
@if (isset($id))
    <div class="mt-5 me-3 ms-3 d-flex">
        <form method="POST" action="{{ route("saveAffectationProfs", ['id'=>$id]) }}" class="container d-flex flex-column">
            @csrf
            <h3 class="text-muted text-center">{{ $id->lastname }} {{ $id->firstname }}</h3>
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Message !</strong> <br> {{ session("message") }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 @endif
    
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
                
                <label for="" class="form-label">Cours</label>
                @if ($courses)
                    <select name="course_id[]" class="form-select" id="multiple-select-field" aria-label="Default select example" multiple>
                        
                        @foreach ($courses as $course)
                            <option value="{{ $course['id'] }}">{{ $course['name'] }}</option>
                        @endforeach
                    </select> 
                @endif
    
                <button class="btn btn-success mt-3 " type="submit">Enregistrer</button>
        </form>

        <table class="table table-hover">
            <thead class="bg-dark">
                <tr>
                  <th>ID Affectation</th>
                  <th>Cours</th>
                </tr>
            </thead>
            @if (isset($affectProfs))
            <tbody>
                @foreach ($affectProfs as $affectation=>$item)
                
                <tr>
                    <th>
                        @foreach ($item as $ids)
                            {{ $ids->id }}
                        @endforeach
                    </th>
                    <td>
                        <ul style="list-style: none">
                            @foreach ($item as $course)
                            <li>
                                <button class="btn btn-light mt-1" data-toggle="tooltip" data-placement="right" title="Programmation">
                                    {{ $course->cours->name }}
                                </button>
                                <button style="padding: 2px 8px; font-size: 10px;" type="button" class="btn btn-danger">Supprimer</button>
                            </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
            @endif
            
        </table>
    </div>

       @else

       <form method="POST" action="{{ route("addProfessorStore") }}" class="container">
        @csrf
        <div class="mt-5 me-5 ms-5">
            <h3 class="text-center">Vous pouvez saisir les informations du professeur ici !</h3>
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
                <label for="" class="form-label">Nom</label>
                <input type="text" value="{{ old('lastname') }}" name="lastname" class="form-control" placeholder="Saisir le nom">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Prénom</label>
                <input type="text" value="{{ old('firstname') }}" name="firstname" class="form-control" placeholder="Saisir le prénom">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Téléphone</label>
                <div class="input-group">
                    <span class="input-group-text">+229</span>
                    <input type="text" value="{{ old('call') }}" name="call" class="form-control" placeholder="Saisir le numéro de téléphone">
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Addresse</label>
                <input type="text" value="{{ old('address') }}" name="address" class="form-control" placeholder="Saisir l'addresse">
            </div>
            <button class="btn btn-success mt-3 " type="submit">Enregistrer</button>
        </div> 
    </form>
    @endif
</div>
@endsection