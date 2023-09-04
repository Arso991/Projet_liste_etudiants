@extends('layout.master')
@section('title', 'StudentDetail')

@section('content')
@if (isset($data))
<section>
    @include('includes.studentInfos')
</section>
@elseif (isset($dataUpdate))
<section>
   @include('includes.updateForm')
</section>
@else
<section>
    @include('includes.addStudentForm')
</section>
@endif
@endsection