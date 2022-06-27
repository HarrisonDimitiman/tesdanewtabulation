<div class="modal fade" id="appendScoreAxesual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Criterias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      
         <table class="table">
          <thead>
            <tr>
              <th scope="col">Guidelines {{ $crit_id }}</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          
          <tbody>
            
                @foreach ($getAsexualGuidlines as $getAsexualGuidlines )
                <tr>
                  <td>{{ $getAsexualGuidlines->gd_name}}</td>
                  <td>
                    <input type="number" disabled name="score_asexual[]" required value="{{ $getAsexualGuidlines->score }}">
                    <input type="hidden" name="guideAsexualId[]" required value="{{ $getAsexualGuidlines->id }}">
                  </td>
                </tr>
                @endforeach
                
          </tbody>
        </table>

        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
  </div>