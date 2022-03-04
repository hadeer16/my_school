@extends('layouts.master')
@section('css')

@section('title')
    add students
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('student.add') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('student.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.student') }}</li>
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
                <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="display:flex">
                        <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('student.name') }}</label>
                            <input type="text" name="name" autocomplete="off" class="form-control" id="formGroupExampleInput">
                        </div>
                        <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('student.gender') }}</label>
                            <select class="form-select form-control gender" style="padding:8px" name="gender" id="gender" aria-label="Floating label select example">
                                <option selected disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div style="display:flex">    
                        <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('student.email') }}</label>
                            <input type="email" autocomplete="off" class="form-control" name="email" id="formGroupExampleInput">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('student.pass') }}</label>
                            <input type="password" class="form-control" name="password" id="formGroupExampleInput2">
                        </div>
                        </div>
                        <div style="display:flex">    
                        <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('student.date') }}</label>
                            <input type="date" class="form-control birth" name="birth" id="formGroupExampleInput">
                        </div>
                        <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('student.religion') }}</label>
                            <select class="form-select form-control religion" style="padding:8px" name="religion" id="religion" aria-label="Floating label select example">
                                <option selected disabled>Select religion</option>
                                <option value="Muslim">{{ trans('student.muslim') }}</option>
                                <option value="Christian">{{ trans('student.christian') }}</option>
                                <option value="Other">{{ trans('student.other') }}</option>
                            </select>
                            </div>
                        </div>
                        <div style="display:flex">    
                            <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('student.level') }}</label>
                            <select class="form-select form-control level_id" style="padding:8px" name="level_id" id="level_id" aria-label="Floating label select example">
                                <option selected disabled>{{ trans('student.level') }}</option>
                                @foreach ($level as $levels )
                                <option value="{{ $levels->id }}">{{ $levels->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('student.classroom') }}</label>
                            <select style="padding:8px" class="form-select form-control classroom_id" name="classroom_id" id="classroom_id" aria-label="Floating label select example">
                                <option selected disabled>{{ trans('teacher.select-class') }}</option>
                                <option value=""></option>
                    </select>
                        </div>
                        </div>
                        <div style="display:flex">  
                            <div class="col-6 mb-3">
                                <label for="formGroupExampleInput2" class="form-label">{{ trans('student.parent') }}</label>
                                <select class="form-select form-control myparent_id" style="padding:8px" name="myparent_id" id="myparent_id" aria-label="Floating label select example">
                                    <option selected disabled>{{ trans('student.parent') }}</option>
                                    @foreach($my_pare as $parents)
                                    <option value="{{ $parents->id }}">{{ $parents->name_father }}</option>
                                    @endforeach
                        </select>
                            </div>
                            <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('student.img') }}</label>
                            <input type="file" class="form-control" name="img" id="formGroupExampleInput">
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary pl-5 pr-5 mr-3">{{ trans('parent.save') }}</button>
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
