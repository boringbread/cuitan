@extends('layouts.V_Index')

@section('content')

@include('component.nav-info')

<div class="wrap-profile">
    <div class="wrap-profile-header">
        <div class="profile-header-frame">
            <img src="">
        </div>
    </div>
    <div class="wrap-profile-info">
        <div class="" style="height:218px;background:rgb(61, 84, 102)">
            
        </div>
        <div class="d-flex justify-content-between py-3" style="position:relative; height: 70px;">
            <div style="overflow:hidden">
                <img style="height:111px;width:111px;position:absolute;bottom:10%;left:1em;background:#fff;object-fit:cover" src="{{asset('img/profile/'.($user->pphoto!=NULL? $user->pphoto:"noimg.png"))}}" class="profile-circle">
            </div>
            
            <div class="rounded p-2" style="font-size:1.1em">
                @if($role=="owner")
                <div class="btn-group">
                    <a class="btn mr-2 rounded border" data-toggle="dropdown">
                      <img src="{{asset('img/threedot.svg')}}" width="16px">
                    </a>
                    <ul class="dropdown-menu pb-0">
                        <li >
                            <button class="btn w-100" data-toggle="modal" data-target="#editProfile"><b>Edit Profile</b></button>
                        </li>
                        <li>
                            <button class="btn w-100 text-danger" data-toggle="modal" data-target="#deleteProfile"><b>Hapus Akun</b></button>
                        </li>
                    </ul>
                </div>
                @elseif($role=="default")
                @elseif($role=="visit")
                {{-- Dah polo belom? --}}
                    @if (Auth::user()->following!=NULL && in_array($user->id, Auth::user()->following))
                    <form action="{{ route('profile.unfollow', $user->id) }}" method="POST" class="mb-0">
                        @csrf
                        <button class="btn btn-primary"><b>Followed</b></button>
                    </form>
                    @else
                        <form action="{{route('profile.follow',$user->id)}}" method="POST" class="mb-0">
                            @CSRF
                            <button class="btn btn-outline-primary"><b>Follow</b></button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
        <div class="px-3">
            <div class="my-1" style="font-size:1.25em">
                <p class="mb-0"><b>{{$user->disp_name}}</b></p>
                <small class="text-secondary">{{"@".$user->username}}</small>
            </div>
            <div class="my-3" style="font-size:1em">
                <p>
                    {{$user->bio?$user->bio:""}}
                </p>
            </div>
            <div class="my-3" style="font-size:0.8em;color:#555">
                <span>
                    <a href="{{ route('profile.following', $user->username) }}" style="font-size:1.1em;color:#555">
                        <b>{{ $user->following_count ? $user->following_count : 0  }}</b> Following<!-- jadiin  link -->
                    </a>
                        &emsp;
                    <a href="{{ route('profile.follower', $user->username) }}" style="font-size:1.1em;color:#555">
                        <b>{{ $user->follower_count ? $user->follower_count : 0  }}</b> Followers<!-- jadiin  link -->
                    </a>
                </span>
            </div>
        </div>
    </div>
</div>

<!--nav-->
<div class="border-bottom">
    <div class="container text-center">
        <div class="row" style="font-size:1em">
            <div class="col px-0">
                <a class="nav-link profile-nav-item profile-nav-active" href="#"><b>Tweets</b></a>
            </div>
            <div class="col px-0">
                <a class="nav-link profile-nav-item" href="#"><b>Tweet & Replies</b></a>
            </div>
            <div class="col px-0">
                <a class="nav-link profile-nav-item" href="#"><b>Likes</b></a>
            </div>
        </div>
    </div>
</div>

<!--tweets-->
@foreach($tweets as $tweet)
	@include('component.single-tweet')
@endforeach

@if(Auth::check())
	@include('modal.modal-reply')
	@include('modal.modal-profile-edit')
    @include('modal.modal-profile-delete')
@endif

@endsection

@section('scripts')

@if(Auth::check())
    <script>
        function fasterPreview( uploader ) {
            if ( uploader.files && uploader.files[0] ){
                var img = $('#profile-viewer');
                img.attr('src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        $("#p-input-div").click(function(){
            $("#pphoto").click();
        });

        $("#pphoto").change(function(){
            fasterPreview( this );
        });
    </script>
@endif

@endsection