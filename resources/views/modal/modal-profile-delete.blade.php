<div class="modal fade" id="deleteProfile" tabindex="-1" role="dialog" aria-labelledby="deleteProfileTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="py-2 px-3">
            <div class="text-center py-2"><p style="font-size:1.1em"><b>Hapus akun Anda?</b></p></div>
            <div class="text-center mb-4">
                <span>Apakah Anda yakin ingin menghapus akun Anda? Anda tidak dapat mengembalikan aksi ini setelah anda menekan tombol konfirmasi</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between w-75" style="margin:0 auto">
                <button type="button" class="btn" data-dismiss="modal">Batalkan</button>
                <form class="mb-0" action="{{ route('profile.delete') }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn w-100 text-danger"><b>Hapus Akun</b></button>
                </form>
            </div>
            
        </div>
      </div>
    </div>
</div>