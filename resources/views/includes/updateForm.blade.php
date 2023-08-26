<form method="POST" action="{{ route('updateStudent',['id'=>$id]) }}" class="container" enctype="multipart/form-data">
    @csrf
    <div class=" d-flex align-items-center mt-3">
        <div class="d-flex align-items-center justify-content-center p-2" style="width: 40rem; height:20rem; border:1px solid rgb(230, 227, 227); border-radius:15px">
            <input class="form-control" type="file">
        </div>
        <div style="font-size: 1.5rem; flex-direction:column" class="ps-3 d-flex">
            <input name="nom" value="{{ $dataUpdate['nom'] }}" class="form-control mb-3" type="text" placeholder="Nom">
            <input name="prenom" value="{{ $dataUpdate['prenom'] }}" class="form-control mb-3" type="text" placeholder="Prenom">
            <div class="input-group mb-3">
                <span class="input-group-text">Date de naissance</span>
                <input name="birthday" value="{{ $dataUpdate['birthday'] }}" class="form-control" type="date">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Hobbies</span>
                <input name="hobbie1" value="{{ $dataUpdate['hobbie1'] }}" class="form-control" type="text">
                <input name="hobbie2" value="{{ $dataUpdate['hobbie2'] }}" class="form-control" type="text">
                <input name="hobbie3" value="{{ $dataUpdate['hobbie3'] }}" class="form-control" type="text">
            </div>
            <input name="specialite" value="{{ $dataUpdate['specialite'] }}" class="form-control" type="text" placeholder="Spécialité">
        </div>
    </div>
    <div class="mt-3">
        <textarea name="biographie" class="form-control" rows="4" placeholder="Biographie">{{ $dataUpdate['biographie'] }}</textarea>
    </div>
    <button class="btn btn-success mt-3 " type="submit">Modifier</button>
</form>