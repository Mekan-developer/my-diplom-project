@extends('layouts.admin')

@section('title', 'Admin')

@section('InternalStyle')
<style type="text/css">
    #txt {
        font-size: 48px;
    }

</style>
@endsection

@section('scriptTime')

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
                                LAB A (floor 3)
                            @else
                                LAB B (floor 4)
                            @endif
                            Specification </h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-4">
                                <ul>
                                    <li>Processor</li>
                                    <li>Motherboard</li>
                                    <li>Random Access Memory (RAM)</li>
                                    <li>Harddisk Drive (HDD)</li>
                                    <li>Keyboard</li>
                                    <li>Mouse</li>
                                </ul>
                            </div>
                             <div class="col-lg-4">
                                <ul>
                                    <li>{{$pc->spec->processor}}</li>
                                    <li>{{$pc->spec->motherboard}}</li>
                                    <li>{{$pc->spec->ram}}</li>
                                    <li>{{$pc->spec->hdd}}</li>
                                    <li>{{$pc->spec->keyboard}}</li>
                                    <li>{{$pc->spec->mouse}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
           

        </div>
@endsection