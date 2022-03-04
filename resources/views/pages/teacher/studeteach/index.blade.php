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
            <h4 class="mb-0">Student</h4>
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
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Classroom</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;?>
                        @foreach($student as $data)
                        <?php $i++?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->classes->name }}</td>
                            <td>
                            <a href="" class="btn btn-danger">درجات الطالب</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
