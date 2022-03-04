@extends('layouts.master')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('title')
    add teacher
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('teacher.Add-a-new-teacher') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('teacher.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('teacher.teachers') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
            <form action="{{route('teacher.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="display:flex">
                    <div class="col-6 mb-3" >
                        <label for="formGroupExampleInput" class="form-label">{{ trans('teacher.name') }}</label>
                        <input type="text" name="name" class="form-control" id="formGroupExampleInput">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="formGroupExampleInput2" class="form-label">{{ trans('teacher.gender') }}</label>
                        <select style="padding:8px" class="form-select form-control grade" name="gender" id="grade" aria-label="Floating label select example">
									<option selected disabled>{{ trans('teacher.select-gender') }}</option>
									<option value="Male">{{ trans('teacher.male') }}</option>
                                    <option value="Female">{{ trans('teacher.female') }}</option>
						</select>
                    </div>
                </div>
                <div style="display:flex">    
                    <div class="col-6 mb-3" >
                        <label for="formGroupExampleInput" class="form-label">{{ trans('teacher.pass') }}</label>
                        <input type="password" class="form-control" name="password" id="formGroupExampleInput">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="formGroupExampleInput2" class="form-label">{{ trans('teacher.email') }}</label>
                        <input type="email" class="form-control" name="email" id="formGroupExampleInput2">
                    </div>
                    </div>
                    <div style="display:flex">    
                        <div class="col-6 mb-3" >
                        <label for="formGroupExampleInput" class="form-label">{{ trans('teacher.address') }}</label>
                        <input type="text" class="form-control" name="address" id="formGroupExampleInput">
                        </div>
                    <div class="col-6 mb-3">
                        <label for="formGroupExampleInput2" class="form-label">{{ trans('teacher.phone') }}</label>
                        <input type="tel" class="form-control" name="phone" id="formGroupExampleInput2">
                    </div>
                    </div>
                    <div style="display:flex">    
                        <div class="col-6 mb-3" >
                        <label for="formGroupExampleInput" class="form-label">{{ trans('teacher.level') }}</label>
                        <select style="padding:8px" class="form-select form-control level_id" name="level_id" id="level_id" aria-label="Floating label select example">
									<option selected disabled>{{ trans('teacher.select-level') }}</option>
                                    @foreach($data as $level)
									<option value="{{ $level->id }}">{{$level->name}}</option>
                                    @endforeach
						</select>
                        </div>
                    <div class="col-6 mb-3">
                        <label for="formGroupExampleInput2" class="form-label">{{ trans('teacher.class') }}</label>
                        <select style="padding:8px" class="form-select form-control classroom_id" name="classroom_id[]" id="classroom_id" aria-label="Floating label select example"  multiple="multiple">
                            <option selected disabled>{{ trans('teacher.select-level') }}</option>
                            <option value=""></option>
                </select> 
                    </div>
                    </div>
                    <div style="display:flex">    
                        <div class="col-6 mb-3" >
                        <label for="formGroupExampleInput" class="form-label">{{ trans('teacher.photo') }}</label>
                        <input type="file" name="image" class="form-control" id="formGroupExampleInput">
                        </div>
                    <div class="col-6 mb-3">
                        <label for="formGroupExampleInput2" class="form-label">{{ trans('teacher.sallary') }}</label>
                        <input type="number" name="salary" class="form-control" id="formGroupExampleInput2">
                    </div>
                    </div>
						<button type="submit" class="btn btn-primary pl-5 pr-5 mr-3">{{ trans('teacher.save') }}</button>
            </form>
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
							$("select[name='classroom_id[]']").empty();
						$.each(data, function(key, value){
							$("select[name ='classroom_id[]']").append('<option value="' + key +'">'+ value +'</option>');
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
		$("#classroom_id").select2();
});
</script> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection