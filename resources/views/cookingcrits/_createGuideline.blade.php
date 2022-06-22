<div class="modal fade" id="cookingCritsCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('cookingguidelines.store') }}" method="post" enctype="multipart/form-data">
          @csrf 
              <div class="modal-header">
            <h4><i class="bi bi-justify"></i>{{ __(' Create Cooking Guidelines') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label for="program">Guidelines Name:</label>
                <input type="text" required class="form-control" name="gd_name">
                <label for="program">Guidelines Percentage:</label>
                <input type="text" required class="form-control" name="gd_total">
                <input type="hidden" name="cooking_crit_id" value="{{ $getCookingCrit->id }}">
              </div>
            
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
        </form>         
      </div>
    </div>
  </div>
