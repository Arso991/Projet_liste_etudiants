@extends('layout.master')
@section('title', 'StudentList')

@section('content')
<div class="container mt-3 d-flex justify-content-center align-items-center">
  <div style="height: 10rem; width: 10rem" class="me-5 ms-5">
    <img @if (!empty($item['picture']))
        src="{{ asset($item['picture']) }}"
        @endif src="{{ asset('img/img14.jpg') }}" alt="" height="100%" width="100%" style="object-fit: cover; border-radius:20px">
  </div>
  <div>
    <h2>Nom et prénoms : <span class="text-muted">{{ $idEt->Fullname }}</span></h2>
    <h2 class="text-danger">Cours : {{ $idCo->name }} </h2>
  </div>
</div>
<div class="container mt-2 d-flex">
    <table class="table">
        <thead>
          <tr>
            <th>Type</th>
            <th>Note 1</th>
            <th>Note 2</th>
            <th>Moyenne</th>
          </tr>
        </thead>
        @if ($notedevoir && $notepartiel)
        <tbody>
          <tr>
            <td>Devoir</td>
            @foreach ($notedevoir as $item)
              <td>{{ $item }}</td>
            @endforeach
            @if (count($notedevoir)==2)
            <td>{{ $moydev }}</td>
            @endif
          </tr>
          <tr>
            <td>Partiel</td>
            @foreach ($notepartiel as $item)
              <td>{{ $item }}</td>
            @endforeach
            @if (count($notepartiel)==2)
              <td>{{ $moypart }}</td>
            @endif
          </tr>
          <tr>
            <td>Total</td>
            <td colspan="2"></td>
            @if (isset($moydev) && isset($moypart))
            <td>{{ $moytotal }}</td>
            @endif
          </tr>
          
        </tbody>  
        @endif
      </table>

      <form method="POST" action="{{ route("attributeNoteStore", ['idE'=>$idEt, 'idC'=>$idCo]) }}" class="container me-5 ms-5">
        @csrf

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
                <div>
                    <label for="" class="form-label">Note</label>
                    <input name="note" class="form-control" type="text" placeholder="Saisir la note/100">
                </div>
                <div class="mt-3">
                    <label for="" class="form-label">Type</label>
                    <select name="type" class="form-select" aria-label="Default select example">
                        <option value="" selected>Selectionner le type</option>
                        <option value="Devoir">Devoir</option>
                        <option value="Partiel">Partiel</option>
                    </select>
                </div>
            <button class="btn btn-success mt-3 " type="submit">Enregistrer</button>
    </form>
</div>
@endsection