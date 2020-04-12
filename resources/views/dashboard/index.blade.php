@extends('layouts.app')
@section('content')

<h3 class="mb-4 text-uppercase">
	<i class="fa fa-university mr-1"></i> Selamat Datang
</h3>

<div class="alert alert-info">
	<div>Selamat datang <strong>{{ Auth::user()->name }}</strong>.</div>
	Create Read Update and Delete with Laravel 6.x using database MongoDB
</div>

@endsection
