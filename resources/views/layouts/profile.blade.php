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
        <div class="d-flex justify-content-between py-3" style="position:relative">
            <div style="profile-circle">
                <img style="position:absolute;bottom:0%;left:1em;" src="https://pbs.twimg.com/profile_images/1019964377229766657/NCWeNHy__400x400.jpg" class="profile-circle">
            </div>
            
            <div class="border rounded p-2" style="font-size:1.1em">
                <a href="">
                    <span><b>Edit Profile</b></span>
                </a>
            </div>
        </div>
        <div class="px-3">
            <div class="my-1" style="font-size:1.5em">
                <p class="mb-0"><b>Muhammad Prasasta</b></p>
                <small class="text-secondary">@prasastaa</small>
            </div>
            <div class="my-3" style="font-size:1.1em">
                <p>
                    Karna hidup bukanlah perkara durasi, tapi kontribusi.<br>
                    [WA: Agus 0878 7889 8985]
                </p>
            </div>
            <div class="my-3" style="font-size:1.1em;color:#555">
                <span>
                    <b>1142</b> Following<!-- jadiin  link -->
                    &emsp;
                    <b>1.5k</b> Followers<!-- jadiin  link -->
                </span>
            </div>
        </div>
    </div>
</div>

<!--nav-->
<div class="border-bottom">
    <div class="container text-center">
        <div class="row" style="font-size:1.25em">
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
@for ($i = 0; $i < 3; $i++)
	@include('component.single-tweet')
@endfor

@endsection