@extends('layouts.V_Index')

@section('content')

    <div class="rounded border mt-2">
        <div class="row py-3 px-3 align-items-center">
            <div class="col-1">
                <div class="rounded-circle text-center">
                    <img src="https://pbs.twimg.com/profile_images/1019964377229766657/NCWeNHy__400x400.jpg" class="" alt="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center right;">
                </div>
            </div>
            <div class="col pl-3">
                <div class=" d-flex flex-column align-items-left">
                    <div class="font-weight-bold">Muhammad Prasasta</div>
					<div class="font-weight-light">@prasastaa</div>
                </div>
            </div>
        </div>
        {{-- Isi Tweets --}}
        <div class="px-3">
            <h3 class="font-weight-normal pt-1">
                Baru beres install hadoop, eh taunya udah lulus basdat.
            </h3>
            <div class="d-flex flex-row justify-content-between border-top border-bottom p-3 mt-3">
                <div class="d-flex flex-row">
                    <div><strong>100k</strong> Retweets</div>
                    <div class="pl-4"><strong>2k</strong> Likes</div>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-between border-bottom p-3">
                @include('component.tweets-compo')
            </div>
        </div>
    </div>

@endsection