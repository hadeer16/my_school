@extends('layouts.master')
@section('css')

@section('title')
    edit post
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> edit post</h4>
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
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('post.update',$post->id)}}">
                                        @method('put')
                                            @csrf
                                            <div class="col-6 mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">{{ trans('dash.classes') }}</label>
                                                <select class="form-select form-control classroom_id" style="padding:5px" name="classroom_id" id="classroom_id" aria-label="Floating label select example">
                                                    <option selected disabled value="{{$post->classes->id}}">{{ $post->classes->name }}</option>
                                                    @foreach ($classes as $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                                <div class="form-group">
                                                <label for="formGroupExampleInput2">{{ trans('dash.posts') }}</label>
                                                </br>
                                                <textarea name="content" id="" cols="60" rows="10">{{$post->content}}</textarea>
                                                </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('level.close') }}</button>
                                                <button type="submit" class="btn btn-primary">{{ trans('level.save') }}</button>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                        </div>
                    </div>
            </div>
<!-- row closed -->
@endsection
@section('js')

@endsection
