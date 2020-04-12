<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="gosoftware,phpbego">
	<meta name="description" content="Gosoftare Free CRUD Laravel MongoDB">
	<meta name="author" content="Suendri">

	<title>{{ config('app.name') }}</title>
	<link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>	

	@livewireStyles

</head>

<body>
	<div class="container">
		<header>
			<div class="row">
				<div class="col">
					<img src="{{ asset('images/header.jpg') }}" class="img-fluid w-100">
				</div>
			</div>
		</header>

		<section>
			<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #343a40;">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/') }}">Home</a>
						</li>
						@auth
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/dashboard/mahasiswa') }}">Mahasiswa</a>
						</li>							
						@endauth
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/register') }}">Registrasi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/login') }}">Login</a>
						</li>						
						@endguest		
					</ul>
					@auth
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#"><i class="fa fa-user-circle mr-1"></i> {{ Auth::user()->name }}</a>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out mr-1"></i> {{ __('Logout') }}</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					</ul>
					@endauth
				</div>
			</nav>
		</section>

		<main>
			<div class="row">			
				<div class="col">
					@yield('content')
				</div>
			</div>
		</main>

		<footer>
			Copyright © {{ date('Y') }}  All rights reserved.
			<div><a href="http://gosoftware.web.id/">http://gosoftware.web.id</a> - <a href="https://phpbego.wordpress.com/">https://phpbego.wordpress.com</a></div>
		</footer>

	</div>

	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	@include('sweetalert::alert')
	@livewireScripts

</body>
</html>