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
<form method="POST" action="{{ route('addStudent') }}" class="container" enctype="multipart/form-data">
    @csrf
    <div class=" d-flex align-items-center mt-3">
        <div class="d-flex align-items-center justify-content-center p-2" style="width: 40rem; height:20rem; border:1px solid rgb(230, 227, 227); border-radius:15px">
            <input name="picture" class="form-control" type="file">
        </div>
        <div style="font-size: 1.5rem; flex-direction:column" class="ps-3 d-flex">
            <input {{ old("nom") }} name="nom" class="form-control mb-3" type="text" placeholder="Nom">
            <input {{ old("prenom") }} name="prenom" class="form-control mb-3" type="text" placeholder="Prenom">
            <div class="input-group mb-3">
                <span class="input-group-text">Date de naissance</span>
                <input {{ old("birthday") }} name="birthday" class="form-control" type="date">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Hobbies</span>
                <input {{ old("hobbie1") }} name="hobbie1" class="form-control" type="text">
                <input {{ old("hobbie2") }} name="hobbie2" class="form-control" type="text">
                <input {{ old("hobbie3") }} name="hobbie3" class="form-control" type="text">
            </div>
            <input {{ old("specialite") }} name="specialite" class="form-control" type="text" placeholder="Spécialité">
        </div>
    </div>
    <div class="mt-3">
        <textarea name="biographie" class="form-control" rows="4" placeholder="Biographie">{{ old("biographie") }}</textarea>
    </div>
    <button class="btn btn-success mt-3 " type="submit">Enregistrer</button>
</form>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>