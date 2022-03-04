@extends('layouts.master')
@section('css')

@section('title')
    fees
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('fees.fees') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('fees.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('fees.fees') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('classroom.add') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('fees.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('fees.name') }}</label>
                                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter the name of Level">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('fees.amount') }}</label>
                                    <input type="number" name="amount" class="form-control" id="formGroupExampleInput" placeholder="Enter the name of Level">
                                </div>
                                <label for="formGroupExampleInput">{{ trans('fees.level') }}</label>
								<select class="form-select form-control level_id" name="level_id" id="level_id" aria-label="Floating label select example">
									<option selected disabled>Select Level</option>
                                    @foreach ($level as $levels)
                                    <option value="{{ $levels->id }}">{{ $levels->name }}</option>
                                    @endforeach
								</select>
                                <label for="formGroupExampleInput">{{ trans('fees.classes') }}</label>
								<select class="form-select form-control classroom_id" name="classroom_id" id="classroom_id" aria-label="Floating label select example">
									<option selected disabled>Select classroom</option>
								</select>
                                <div class="form-group">
                                <label for="formGroupExampleInput2">{{ trans('fees.note') }}</label>
                                <input type="text" name="note" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('fees.close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ trans('fees.save') }}</button>
                            </div>
                        </form>
                    </div>
        </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary mb-3 mr-3" data-toggle="modal" data-target="#exampleModal">
        {{ trans('fees.add-fees') }}
    </button>
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @foreach ($level as $data)
                <div id="accordion">
                    <div class="card mb-5">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne{{ $data->id }}" aria-expanded="true" aria-controls="collapseOne">
                                {{ $data->name }}
                            </button>
                            </h5>
                        </div>
                        <div id="collapseOne{{ $data->id }}" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="card-title mg-b-0">{{ trans('student.table') }}</h6>
                                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                                            </div>
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>{{ trans('fees.id') }}</th>
                                                        <th>{{ trans('fees.name') }}</th>
                                                        <th>{{ trans('fees.amount') }}</th>
                                                        <th>{{ trans('fees.classes') }}</th>
                                                        <th>{{ trans('fees.note') }}</th>
                                                        <th>{{ trans('teacher.action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0;?>
                                                    @foreach ($data->fees as $levelss)
                                                    <?php $i++?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $levelss->name }}</td>
                                                        <td>{{ $levelss->amount }}</td>
                                                        <td>{{ $levelss->classes->name }}</td>
                                                        <td>{{ $levelss->note }}</td>
                                                        <td>
                                                            <button  type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                            <a href="" class="btn btn-primary mt-2"><i class="fas fa-edit"></i></a>
                                                            <button  type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#show">
                                                            <i class="fas fa-eye"></i>
                                                            </button>
                                                        </td>
                                                        {{-- model delete --}}
                                                        
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                </div>  <!--/div-->
                        </div>
                        </div>
                    </div>
                </div>   
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
		$("select[name='level_id']").on('change', function (){
			var level_id = $(this).val();
			if(level_id){
				$.ajax({
					url: "{{ URL::to('classet') }}/" + level_id,
					type: 'GET',
					datatype:'json',
					success: function(data){
						if(data){
							$("select[name='classroom_id']").empty();
						$.each(data, function(key, value){
							$("select[name ='classroom_id']").append('<option value="' + key +'">'+ value +'</option>');
						});
						}
						else
						{
							console.log('no');
						}
					}
				});
			}else{
				console.log('no');
			}
		});
    $('#classroom_id').select2();
});
</script>
@endsection
