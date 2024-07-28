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
                       <h1>Ýolbaşçylar</h1>
                       @if(Session::has('staff'))
                            <div class="alert alert-success">
                                {{Session::get('staff')}}
                            </div>
                        @endif
                    </div>
                </div>
               
                <div class="col-lg-6 col-lg-offset-3">
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
                                {{-- <h1>Ýolbaşçylar</h1> --}}
                                <button class="btn btn-danger" data-toggle="modal" data-target="#addStudent"><i class="glyphicon glyphicon-retweet"></i>ýolbaşçy goşmak</button>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ady</th>
                                            <th>Familyasy</th>
                                            {{-- <th>Middle Name</th> --}}
                                            {{-- <th>Gender</th> --}}
                                            <th>Email</th>
                                            <th>Laboratoriýa</th>
                                            
                                        </tr>   
                                    </thead>  
                                    
                                        
                                    <tbody>
                                        @foreach($staffs as $staff)
                                        
                                            <tr>
                                                <td>{{$staff->id}}</td>
                                                <td>{{$staff->f_name}}</td>
                                                <td>{{$staff->l_name}}</td>
                                                {{-- <td>{{$staff->m_name}}</td> --}}
                                                {{-- <td>{{$staff->gender}}</td> --}}
                                                <td>{{$staff->email}}</td>
                                                <td>
                                                @if(!is_null($staff->role))
                                                    {{ $staff->role->name }}
                                                @endif
                                                    {{-- 
                                                    @if(is_null($staff->role->name))
                                                        {{ $staff->role->name }}
                                                    @endif --}}
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody> 
                                </table>
                            </div>
                       </div>

                      
                    </div>

                </div>
            </div>
        </div>
       
        <div class="modal fade" id="addStudent">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-head">
                        
                    </div>
                    <div class="modal-body">
                        <h3>Ýolbaşçy maglumady</h3>
                        <form action="{{route('add_staff')}}" method="post">
                            {{csrf_field()}}
                           
                            <div class="input-group">
                                <span class="input-group-addon" id="addon1"><i class="glyphicon glyphicon-list-alt"></i></span>
                                <input type="text" name="id" class="form-control" placeholder="ýolbaşçy id" required="">
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
                            <div class="form-group">
                                {{-- <label>Gender</label>
                                <select name="gender" required="">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select> --}}
                                 <label>Laboratoriýa</label>
                                <select name="role" required="">
                                    <option value="2">Lab A (3-nji gat)</option>
                                    <option value="3">Lab B (4-nji gat)</option>
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