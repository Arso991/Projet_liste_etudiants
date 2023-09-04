@extends('layout.master')
@section('title', 'StudentList')

@section('content')
<div class="mt-5 me-3 ms-3 d-flex">

    <table class="table table-hover">
        <thead class="bg-dark">
            <tr>
              <th>ID Affectation</th>
              <th>Nom et Prenom(s) de l'étudiant    </th>
              <th>Cours</th>
            </tr>
        </thead>
        @if (isset($affectBy))
        <tbody>
            @foreach ($affectBy as $studentId => $affect)
                <tr>
                    <th>
                        @foreach ($affect as $item)
                        {{ $item->id }}
                        @endforeach
                    </th>
                    <td>{{ $affect[0]->uac->Fullname }}</td>
                    <td>
                        <ul style="list-style: none">
                            @foreach ($affect as $item)
                                <li>
                                    <button class="btn btn-light mt-1" data-toggle="tooltip" data-placement="right" title="poiuy">
                                    {{ $item->amphi->name }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
        @endif
    </table>

    <form method="POST" action="{{ route("affectStore") }}" class="container">
        @csrf
        <div class="me-5 ms-5">

            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>Message success</strong> <br> {{ session("message") }}
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
            <label for="" class="form-label">Etudiant</label>
            @if ($students)
                <select name="student_id" class="form-select " aria-label="Default select example">
                    <option selected>Selectionner l'étudiant</option>
                    @foreach ($students as $student)
                    <option value="{{ $student['id'] }}">{{ $student['nom'] }} {{ $student['prenom'] }}</option>
                    @endforeach
                </select>
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
        </div> 
    </form>
</div>
@endsection