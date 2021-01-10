<div class="d-flex align-items-center nav-info-h">
    <h3>
        <a class="normal-link" href={{url()->previous()}}><div class="font-weight-bold mr-3 icon-size">&#8592;</div></a>
    </h3>
    <div>
        <h5 class="font-weight-bold mb-0">{{ $user->disp_name }}</h5>
        <p class="mb-0">{{ $user->tweet_count }} tweets</p>
    </div>
</div>