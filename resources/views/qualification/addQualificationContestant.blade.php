<div class="modal fade" id="contestantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ URL::to('/contestantScore') }}" method="post" enctype="multipart/form-data">
          @csrf 
              <div class="modal-header">
            <h4><i class="bi bi-justify"></i>{{ __(' Create Contestant') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <label for="program">Name:</label>
                <input type="text" required class="form-control" name="con_name">
                <label for="program">Age:</label>
                <input type="text" required class="form-control" name="con_age">
                <label for="program">Gender:</label>
                <input type="text" required class="form-control" name="con_gender">
                <input type="hidden" name="quali_id" value="{{ $getQuali->id }}">
                
                  
                
                <label for="program">Institution:</label>
                <select class="form-control" name="tti_id">
                        @foreach($tti as $t)
                            <option value="{{$t->id}}">{{$t->tti_abrv}}</option>
                        @endforeach     
                </select>
                
                

                <label for="program">Image:</label>
                <input type="file" class="form-control" name="con_image" id="image">

              </div>
            
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
        </form>         
      </div>
    </div>
  </div>
