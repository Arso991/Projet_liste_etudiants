<div class="container">
    <div class="d-flex justify-content-end mt-2">
        <a href="{{ route('index') }}" class="btn btn-primary me-3">Retour</a>
        <a @if ($id<count($students))
        href="{{ route('studentId', ['id'=>$data['id']+1]) }}"
        @else
        href="{{ route('index') }}"
        @endif  class="btn btn-success">Suivant</a>
    </div>
    <div class="d-flex align-items-center">
        <div style="width: 40rem; height:30rem">
            <img @if (!@empty($data['image'])) 
            src="{{ $data['image'] }}" 
            @endif
            src="{{ asset('img/img14.jpg') }}" height="100%" width="100%" style="object-fit: cover; border-radius:15px" class="img-thumbnails mt-2 me-3" src="image">
        </div>
        <div style="font-size: 1.5rem; flex-direction:column" class="ps-3 d-flex">
            <p class="mb-4"><strong>Nom:</strong> {{ $data['nom'] }} </p>
            <p class="mb-4"><strong>Prénom:</strong> {{ $data['prenom'] }}</p>
            <p class="mb-4"><strong>Date de naissance:</strong> {{ $data['birthday'] }}</p>
            <p class="mb-4"><strong>Hobbies:</strong> {{ $data['hobbie1'] }}, {{ $data['hobbie2'] }}, {{ $data['hobbie3'] }}</p>
            <p class="mb-4"><strong>Spécialité:</strong> {{ $data['specialite'] }}</p>
        </div>
    </div>
    <div class="mt-3">
        <h2 class="display-5 bold">Bio:</h2>
        <p style="font-size: 1.5rem" class="muted">{{ $data['biographie'] }}</p>
    </div>
</div>