@extends('layout.master')
@section('title', 'StudentList')

@section('content')
<div class="me-5 ms-5">
    <a href="{{ route('addClassForm') }}" class="btn btn-primary me-2">Ajouter un cours</a>

    @if (session("message"))
        <div class="alert alert-success text-center" role="alert">
            <strong>Message success</strong> <br>{{ session("message") }}
        </div>
    @endif

    <table class="table table-hover">
        <thead class="bg-dark">
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
                <td>{{ $class['category_id'] }}</td>
                <td>{{ $class['user_id'] }}</td>
                <td>
                  <div>
                      <button type="button" class="btn btn-warning me-2"><span class="mdi mdi-grease-pencil"></span></button>
                      <button type="button" class="btn btn-danger"><span class="mdi mdi-trash-can"></span></button>
                  </div>
              </td>
            @endforeach
        </tbody>
        @endif
    </table>
</div>
@endsection