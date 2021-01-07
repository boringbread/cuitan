<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form autocomplete="off" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        @CSRF
        <input type="hidden" name="_method" value="PUT">
        <div class="p-2 d-flex justify-content-between">{{--header--}}
            <div class="d-flex align-items-center">
                <button type="button" class="close p-0 m-0 ml-2 float-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <span class="ml-4 modal-title pt-1" id="editProfileTitle" style="font-size:1em"><b>Edit Profile</b></span>
            </div>
            <button type="submit" class="rounded btn border btn-primary"><b>Save</b></button>
        </div>
        <hr class="my-0">
        <div class="mt-3 mb-1 ml-3">
            <input style="display:none" id="pphoto" type="file" accept="image/*" name="photo">
            <div id="p-input-div" class="px-2" style="positon:relative;">
                <img id="profile-viewer" height="100px" width="100px" style="background:#fff;cursor:pointer;object-fit:cover" src="{{asset('img/profile/'.($user->pphoto!=NULL? $user->pphoto:"noimg.png"))}}" class="profile-circle">
                <span style="position:absolute;left:12.5%;top:25.5%;cursor:pointer"><img src="{{asset('/img/camera.svg')}}" width="24px"></span>
            </div>
        </div>
        <div class="modal-body">
            <div class="border rounded p-1">
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