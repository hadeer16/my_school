@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> ncvlxcnvxcnvxcv</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
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
                <form action="{{route('file.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Upload File</label>
                <input type="file" class="form-control" name="files" id="files" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">{{ trans('dash.classes') }}</label>
                <select class="form-select form-control classroom_id" name="classroom_id" id="classroom_id" aria-label="Floating label select example">
                    <option selected disabled>{{ trans('dash.classes') }}</option>
                    @foreach($classes as $classes)
                    <option value="{{$classes->id}}">{{$classes->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">المادة</label>
                <select class="form-select form-control subject_id" name="subject_id" id="subject_id" aria-label="Floating label select example">
                    <option selected disabled>{{ trans('dash.classes') }}</option>
                    <option value=""></option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
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
		$("select[name='classroom_id']").on('change', function (){
			var classes = $(this).val();
			if(classes){
				$.ajax({
					url: "{{ URL::to('classes') }}/" + classes,
					type: 'GET',
					datatype:'json',
					success: function(data){
						if(data){
							$("select[name='subject_id']").empty();
						$.each(data, function(key, value){
							$("select[name ='subject_id']").append('<option value="' + key +'">'+ value +'</option>');
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
