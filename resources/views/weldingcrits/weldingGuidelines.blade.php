@extends('dashboard.base')

@section('content')
@include('weldingcrits._createGuideline')


<div class="container-fluid">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
         <a href="{{ URL::to('/weldingcrits') }}">
          <li class="breadcrumb-item" aria-current="page">Criteria Welding</li>
         </a>
         &nbsp;/&nbsp;
          <li class="breadcrumb-item active " aria-current="page">Guideline Welding</li>
        </ol>
      </nav>
        <div class="fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex">
                        <h4>
                            <i class="fa fa-align-justify"></i>
                             {{ __('Welding Management for Guidelines') }} {{ $getWeldingCrit->crit_name }}</h4>
                            <button class="btn btn-primary ml-auto" type="button" data-toggle="modal" data-target="#weldingCritsCreate">
                                <i class="cil-plus"></i>
                                Create
                            </button>          		
                        </div>
                    
                        <div class="card-body">
                           
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Guideline Name</th>
                                        <th>Guideline Percentage</th>
                                        <th width="9%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getWeldingGuidlines as $getWeldingGuidlines)
                                        <tr>
                                            <td>{{ $loop->iteration ?? '' }}</td>
                                            <td>{{ $getWeldingGuidlines->gd_name ?? '' }}</td>
                                            <td>{{ $getWeldingGuidlines->gd_total ?? '' }}</td>
                                            <td style="width: 9%;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="cil-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button type="button" class="dropdown-item btn btn-edit" data-url="">
                                                            <i class="cil-pencil"></i>
                                                            &nbsp;Update
                                                        </button>
                                                        
                                                        <form action="" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="button" class="dropdown-item btn btn-danger float-right btn-delete">
                                                                <i class="cil-trash"></i>
                                                                &nbsp;Delete
                                                            </button>
                                                        </form>	   
                                                    </div>
                                                </div>    
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    
    <div class="append-program"></div>

@endsection
@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection
@section('script')
    <script type="text/javascript">       
        $('.btn-edit').click(function(){
			var div = $('.append-program');
			div.empty();

			var url = $(this).data('url');

			$.ajax({
			    url: url,
			    success:function(data){
			        div.append(data);
			        $('#edit_program').modal('show');
			    }
			});
		});

        $('.btn-delete').click(function(e){
			swal ({
			    title: "Are you sure?",
			      text: "Are you sure you want to delete this program?",
			      icon: "warning",
			      buttons: true,
			      dangerMode: true,
			}).then((result) => {
				if (result) {
					$(this).closest('form').submit();
				}
			})
		});
    </script>
@endsection