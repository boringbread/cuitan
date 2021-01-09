<html>
<head>
	<title>Cuitan</title>
	<link rel="icon" href={{url('img/favicon.png')}}>
	<link rel="stylesheet" href={{ url('/style/style.css') }}>
	<link rel="stylesheet" href={{ url('/style/bootstrap.min.css') }}>
	<script src={{url('/js/jquery.js')}}></script>
	<script src={{url('/js/bootstrap.bundle.min.js')}}></script>
	{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}
	{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
	{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> --}}
</head>
<body class="container-fluid">
	<!-- Side Menu -->
	<div class="row">
		<div class="col-3 border-right">
			<div style="position: sticky; top: 0.25rem; height: 100vh;">
				<nav id="sidebarMenu" class="d-md-block sidebar collapse affix" >
					<li class="navbar-brand">
						<a class="nav-link active font-weight-bold" href="#">
							CUITAN.
						</a>
					</li>
					<div class="sidebar-sticky pt-3">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link active btn btn-lg text-left svg" href={{ route('index') }}>
									Home <span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="nav-item">
								<div class="accordion mt-4 svg rounded" id="accordionExample">
									<h2 class="mb-0" id="headingOne">
										<button class="btn btn-block btn-lg text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Search
										</button>
									</h2>
									<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="pb-1">
											<form action="{{route('profile.search')}}" method="POST" >
												<div class="d-flex justify-content-around">
													<input type="hidden" name="_method" value="PUT">
													@csrf
													<input type="text" class="form-control mt-2 w-75" name="search" id="search" required>
													<button class="mt-2 btn btn-danger" type="submit">Cari</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</li>
							@if (Auth::check())
								<li class="nav-item">
									<a class="nav-link btn btn-lg text-left mt-4 svg" href="{{ route('profile.following', Auth::user()->username) }}">
										Following
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn btn-lg text-left mt-4 svg" href="{{ route('profile.follower', Auth::user()->username) }}">
										Followers
									</a>
								</li>
								<li class="nav-item">
									<form action="{{ route('logout') }}" method="POST">
										@csrf
										<button class="nav-link btn btn-lg text-left mt-4 svg">Logout</button>
									</form>
								</li>
							@else
								<li class="nav-item">
									<a class="nav-link svg rounded btn btn-lg text-left mt-4" href="{{route('login')}}">
										Login
									</a>
								</li>
							@endif
							</ul>
					</div>
				</nav>

				@if (Auth::check())
				<a href="{{route('profile.view',Auth::user()->username)}}" class="text-dark">
				<div class="w-100" style="position: absolute; bottom: 0;">
					<div class="border text-center px-4 pt-4 pb-4 shadow svg" style="border-top-right-radius: 30px; border-top-left-radius: 30px;" >
						<div class="d-flex flex-row align-items-center">
							<div class="rounded-circle pl-2">
								<img src="{{asset('img/profile/'.(Auth::user()->pphoto!=NULL? Auth::user()->pphoto:"noimg.png"))}}" class="" alt="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center;">
							</div>
							<div class="d-flex flex-column text-left pl-3">
								<div class="font-weight-bold">{{Auth::user()->disp_name}}</div>
								<div class="font-weight-light">{{"@".Auth::user()->username}}</div>
							</div>
						</div>
					</div>
				</div>
				</a>
				@endif
			</div>
		</div>

		<!-- TWEETS -->
		<div class="col-6">
			<!-- YOUR TWEETS -->
			@yield('your-tweets')

			<!-- POSTED TWEETS -->
			<div class="border-top">
				<div class="">
					@yield('content')
				</div>
			</div>
		</div>

		<div class="col-md">
			@include('component.right-bar')
		</div>
		
	</div>
</body>
@yield('scripts')
</html>