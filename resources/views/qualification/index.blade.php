@extends('dashboard.base')

@section('content')
@include('qualification.addQualificationContestant')


<div class="container-fluid">
    <button class="btn btn-primary ml-auto" type="button" data-toggle="modal" data-target="#contestantModal">
        <i class="cil-plus"></i>
        Create
    </button> 
    <a href="{{ URL::to('/feedsGenerateTopTen/'.$getQuali->id) }}"><button class="btn btn-primary ml-auto" type="button">
        <i class="cil-plus"></i>
        Generate Top 10
    </button></a>
    <br><br>
    <div class="card">
            
            <div class="card-header" style="background-image: url('assets/img/vgd.png');width: 100%;height: 90px; margin-left: auto;margin-right: auto; display: block;">
                <div class="card mt-3" style="height:30px; opacity: 0.9;">
                    <strong style="font-size:15px;" class="mt-1 text-center"><strong style="color:ffffff;"> {{ $getQuali ->quali_name }}</strong></strong> 
                </div>
            </div>
            <div class="row justify-content-end pt-1" >
                <div class="col-11">
                    <h6 class="float-right" style="font-size:12px;">Status: &nbsp;<span class="badge badge-danger float-right px-0" style="width:40px;">Ongoing</span></h6>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="card-body pt-0" style="height: 40px !important;">
                <div class="d-flex justify-content-around">
                    Contestant:<strong>11</strong>Judge:<strong>14</strong>Expert:<strong>14</strong>
                </div>
            </div>
    </div>
    <div class="card">
            <div class="card mb-0">
               @foreach($getContestant as $con)
                <div class="card-header contestant"  data-tti=".append-contestant-{{ $con->tti_id }}" data-url="{{ URL::to('contestantShow/'.$con->tti_id.'/'.$con->quali_id) }}">
                    <h5 class="mb-0">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{asset('public/'.$con->tti_image) }}" width="45" height="40" alt="logo">
                            </div>
                            <div class="col-8">
                                <a>
                               {{$con->tti_name}}
                                </a>
                            </div>
                            {{-- <div class="col-2 p-0 align-self-end">
                                <div class="row mb-2">
                                    @if ( $con->tti_id== Auth::user()->tti_id)
                                        <span class="badge badge-secondary float-right " style="font-size:10px;">Compatriot</span>
                                    @else
                                        <span class="badge badge-success float-right " style="font-size:10px;">Completed</span>
                                    @endif
                                </div>
                                <div class="row"><h6 class="mt-auto bd-highlight float-right" style="font-size:10px;">{{$con->tti_abrv}}</h6></div>
                            </div> --}}
                        </div>
                    </h5>
                </div>
                <!-- append start -->
                <div class="append-contestant-{{ $con->tti_id }}"></div>
                <!-- append end -->
               @endforeach
                
            </div>  
    </div>
          
</div>

<div class="append-appendScore"></div>




@endsection

@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection
@section('script')
<script>
    $(".contestant").click(function(){
 
        var tti = $(this).data('tti');
        var div = $(tti);
      
        if($('*').hasClass('activeCon')){
            div.removeClass('activeCon');
            div.empty();
        }else{
            div.empty();
            var url = $(this).data('url');
            $.ajax({
                url: url,
                success:function(data){
                    div.append(data);
                    div.addClass("activeCon");
                    // var cc = $('#contestant-card');
                    // var cc_show = $(cc);
                    // cc_show.show();
                }
            });
        }
      
    });
</script>
{{-- <script type="text/javascript">
    $(".con").hide();
    $(".addCon").click(function(){
        $(".con").val(null);
        $(".con").show();
    });
    $(".removeCon").click(function(){
        $(':input').val('');
        $(".con").hide();
    });
</script> --}}
<script>
     $(document).ready(function() {
        $("#form").submit(function() {
            $(this).submit(function() {
                return false;
            });
            return true;
        });
</script>
@endsection
