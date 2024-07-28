@extends('layouts.admin')

@section('title', 'Admin')

@section('InternalStyle')
<style type="text/css">
    .input-group {
        margin-bottom: 10px;
    }

</style>
@endsection

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-12">
                <h1>Edit Student Information</h1>
            </div>
        </div>


        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>{{$student->lname}}, {{$student->mname}} {{$student->fname}}</h3>
                </div>
                <div class="panel-body">
                    @if(Session::has('info'))
                    <div class="alert alert-success">
                        {{Session::get('info')}}
                    </div>
                    @endif
                    <div class="col-lg-4">
                        <form action="{{route('admin_update_student', ['student_id'=> $student->barcode])}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control" required="" value="{{$student->lname}}">
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control" required="" value="{{$student->fname}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" required="" value="{{$student->email}}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="addr" class="form-control" required="" value="{{$student->address}}">
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" name="contact" class="form-control" required="" value="{{$student->contact}}">
                        </div>

                        </form>
                    </div>
                    <div class="col-md-4">
                        <img src="{{URL::to('images')}}/{{$student->profile_path}}" height="200px">

                    </div>

                </div>
            </div>
        </div>

    </div>


</div>

@endsection

