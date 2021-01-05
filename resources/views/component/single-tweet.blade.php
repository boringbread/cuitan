{{-- @for ($i = 0; $i < 3; $i++) --}}
        <div class="rounded border mt-2">
            <a href="{{route('tweet.view',$tweet->id)}}">
            <div class="row pt-3 cuit cur-pointer border-bottom" onClick="redirectCuit()">
                <div class="col-1">
                    <div class="rounded-circle pl-2">
                        {{-- @if ($i!=0)
                            <small class="text-white">.</small>
                        @endif --}}
                        <img src="https://pbs.twimg.com/profile_images/1019964377229766657/NCWeNHy__400x400.jpg" class="" alt="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center right;">
                    </div>
                </div>
                <div class="col pl-4 pb-3">
                    {{-- @if ($i==1)
                        @include('component.retweet-sign')
                    @elseif($i==2)
                        @include('component.like-sign')
                    @endif --}}
                    <div class=" d-flex flex-row align-items-center">
                        <div class="font-weight-bold">{{$tweet->disp_name}}</div>
                        <div class="font-weight-light ml-1">{{"@".$tweet->username}}</div>
                        <div class="font-weight-light ml-1">&#x2022;</div>
                        <div class="font-weight-light ml-1">40 min</div>
                        <div class="font-weight-light ml-1">
                            @if (Auth::check() && Auth::user()->id == $tweet->id_user)
                                <form action="{{ route('tweet.delete', $tweet->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <button class="btn btn-sm btn-danger">Delete Tweet</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="pt-1 pr-3">
                        {{ $tweet->text }}
                    </div>
                </div>
            </div>
            </a>
            <div class="container bg-blue-cuit-10">
                <div class="container d-flex flex-row justify-content-between w-75 pt-1">
                    @include('component.tweets-compo')
                </div>
            </div>
        </div>

{{-- @endfor --}}