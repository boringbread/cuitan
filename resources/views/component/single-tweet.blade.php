{{-- @for ($i = 0; $i < 3; $i++) --}}
        <div class="rounded border mt-2">
            <a href="{{route('tweet.view',$tweet->id)}}" class="text-decoration-none">
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
                    <div class="d-flex flex-row align-items-center text-dark justify-content-between">
                        <div class="d-flex flex-row align-items-center text-dark">
                            <div class="font-weight-bold">{{$tweet->disp_name}}</div>
                            <div class="font-weight-light ml-1">{{"@".$tweet->username}}</div>
                            <div class="font-weight-light ml-1">&#x2022;</div>
                            <div class="font-weight-light ml-1">40 min</div>
                        </div>
                        {{-- <div class="font-weight-light mr-1">
                            @if (Auth::check() && Auth::user()->id == $tweet->id_user)
                            <form action="{{ route('tweet.delete', $tweet->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <button class="btn-sm">
                                    <svg id="Capa_1" enable-background="new 0 0 485 485" height="18px" viewBox="0 0 485 485" width="18px" xmlns="http://www.w3.org/2000/svg"><g><path d="m411.546 53.073h-69.851v-23.089c0-16.533-13.451-29.984-29.984-29.984h-111.422c-16.533 0-29.984 13.451-29.984 29.984v23.088h-69.851c-16.811 0-30.486 13.676-30.486 30.486v31.765c0 5.523 4.478 10 10 10h12.114l19.58 377.195c.275 5.314 4.665 9.481 9.986 9.481h268.703c5.321 0 9.711-4.167 9.986-9.481l19.58-377.195h12.114c5.522 0 10-4.477 10-10v-31.764c.001-16.81-13.675-30.486-30.485-30.486zm-221.241-23.089c0-5.505 4.479-9.984 9.984-9.984h111.422c5.506 0 9.984 4.479 9.984 9.984v23.088h-131.39zm190.552 462.016h-249.714l-19.034-366.677h287.783zm41.175-386.677h-332.064v-21.764c0-5.782 4.704-10.486 10.486-10.486h311.092c5.782 0 10.486 4.704 10.486 10.486z"/><path d="m242.669 438h26.662c5.387 0 9.806-4.267 9.994-9.651l8.335-238.677c.095-2.711-.916-5.344-2.801-7.296-1.885-1.951-4.48-3.053-7.193-3.053h-43.332c-2.713 0-5.309 1.102-7.193 3.053-1.885 1.952-2.896 4.584-2.801 7.296l8.335 238.677c.188 5.384 4.607 9.651 9.994 9.651zm24.642-238.677-7.637 218.677h-7.348l-7.637-218.677z"/><path d="m153.445 428.648c.341 5.26 4.707 9.352 9.979 9.352h35.229c2.713 0 5.309-1.102 7.193-3.053 1.885-1.952 2.896-4.584 2.801-7.296l-8.335-238.677c-.188-5.384-4.607-9.651-9.994-9.651h-42.398c-2.765 0-5.406 1.145-7.297 3.162s-2.861 4.727-2.682 7.486zm27.215-229.325 7.637 218.677h-15.502l-14.205-218.677z"/><path d="m313.348 438h35.229c5.271 0 9.638-4.092 9.979-9.352l15.505-238.677c.18-2.759-.791-5.469-2.682-7.486-1.891-2.018-4.532-3.162-7.297-3.162h-42.398c-5.387 0-9.806 4.267-9.994 9.651l-8.335 238.677c-.095 2.711.916 5.344 2.801 7.296 1.883 1.951 4.479 3.053 7.192 3.053zm17.992-238.677h22.07l-14.205 218.677h-15.502z"/></g></svg>
                                </button>
                            </form>
                            @endif
                        </div> --}}
                    </div>
                    <div class="pt-1 pr-3 text-dark">
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