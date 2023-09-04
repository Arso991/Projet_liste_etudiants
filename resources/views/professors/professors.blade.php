@extends('layout.master')
@section('title', 'StudentList')

@section('content')
<div class="me-5 ms-5">
    <a href="{{ route('addProfessor') }}" class="btn btn-primary me-2">Ajouter un enseignant</a>

    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Enrégistrement effectué !</strong> <br> {{ session("message") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table table-hover mt-2">
        <thead class="bg-dark">
            <tr>
              <th>Nom et prénoms</th>
              <th>Téléphone</th>
              <th>Adresse</th>
              <th>Actions</th>
            </tr>
        </thead>
        @if ($professors)
        <tbody>
            @foreach ($professors as $element)
            <tr>
                <td>{{ $element["lastname"] }} {{ $element["firstname"] }}</td>
                <td>{{ $element["call"] }}</td>
                <td>{{ $element["address"] }}</td>
                <td>
                  <div>
                      <button type="button" class="btn btn-warning me-2"><span class="mdi mdi-grease-pencil"></span></button>
                      <button type="button" class="btn btn-danger me-2"><span class="mdi mdi-trash-can"></span></button>
                      <a href="{{ route('professorCourse', ['id'=>$element['id']]) }}" type="button" class="btn btn-primary">Attribuer cours</a>
                  </div>
              </td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
</div>
@endsection