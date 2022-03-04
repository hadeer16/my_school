@extends('layouts.master')
@section('css')

@section('title')
promotion
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('student.promo') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('student.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.promo') }}</li>
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
                <form action="{{ route('promotion.index') }}" method="POST">
                    @csrf
                    <div class="card col-2">
                        <h4 class="mt-3" style="color:rgba(0, 0, 255, 0.699)">{{ trans('student.old-level') }}</h4>
                    </div>
                    <div style="display:flex" class="mt-5">
                        <div class="col-sm-4 mr-5">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('student.level') }}</label>
                                    <select class="form-select form-control level_id" style="padding:8px" name="level_id" id="level_id" aria-label="Floating label select example">
                                        <option selected disabled>Select Level</option>
                                        @foreach ($level as $levels)
                                        <option value="{{ $levels->id }}">{{ $levels->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('student.classroom') }}</label>
                                        <select class="form-select form-control classroom_id" style="padding:8px" name="classroom_id" id="classroom_id" aria-label="Floating label select example">
                                            <option selected disabled>Select Level</option>
                                            <option value=""></option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card col-2">
                                <h4 class="mt-3" style="color:rgba(0, 0, 255, 0.699)">{{ trans('student.new-level') }}</h4>
                            </div>
                            <div style="display:flex" class="mt-5">
                                <div class="col-sm-4 mr-5">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">{{ trans('student.level') }}</label>
                                            <select class="form-select form-control levels_id" style="padding:8px" name="levels_id" id="level_id" aria-label="Floating label select example">
                                                <option selected disabled>Select Level</option>
                                                @foreach ($level as $levels)
                                                <option value="{{ $levels->id }}">{{ $levels->name }}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">{{ trans('student.classroom') }}</label>
                                                <select class="form-select form-control classrooms_id" style="padding:8px" name="classrooms_id" id="classroom_id" aria-label="Floating label select example">
                                                    <option selected disabled>Select Level</option>
                                                    <option value=""></option>
                                                </select>
                                                
                                            </div>
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
<script>
    $(document).ready(function() {
		$("select[name='levels_id']").on('change', function (){
			var level_id = $(this).val();
			if(level_id){
				$.ajax({
					url: "{{ URL::to('classet') }}/" + level_id,
					type: 'GET',
					datatype:'json',
					success: function(data){
						if(data){
							$("select[name='classrooms_id']").empty();
						$.each(data, function(key, value){
							$("select[name ='classrooms_id']").append('<option value="' + key +'">'+ value +'</option>');
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
