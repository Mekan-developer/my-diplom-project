@extends('layouts.admin')

@section('title', 'Admin')

@section('InternalStyle')
<style type="text/css">
    .input-group{
            margin-bottom: 10px;
    }
</style>
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">  
                <div class="row">
                    <div class="col-lg-12">
                       <h1>Pc Information</h1>     
                        @if(Session::has('added'))
                            <div class="alert alert-success">
                                {{Session::get('added')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3>PC {{$pc->pc_no}} in Room 
                             @if($pc->room == 1)
                                LAB A
                             @else
                                LAB B
                             @endif 
                            Specification Edit</h3>
                        </div>
                        <div class="panel-body">
                             @if(Session::has('info'))
                                <div class="alert alert-success">
                                    {{Session::get('info')}}
                                </div>
                             @endif
                            <div class="col-lg-4">
                                <form action="{{route('admin_pc_update', ['pc_id'=> $pc->id, 'room'=> $pc->room])}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group {{$errors->has('cpu') ? 'has-error' : ''}}">
                                        <label>Processor</label>
                                        <input type="text" name="cpu" class="form-control" value="{{$pc->spec->processor}}" required="">
                                    </div>
                                    <div class="form-group {{$errors->has('mobo') ? 'has-error' : ''}}">
                                        <label>Motherboard</label>
                                        <input type="text" name="mobo" class="form-control" value="{{$pc->spec->motherboard}}" required="">
                                    </div>
                                    <div class="form-group {{$errors->has('ram') ? 'has-error' : ''}}">
                                        <label>RAM</label>
                                        <input type="text" name="ram" class="form-control" value="{{$pc->spec->ram}}" required="">
                                    </div>

                                    <div class="form-group {{$errors->has('pc_ip') ? 'has-error' : ''}}">
                                        <label>IP</label>
                                        <input type="text" name="pc_ip" class="form-control" value="{{$pc->pc_ip}}" required="">
                                    </div>

                                    <button class="btn btn-primary" type="submit">Update</button>                            
                            </div>
                             <div class="col-lg-4">
                                    <div class="form-group {{$errors->has('hdd') ? 'has-error' : ''}}">
                                        <label>HDD</label>
                                        <input type="text" name="hdd" class="form-control" value="{{$pc->spec->hdd}}" required="">
                                    </div>
                                    <div class="form-group {{$errors->has('keyboard') ? 'has-error' : ''}}">
                                        <label>Keyboard</label>
                                        <input type="text" name="keyboard" class="form-control" value="{{$pc->spec->keyboard}}" required="">
                                    </div>
                                    <div class="form-group {{$errors->has('mouse') ? 'has-error' : ''}}">
                                        <label>Mouse</label>
                                        <input type="text" name="mouse" class="form-control" value="{{$pc->spec->mouse}}" required="">
                                    </div>
                                  </form>  
                            </div>
                        </div>
                    </div>
                </div>       
            </div>
        </div>
@endsection