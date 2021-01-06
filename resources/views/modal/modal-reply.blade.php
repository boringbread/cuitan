<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{route('tweet.reply')}}" method="POST">
          @CSRF
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <div class="">{{--tweet to reply field --}}
            <div>

            </div>
            <div id="replyText">

            </div>
          </div>

          <div class="">{{--text field --}}
            
              <input name="reply_id" id="replyID" type="hidden" value="">
              <textarea name="reply_data" class="w-100 form-control" rows="5" placeholder="Tweet your reply"></textarea>
            
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Post Reply</button>
        </div>
      </form>
      </div>
    </div>
  </div>