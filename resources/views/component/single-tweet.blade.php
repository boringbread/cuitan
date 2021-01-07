<div class="rounded border mt-2 tweetobj" id="{{$tweet->id}}">
    <a href="{{route('tweet.view',$tweet->id)}}" class="text-decoration-none">
    <div class="row pt-3 cuit cur-pointer border-bottom" onClick="redirectCuit()">
        <div class="col-1">
            <div class="rounded-circle pl-2">
                @if ($tweet->reply_anc ||$tweet->is_retweeted == 1 || $tweet->is_liked == 1)
                    <small class="text-white">.</small>
                @endif
                <img src="{{asset('img/profile/'.($tweet->pphoto!=NULL? $tweet->pphoto:"noimg.png"))}}" class="" alt="" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center right;">
            </div>
        </div>
        <div class="col pl-4 pb-3">
            @if ($tweet->is_retweeted == 1)
                @include('component.retweet-sign')
            @elseif($tweet->is_liked == 1)
                @include('component.like-sign')
            @elseif($tweet->reply_anc)
                <span class="text-secondary">replied tweet</span>
            @endif
            <div class="d-flex flex-row align-items-center text-dark justify-content-between">
                <div class="d-flex flex-row align-items-center text-dark">
                    <div class="font-weight-bold">{{$tweet->disp_name}}</div>
                    <div class="font-weight-light ml-1">{{"@".$tweet->username}}</div>
                    <div class="font-weight-light ml-1">&#x2022;</div>
                    @if (strtotime("now")-strtotime($tweet->created_at) > 86400)
                        <div class="font-weight-light ml-1">{{ $tweet->created_at->format('M d') }}</div>
                    @else
                        <div class="font-weight-light ml-1">{{ $tweet->created_at->format('H:i') }}</div>
                    @endif
                </div>
            </div>
            <div class="pt-1 pr-3 text-dark" id="tweetText">
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
