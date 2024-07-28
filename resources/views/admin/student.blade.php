@extends('layouts.admin')

@section('title', 'Students')

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
                <h1>Talyplar</h1>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">

                @if(Session::has('added'))
                <div class="alert alert-success">
                    {{Session::get('added')}}
                </div>
                @endif
                @if(Session::has('info'))
                <div class="alert alert-danger">
                    {{Session::get('info')}}
                </div>
                @endif
                <div class="panel panel-info">
                    <div class="panel-heading">
                        {{-- <h1>Students List</h1> --}}
                        <button class="btn btn-danger" data-toggle="modal" data-target="#addStudent"><i class="glyphicon glyphicon-retweet"></i> Talyp goşmak</button>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ady</th>
                                    <th>Familýasy</th>
                                    {{-- <th>Middle Name</th> --}}


                                    <th>Doglan senesi</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td><a href="{{route('student_info', ['student_id'=> $student->barcode])}}" class="badge">{{$student->barcode}}</a></td>
                                    <td>{{$student->fname}}</td>
                                    <td>{{$student->lname}}</td>
                                    {{-- <td>{{$student->mname}}</td> --}}
                                    <td>{{$student->dob}}</td>


                                    <td>
                                        <a href="{{route('admin_edit_student', ['student_id'=> $student->barcode])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="{{route('student_delete', ['student_id'=> $student->barcode])}}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <center>{{ $students->links() }}</center>
                    </div>
                </div>


            </div>

            <div class="col-lg-4">

            </div>
        </div>
    </div>


</div>

<div class="modal fade" id="addStudent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-head">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <button class="close" data-dismiss="modal" type="button">&copy;</button>
            </div>
            <div class="modal-body">
                <h3>Talybyň maglumaty</h3>
                <form action="{{route('studentCheck')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-qrcode"></i></span>
                        <input type="text" name="barcode" class="form-control" placeholder="talybyň kody" required="">
                    </div>
                    {{-- <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <input type="text" name="student_id" class="form-control" placeholder="Student ID" required="">
                    </div> --}}
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-camera"></i></span>
                        <input type="file" name="profile" class="form-control" required="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="fname" class="form-control" placeholder="Ady" required="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="lname" class="form-control" placeholder="Familýasy" required="">
                    </div>
                    {{-- <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="mname" class="form-control" placeholder="Middle Name" required="">
                            </div> --}}
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1">@</span>
                        <input type="text" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1">@</span>
                        <input type="text" name="contact" class="form-control" placeholder="+993" required="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1">Doglan senesi</span>
                        <input type="date" name="dob" class="form-control" placeholder="Date of Birth" required="">
                    </div>
                    <div class="form-group">
                        {{-- <label>Gender</label>
                        <select name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select> --}}

                        <label>Kursy</label>
                        <select name="course">
                            <option value="LLD">1-nji kurs</option>
                            <option value="1 course">2-nji kurs</option>
                            <option value="2 course">3-nji kurs</option>
                            <option value="3 course">4-nji kurs</option>
                            <option value="4 course">5-nji kurs</option>
                        </select>
                    </div>



                    <div class="form-group">
                        <textarea class="form-control" placeholder="Salgysy" name="address" required=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Ýatda saklat</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
