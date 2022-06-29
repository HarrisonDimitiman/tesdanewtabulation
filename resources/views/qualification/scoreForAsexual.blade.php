<div class="modal fade" id="appendScoreAxesual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Guidelines</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ URL::to('/submitScoreAsexual/'.$tti_id.'/'.$quali_id.'/'.$crit_id.'/'.$id) }}" method="POST" id="form">
            @csrf
         <table class="table">
          <thead>
            <tr>
              <th scope="col">Guidelines </th>
              <th width="5%">Score</th>
            </tr>
          </thead>
          
          <tbody>
              @foreach ($getAsexualGuidlines as $getAsexualGuidlines )
              <tr>
                <td>{{ $getAsexualGuidlines->gd_name}} <strong>({{ $getAsexualGuidlines->gd_total}} pts)</strong></td>
                <td>
                  <input type="number" name="score_asexual[]" style="width: 40px;text-align:center;" step="0.01" required max="{{ $getAsexualGuidlines->gd_total }}">
                  <input type="hidden" name="guideAsexualId[]"required value="{{ $getAsexualGuidlines->id }}">
                </td>
              </tr>
              @endforeach
                
          </tbody>
        </table>
            <button type="submit" class="btn btn-success float-right">Submit</button>
        </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
  </div>
  <script>
   $(document).ready(function() {
        $("form").submit(function() {
            $(this).submit(function() {
                return false;
            });
            return true;
        });     
    }); 
</script>