<div class="d-flex justify-content-between">
    <div class="container mt-5 d-flex justify-content-md-end">
        <a href="{{ route('studentId', ['addStudentForm']) }}" class="btn btn-primary">Ajouter un etudiant</a>
        <a href="{{ route('signout') }}" class="btn btn-danger ms-2">Deconnecter</a>
    </div>
    <div class="container mt-5 d-flex justify-content-md-start">
        <a href="{{ route('studentId', ['addStudentForm']) }}" class="btn btn-primary">Ajouter un etudiant</a>
        <a href="{{ route('signout') }}" class="btn btn-danger ms-2">Deconnecter</a>
    </div>
</div>

<h2 class="text-center muted mt-3">LISTE DES ETUDIANTS DE {{ $nom }}</h2>