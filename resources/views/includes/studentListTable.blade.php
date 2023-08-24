<div class="container mt-4">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Enrégistrement effectué !</strong> <br> L'étudiant a bien été enrégistré dans la liste de l'école229
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Nom et Prénoms</th>
                <th>Hobbies</th>
                <th>Spécialités</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($students))
                @foreach ($students as $item )
                <tr>
                    <td>
                        <div style="width: 5rem; height:5rem; ">
                            <img @if (!empty($item['image']))
                            src="{{ $item['image'] }}" 
                            @endif src="{{ asset('img/img14.jpg') }}" alt="" height="100%" width="100%" style="object-fit: cover; border-radius:100%">
                        </div>
                    </td>
                    <td> {{ $item['nom'] }} {{ $item['prenom'] }}</td>
                    <td>{{ $item['hobbie1'] }}, {{ $item['hobbie2'] }}, {{ $item['hobbie3'] }}</td>
                    <td>{{ $item['specialite'] }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('studentId', ['id'=>$item['id']]) }}" type="button" class="btn btn-outline-warning">Voir plus</a>
                            <button type="button" class="btn btn-outline-danger">Supprimer</button>
                            <button type="button" class="btn btn-outline-primary">Modifier</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>