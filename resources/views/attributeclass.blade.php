@extends('layout.master')
@section('title', 'StudentList')

@section('content')
<div class="mt-5 me-3 ms-3 d-flex">

    <table class="table table-hover">
        <thead class="bg-dark">
            <tr>
              <th>ID Affectation</th>
              <th>Nom et Prenom(s) de l'étudiant</th>
              <th>Cours</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>Isagi Yoichi</td>
                <td>
                    <ul>
                        <li>PHP</li>
                        <li>Java</li>
                        <li>Node.js</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>1</th>
                <td>Isagi Yoichi</td>
                <td>
                    <ul>
                        <li>PHP</li>
                        <li>Java</li>
                        <li>Node.js</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>1</th>
                <td>Isagi Yoichi</td>
                <td>
                    <ul>
                        <li>PHP</li>
                        <li>Java</li>
                        <li>Node.js</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>

    <form method="POST" action="{{ route("affectStore") }}" class="container">
        @csrf
        <div class="me-5 ms-5">

            {{-- @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}
            <label for="" class="form-label">Etudiant</label>
            @if ($students)
                <select name="name" class="form-select " aria-label="Default select example">
                    <option selected>Selectionner l'étudiant</option>
                    @foreach ($students as $student)
                    <option value="{{ $student['id'] }}">{{ $student['nom'] }} {{ $student['prenom'] }}</option>
                    @endforeach
                </select>
            @endif
            
            <label for="" class="form-label">Categorie</label>
            @if ($courses)
                <select name="courses[]" class="form-select" id="multiple-select-field" aria-label="Default select example" multiple>
                    <option selected>Selectionner le ou les cours</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course['id'] }}">{{ $course['name'] }}</option>
                    @endforeach
                </select> 
            @endif

            <button class="btn btn-success mt-3 " type="submit">Enregistrer</button>
        </div> 
    </form>
</div>
@endsection