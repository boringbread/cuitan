@extends('layouts.V_Index')

@section('your-tweets')
    <h3 class="my-3 d-flex">
        <a href={{url()->previous()}}><div class="font-weight-bold mr-3 icon-size">&#8592;</div></a>
        <a href="{{ route('profile.view', $username) }}" class="text-dark">
            {{'@'.$username}}'s
        </a>
        &nbsp;
        {{request()->segment(count(request()->segments()))}}
    </h3>
    @endsection
    
@section('content')
{{-- {{print_r($following['0'])}} --}}
@foreach ($follow as $item)    
    <a href="{{ route('profile.view', $item->username) }}" class="py-2 text-decoration-none">    
        <div class="row border rounded m-2 text-italic svg">
            <div class="col-2">
                <div class="rounded-circle pl-2 py-3">
                    <img src="https://pbs.twimg.com/profile_images/1019964377229766657/NCWeNHy__400x400.jpg" class="" alt="" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; object-position: center right;">
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center col">
                <div class="d-flex flex-column justify-content-center">
                    <div class="font-weight-bold text-dark">{{$item->disp_name}}</div>
                    <div class="text-muted">{{ $item->username }}</div>
                </div>
                <div class="d-flex flex-row justify-content-between font-italic text-muted">
                    <span>{{ $item->count_following }} Following</span>
                    <span class="ml-3">{{ $item->count_follower }} Followers</span>
                </div>
            </div>
        </div>
    </a>
@endforeach

@endsection