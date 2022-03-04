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
            <h4 class="mb-0"> اعضاء هيئة الندريس</h4>
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
                <div class="card" style="width: 50%;">
                    <ul class="list-group list-group-flush">
                        @foreach ($subjects as $data)
                        @foreach ($data->teachers()->pluck('name')->toArray() as $teacher)
                        <a href="{{ route('studsubject.edit',$data->id) }}" class="text-info"><li class="list-group-item" style="font-size:19px">{{ $teacher}}</li></a>
                        @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
