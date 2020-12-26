{{-- @for ($i = 0; $i < 3; $i++) --}}

    <div class="rounded border mt-2">
        <div class="row pt-3 py-1 cuit cur-pointer" onClick="redirectCuit('luar')">
            <div class="col-1">
                <div class="rounded-circle pl-2">
                    @if ($i!=0)
                        <small class="text-white">.</small>
                    @endif
                    <img src="https://pbs.twimg.com/profile_images/1019964377229766657/NCWeNHy__400x400.jpg" class="" alt="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center right;">
                </div>
            </div>
            <div class="col pl-4">
                @if ($i==1)
                    @include('component.retweet-sign')
                @elseif($i==2)
                    @include('component.like-sign')
                @endif
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

{{-- @endfor --}}