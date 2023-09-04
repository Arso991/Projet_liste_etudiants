@extends('layout.master')
@section('title', 'StudentList')

@section('content')
<div class="me-5 ms-5">
    <a href="{{ route('addClassForm') }}" class="btn btn-primary me-2">Ajouter un cours</a>

    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Message !</strong> <br> {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Message !</strong> <br> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session('notification'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Message !</strong> <br> {{ session('notification') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table table-hover">
        <thead>
            <tr>
              <th>Intitulé</th>
              <th>Masse horaire</th>
              <th>Coefficient</th>
              <th>Catégorie</th>
              <th>Ajouter par</th>
              <th>Actions</th>
            </tr>
        </thead>
        @if (isset($courses))
        <tbody>
            @foreach ($courses as $class )
            <tr>
                <th>{{ $class['name'] }}</th>
                <td>{{ $class['schedule'] }} heure(s)</td>
                <td>{{ $class['coefficient'] }}</td>
                <td>{{ $class->category->name }}</td>
                <td>{{ $class->staff->name }}</td>
                <td>
                  <div>
                      <a href="{{ route('updateClass', ['id'=>$class->id]) }}" type="button" class="btn btn-warning me-2"><span class="mdi mdi-grease-pencil"></span></a>
                      <a href="{{ route('deleteClass', ['id'=>$class->id]) }}" type="button" class="btn btn-danger"><span class="mdi mdi-trash-can"></span></a>
                  </div>
              </td>
            @endforeach
        </tbody>
        @endif
    </table>
</div>
@endsection