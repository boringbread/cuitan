<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form autocomplete="off" action="{{route('profile.update')}}" method="POST">
        @CSRF
        <input type="hidden" name="_method" value="PUT">
        <div class="p-2 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <button type="button" class="close p-0 m-0 ml-2 float-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <span class="ml-4 modal-title pt-1" id="editProfileTitle" style="font-size:1em"><b>Edit Profile</b></span>
            </div>
            <button type="submit" class="rounded btn border btn-primary"><b>Save</b></button>
        </div>
        <hr class="my-0">
        <div class="modal-body">
            <div class="border rounded my-2 p-1">
                <small class="text-secondary">Name</small><br>
                <input class="no-border w-100" name="disp_name" value="{{$user->disp_name}}">
            </div>
            <div class="border rounded my-2 p-1">
                <small class="text-secondary">Bio</small><br>
                <textarea class="no-border w-100" name="bio" rows="4">{{$user->bio?$user->bio:""}}</textarea>
            </div>
        </div>
        </form>
      </div>
    </div>
</div>