
    <div class="container mt-3 d-flex justify-content-md-start">
        <a href="{{ route('professorList') }}" class="btn btn-primary me-2">Gestion des enseignants</a>
        <a href="{{ route('studentId', ['addStudentForm']) }}" class="btn btn-primary me-2">Ajouter un etudiant</a>
        <a href="{{ route('classList') }}" class="btn btn-primary me-2">Gestion des cours</a>
        <a href="{{ route("affectCourses") }}" class="btn btn-primary me-2">Attribution de cours</a>
    </div>


<h2 class="text-center muted mt-3">LISTE DES ETUDIANTS @if (isset($nom)) DE {{ $nom }} @endif </h2>