@extends('layouts.admin')

@section('title', 'PCs')

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


        <div class="row" style="margin-bottom: 10px">
            <div class="col-lg-12">
                <h1>Kompýuter</h1>
                <button class="btn btn-danger" data-toggle="modal" data-target="#addPc"><i class="glyphicon glyphicon-retweet"></i> Komýuter goşmak</button>
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
            </div>
        </div>


        <div class="row">
            <div class="col-lg-8">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>3-nji gat laboratoriýa</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>PC No.</th>
                                    <th>Familýasy</th>
                                    <th>Ady</th>
                                    <th>Kursy</th>
                                    <th>Ýolbaşçy</th>
                                    <th>Başlanan wagty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($logs->count())
                                @foreach($logs as $log)
                                @if($log->staff->role_id == 2)
                                <tr>
                                    <td>{{$log->computer_id}}</td>
                                    <td>{{$log->student->fname}}</td>
                                    <td>{{$log->student->lname}}</td>
                                    <td>{{$log->student->course}}</td>

                                    <td>{{$log->staff->l_name}}</td>
                                    <td>{{$log->created_at->diffForHumans()}}</td>
                                </tr>

                                @endif
                                @endforeach
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1>4-nji gat laboratoriýa</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>PC No.</th>
                                    <th>Ady</th>
                                    <th>Familyasy</th>
                                    <th>Kursy</th>
                                    <th>Ýolbaşçy</th>
                                    <th>Başlanan wagyt</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($logs->count())
                                @foreach($logs as $log)
                                @if($log->staff->role_id == 3)
                                <tr>
                                    <td>{{$log->computer_id}}</td>
                                    <td>{{$log->student->fname}}</td>
                                    <td>{{$log->student->lname}}</td>
                                    <td>{{$log->student->course}}</td>
                                    <td>{{$log->staff->l_name}}</td>
                                    <td>{{$log->created_at->diffForHumans()}}</td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1>Labaratory A PC</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <head>
                                <tr>
                                    <th>No.</th>
                                    <th>Labaratory</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </head>

                            <tbody>
                                @foreach($pcs as $pc)
                                @if($pc->room == 1)
                                <tr>
                                    <td><a href="#">{{$pc->pc_no}}</a></td>
                                    <td>LAB A</td>
                                    <td>
                                        <?php 
                                                    if($pc->status == 0){
                                                        echo 'available';
                                                    }else{
                                                        echo'used';
                                                    }
                                                ?>

                                    </td>
                                    <td>
                                        <a href="{{route('admin_pc_edit',['pc_id'=> $pc->id, 'room'=> $pc->room])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="{{route('pc_delete', ['pc_id'=> $pc->id, 'room'=> $pc->room])}}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1>Labaratory B PC</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <head>
                                <tr>
                                    <th>No.</th>
                                    <th>Labaratory</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </head>

                            <tbody>
                                @foreach($pcs as $pc)
                                @if($pc->room == 2)
                                <tr>
                                    <td><a href="#">{{$pc->pc_no}}</a></td>
                                    <td>LAB B</td>
                                    <td>
                                        <?php 
                                                    if($pc->status == 0){
                                                        echo 'available';
                                                    }else{
                                                        echo'used';
                                                    }
                                                ?>

                                    </td>
                                    <td>
                                        <a href="{{route('admin_pc_edit',['pc_id'=> $pc->id, 'room'=> $pc->room])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="{{route('pc_delete', ['pc_id'=> $pc->id, 'room'=> $pc->room])}}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                {{-- <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1>CAS 8 PC</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <head>
                                <tr>
                                    <th>No.</th>
                                    <th>Room</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </head>

                            <tbody>
                                @foreach($pcs as $pc)
                                @if($pc->room == 4)
                                <tr>
                                    <td><a href="#">{{$pc->pc_no}}</a></td>
                                    <td>CAS 8</td>
                                    <td>
                                        <?php 
                                                    if($pc->status == 0){
                                                        echo 'available';
                                                    }else{
                                                        echo'used';
                                                    }
                                                ?>

                                    </td>
                                    <td>
                                        <a href="{{route('admin_pc_edit',['pc_id'=> $pc->id, 'room'=> $pc->room])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="{{route('pc_delete', ['pc_id'=> $pc->id, 'room'=> $pc->room])}}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addPc">
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
            </div>
            <div class="modal-body">
                <h3>PC Information</h3>
                <form action="{{route('addPc')}}" method="post">
                    {{csrf_field()}}
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                        <input type="text" name="pc" class="form-control" placeholder="PC No." required="">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                        <input type="text" name="pc_ip" class="form-control" placeholder="PC IP." required="">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon" id="addon1">Laboratory</span>
                        <select name="room" class="form-control" required="">
                            <option value="1"><strong>LAB A (3 floor) </strong></option>
                            <option value="2"><strong>LAB B (4 floor)</strong></option>
                        </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                        <input type="text" name="cpu" class="form-control" placeholder="CPU" required="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                        <input type="text" name="motherboard" class="form-control" placeholder="Motherboard" required="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                        <input type="text" name="ram" class="form-control" placeholder="RAM" required="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                        <input type="text" name="hdd" class="form-control" placeholder="HDD" required="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                        <input type="text" name="keyboard" class="form-control" placeholder="Keyboard" required="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-blackboard"></i></span>
                        <input type="text" name="mouse" class="form-control" placeholder="Mouse" required="">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

