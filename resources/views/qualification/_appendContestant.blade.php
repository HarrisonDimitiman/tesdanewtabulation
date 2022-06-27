
<div class="card-body">
    <div class="float-right ">
        <div class="row mb-2">
            @if ( $status == 1)
                <span class="badge badge-success float-right " style="font-size:10px;">Completed</span>
            @elseif ( $status == 0 )
                @if ($tti_id == Auth::user()->tti_id)
                    <span class="badge badge-secondary float-right " style="font-size:10px;">Compatriot</span>
                @else
                    <span class="badge badge-secondary float-right " style="font-size:10px;">Not Yet Completed</span>
                @endif
            @endif
        </div>
    </div>
</div>

@foreach($getCo as $as)
    <div id="contestant-card-{{ $as->tti_id }}">
        
        <div class="card-body">
            <div class="row">
                <div class="col-2"><img src="{{asset('public/'.$as->con_image) }}" width="45" height="40" alt="logo"></div>
                <div class="col-8 ml-3">
                    <div class="row ml-0">
                        Name: <strong>{{$as->con_name}}</strong>
                    </div>
                    <div class="row">
                        <div class="col-5"> Age: <strong> {{$as->con_age}}</strong></div>
                        <div class="col-7"> Gender: <strong> {{$as->con_gender}}</strong></div>
                    </div>
                </div>
            </div>
            <hr>
           
            @if ( $as->tti_id== auth()->user()->tti_id)
            <button class="btn btn-block btn-info btn-sm float-right mb-2" type="button"style="width: 80px !important;" disabled>Cant' Score</button>
            @else
            <button class="btn btn-block btn-info btn-sm float-right mb-2 btn-appendScore" type="button" data-url="{{ URL::to('/showCritsForAsexual/'.$as->id.'/'.$quali_id.'/'.$tti_id) }}"style="width: 80px !important;">Score</button>
            @endif
        </div>
    </div>

@endforeach

<div class="append-appendScoreAxesual"></div>

<script>
    $('.btn-appendScore').click(function(){
        var div = $('.append-appendScore');
        div.empty();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            success:function(data){
                div.append(data);
                $('#appendScore').modal('show');
            }
        });
    });

    
</script>