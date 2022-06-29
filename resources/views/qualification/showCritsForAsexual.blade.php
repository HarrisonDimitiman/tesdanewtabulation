<div class="modal fade" id="appendScore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> {{ $title }} Criterias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <table class="table">
          <thead>
            <tr>
              <th scope="col">First</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @for($i = 0; $i < $dataLength; $i++)
            <tr>
              <td>{{ $data[$i]['crit_name'] }}</td>
              <td>
                @if ($data[$i]['status'] == 'Already Score')
                  <button class="btn btn-block btn-success btn-sm showScore" type="button" data-url="{{ URL::to('/showScore/'.$id.'/'.$quali_id.'/'.$tti_id.'/'.$data[$i]['id']) }}"> View Score</button>
                @else
                  <button class="btn btn-block btn-info btn-sm scoreForAsexual" type="button" data-url="{{ URL::to('/scoreForAsexual/'.$id.'/'.$quali_id.'/'.$tti_id.'/'.$data[$i]['id']) }}"> Score</button>
                @endif
               
              </td>
            </tr>
            @endfor
          </tbody>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <script>
    $('.scoreForAsexual').click(function(){
        var div = $('.append-appendScoreAxesual');
        div.empty();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            success:function(data){
                div.append(data);
                $('#appendScoreAxesual').modal('show');
            }
        });
    });

    $('.showScore').click(function(){
        var div = $('.append-appendScoreAxesual');
        div.empty();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            success:function(data){
                div.append(data);
                $('#appendScoreAxesual').modal('show');
            }
        });
    });
  </script>