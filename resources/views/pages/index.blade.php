@extends('layouts.V_Index')

@section('your-tweets')

<div class="border-bottom pb-2">
	<div class="pt-3 pb-2 border-bottom">
		<h5>Cuitan Anak IF</h5>
	</div>

	<div class="pt-4">
		<div class="form-group">
			<textarea class="form-control" placeholder="Hello, World!"></textarea>
		</div>
		<div class="text-right">
			<button class="btn w-25 btn-primary">Cuit Sekarang</button>
		</div>
	</div>
</div>

@endsection

@section('content')
	<div class="rounded border mt-2">
		<div class="row py-3 cuit" onClick="redirectCuit()">
			<div class="col-1">
				<div class="rounded-circle pl-2">
					<img src="https://pbs.twimg.com/profile_images/1019964377229766657/NCWeNHy__400x400.jpg" class="" alt="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center right;">
				</div>
			</div>
			<div class="col pl-4">
				<div class=" d-flex flex-row align-items-center">
					<div class="font-weight-bold">Muhammad Prasasta</div>
					<div class="font-weight-light ml-1">@prasastaa</div>
					<div class="font-weight-light ml-1">&#x2022;</div>
					<div class="font-weight-light ml-1">40 min</div>
				</div>
				<div class="pt-1 pr-3">
					Baru beres install hadoop, eh taunya udah lulus basdat.
				</div>
				<div class="d-flex flex-row justify-content-between w-75 mt-3">
					@include('component.tweets-compo')
				</div>
			</div>
		</div>
	</div>

	<div class="rounded border mt-2">
		<div class="row py-3">
			<div class="col-1">
				<div class="rounded-circle pl-2">
					<small class="text-white">.</small>
					<img src="https://pbs.twimg.com/profile_images/1019964377229766657/NCWeNHy__400x400.jpg" class="" alt="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center right;">
				</div>
			</div>
			<div class="col pl-4">
				@include('component.retweet-sign')
				<div class=" d-flex flex-row align-items-center">
					<div class="font-weight-bold">Muhammad Prasasta</div>
					<div class="font-weight-light ml-1">@prasastaa</div>
					<div class="font-weight-light ml-1">&#x2022;</div>
					<div class="font-weight-light ml-1">40 min</div>
				</div>
				<div class="pt-1 pr-3">
					Baru beres install hadoop, eh taunya udah lulus basdat.
				</div>
				<div class="d-flex flex-row justify-content-between w-75 mt-3">
					@include('component.tweets-compo')
				</div>
			</div>
		</div>
	</div>

	<div class="rounded border mt-2">
		<div class="row py-3">
			<div class="col-1">
				<div class="rounded-circle pl-2">
					<small class="text-white">.</small>
					<img src="https://pbs.twimg.com/profile_images/1019964377229766657/NCWeNHy__400x400.jpg" class="" alt="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center right;">
				</div>
			</div>
			<div class="col pl-4">
				@include('component.like-sign')
				<div class=" d-flex flex-row align-items-center">
					<div class="font-weight-bold">Muhammad Prasasta</div>
					<div class="font-weight-light ml-1">@prasastaa</div>
					<div class="font-weight-light ml-1">&#x2022;</div>
					<div class="font-weight-light ml-1">40 min</div>
				</div>
				<div class="pt-1 pr-3">
					Baru beres install hadoop, eh taunya udah lulus basdat.
				</div>
				<div class="d-flex flex-row justify-content-between w-75 mt-3">
					@include('component.tweets-compo')
				</div>
			</div>
		</div>

	<script type="text/javascript" defer>

		function redirectCuit(){
			console.log('asd');
			var url = `{{ route('cuitan') }}`
			window.location.href = url ;
		}

	</script>
	</div>

@endsection