@extends('layout.master')
@section('title', 'StudentList')

@section('content')
<section>
    @include('includes.studentListHead')
</section>

<section>
    @include('includes.studentListTable')
</section>
@endsection