@extends('layouts.V_Index')

@section('your-tweets')

<div class="border-bottom pb-2">
	<div class="pt-3 pb-2 border-bottom">
		<h5>Cuitan Anak IF</h5>
	</div>

	@if(Auth::check())
	<div class="pt-4">
		<form action="{{route('tweet.post')}}" method="POST">
			@CSRF
			<div class="form-group">
				<textarea id="text" class="form-control" required oninvalid="this.setCustomValidity('Isi ini dulu yuk!')" oninput="this.setCustomValidity('')" name='text' placeholder='Hello, World!'></textarea>
			</div>
			<div class="text-right">
				<button class="btn w-25 btn-primary ">Cuit Sekarang</button>
			</div>
		</form>
	</div>
	@endif
</div>

@endsection

@section('content')

	<div class="mb-3">
		@foreach ($tweets as $tweet)
		@include('component.single-tweet')
		@endforeach
	</div>

	<div class="text-center mb-3">
		<small class="text-center text-muted fs-6">Kamu sudah membaca semua cuitan anak IF :)</small>
	</div>

	@if(Auth::check())
	@include('modal.modal-reply')
	@endif

	<script type="text/javascript" defer>
		$rModal = $("#replyModal");
		$(".tweetobj").click(function(){
			document.getElementById("replyID").value = $(this).attr('id');
		})
	</script>

@endsection