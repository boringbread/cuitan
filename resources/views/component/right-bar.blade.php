<div class="container-fluid border-left rbar" style="position: sticky; top: 0rem; height: 100vh;overflow-y:scroll">
    @include('component.developer')

    @if(Auth::check() && Cache::get('whotofollow') && count(Cache::get('whotofollow'))>0)
    <div class="pb-2">
        <div class="pt-3 mt-3 pb-2 border-bottom border-top">
            <h5 class="">Who to Follow</h5>   
        </div>

            @if (Cache::get('whotofollow') == null)
                <?php App\Http\Controllers\C_Index::getWTF();?>
            @endif
            
            @foreach (Cache::get('whotofollow') as $item)
            <a href="{{ route('profile.view', $item->username) }}" class="d-flex">
                <div class="w-100 mt-4 d-flex border rounded px-2 py-3 svg">
                        <div class="ml-1">
                            <img src="{{asset('img/profile/'.($item->pphoto!=NULL? $item->pphoto:"noimg.png"))}}" class="" width="50px" alt="" style=" clip-path: circle();">
                        </div>
                        <div class="ml-3">
                            <h6>{{ $item->disp_name }}</h6>
                            <h6 class="text-muted">{{ $item->username }}</h6>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        @endif
</div>