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
			<button class="btn w-25 btn-primary ">Cuit Sekarang</button>
		</div>
	</div>
</div>

@endsection

@section('content')

	@for ($i = 0; $i < 3; $i++)
	@include('component.single-tweet')
	@endfor

	<script type="text/javascript" defer>

		function redirectCuit(){
			var url = `{{ route('cuitan') }}`
			window.location.href = url ;
				
		}

	</script>

@endsection