<div class="container mt-4">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Enrégistrement effectué !</strong> <br> L'étudiant a bien été enrégistré dans la liste de l'école229
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('nom'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Vous avez activer</strong> <br> {{ session('nom') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('name'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>Vous avez désactiver</strong> <br> {{ session('name') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <table class="table">
        <thead class="text-center">
            <tr>
                <th>Photo</th>
                <th>Nom et Prénoms</th>
                <th>Hobbies</th>
                <th>Spécialités</th>
                <th>Actions</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($students))
                @foreach ($students as $item )
                <tr class="{{ $item->status ? '' : 'table-secondary' }}">
                    <td>
                        <div style="width: 5rem; height:5rem; ">
                            <img @if (!empty($item['picture']))
                            src="{{ asset($item['picture']) }}" height="100%" width="100%" style="object-fit: cover; border-radius:100%"
                            @endif src="{{ asset('img/img14.jpg') }}" alt="" height="100%" width="100%" style="object-fit: cover; border-radius:100%">
                        </div>
                    </td>
                    <td> {{ $item['nom'] }} {{ $item['prenom'] }}</td>
                    <td>{{ $item['hobbie1'] }}, {{ $item['hobbie2'] }}, {{ $item['hobbie3'] }}</td>
                    <td>{{ $item['specialite'] }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('studentId', ['id'=>$item['id']]) }}" type="button" class="btn btn-outline-warning">Voir plus</a>
                            <a href="{{ route('deleteStudent', ['id'=>$item['id']]) }}" type="button" class="btn btn-outline-danger">Supprimer</a>
                            <a href="{{ route('updateInfos', ['id'=>$item['id']]) }}" type="button" class="btn btn-outline-primary">Modifier</a>
                        </div>
                    </td>
                    <td>
                        @if ($item->status)
                            <form action="{{ route('desactiver', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger ms-1 mt-1">Désactiver</button>
                            </form>
                            @else
                            <form action="{{ route('activer', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success ms-1 mt-1">Activer</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>