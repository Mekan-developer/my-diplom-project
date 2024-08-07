<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OGUZCAMPLAB Attendant</title>

    
    <link href="{{URL::to('admin/css/bootstrap.min.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('admin/css/sb-admin.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('admin/css/plugins/morris.css')}}" rel="stylesheet">

    
    <link href="{{URL::to('admin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

   <style type="text/css">
       #login{
        font-size: 80px;
        color: green;
        padding: 10px 10px;
       }
       #pc{
        margin-top: 10%;
       }
   </style>
</head>

<body>

    <div id="wrapper">

       
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" data-toggle="modal" data-target="#test">OGUZCAMPLAB</a>
            </div>
            
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->f_name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        
                        <li>
                            <a href="{{route('settings')}}"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                	<center>
                		<img src="{{URL::to('asset/images/admin.png')}}" height="80px" width="80px">
                	</center>
                    <li>
                       <a href="#">
                       		<p class="text-center" style="color: #fff">{{Auth::user()->l_name}}, {{Auth::user()->f_name}} {{Auth::user()->m_name}}</p>
                       		<p class="text-center" style="color: #fff">Online</p>
                       
                       </a>
                    </li>
                    <li>
                        <a href="{{route('staff')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li>
                        <a href="{{route('staff_login')}}"><i class="fa fa-fw fa-dashboard"></i> LogIn</a>
                    </li>
                    <li>
                        <a href="{{route('staff_logout')}}"><i class="fa fa-fw fa-dashboard"></i> LogOut</a>
                    </li>
                    <li class="active">
                        <a href="{{route('settings')}}"><i class="fa fa-fw fa-dashboard"></i>Settings</a>
                    </li>
                    
                    <li>
                        <a href="{{route('staff_report')}}"><i class="fa fa-fw fa-dashboard"></i> Reports</a>
                    </li>
                    
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

               
                <div class="row">
                    <div class="col-lg-12">
                       <h1>Settings</h1>
                    </div>
                </div>
               

                <div class="row">
                    <div class="col-lg-12">
                       <div class="panel panel-info">
	                       	<div class="panel-heading">
	                       		<h1 class="text-center">User Settings</h1>
	                       	</div>
	                       	<div class="panel-body">
	                       		
                                <div class="col-lg-5">
                                    @if(Session::has('info'))
                                        <div class="alert alert-success">
                                            {{Session::get('info')}}
                                        </div>
                                    @endif
                                    <form action="{{route('staff_change_settings')}}" method="POST">
                                        {{csrf_field()}}
                                         <div class="form-group {{$errors->has('pass') ? 'has-error' : ''}}">
                                            <label>New Password</label>
                                            <input type="password" name="pass" class="form-control">
                                            @if($errors->has('pass'))
                                               <span class="help-block">{{$errors->first('pass')}}</span> 
                                            @endif
                                        </div>
                                         <div class="form-group {{$errors->has('pass2') ? 'has-error' : ''}}">
                                            <label>Repeat New Password</label>
                                            <input type="password" name="pass2" class="form-control">
                                            @if($errors->has('pass2'))
                                               <span class="help-block">{{$errors->first('pass2')}}</span> 
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                     </form>   
                                    
                                    
                                </div>

                                <div class="col-lg-4">
                                     @if(Session::has('user'))
                                        <div class="alert alert-success">
                                            {{Session::get('user')}}
                                        </div>
                                    @endif
                                  <form action="{{route('staff_change_info')}}" method="POST">
                                    {{csrf_field()}}
                                      <div class="form-group {{$errors->has('lname') ? 'has-error' : ''}}">
                                          <label>Last Name</label>
                                          <input type="text" name="lname" class="form-control" value="{{$user->l_name}}" required="">
                                      </div>
                                      <div class="form-group {{$errors->has('fname') ? 'has-error' : ''}}">
                                          <label>First Name</label>
                                          <input type="text" name="fname" class="form-control" value="{{$user->f_name}}" required="">
                                      </div>
                                      {{-- <div class="form-group {{$errors->has('mname') ? 'has-error' : ''}}">
                                          <label>Middle Name</label>
                                          <input type="text" name="mname" class="form-control" value="{{$user->m_name}}" required="">
                                      </div> --}}
                                      <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                          <label>Email</label>
                                          <input type="text" name="email" class="form-control" value="{{$user->email}}" required="">
                                      </div>
                                      <div class="form-group {{$errors->has('addr') ? 'has-error' : ''}}">
                                          <label>Address</label>
                                          <textarea class="form-control" name="addr" required="">{{$user->address}}</textarea>
                                      </div>
                                      <button class="btn btn-info" type="submit">Update</button>
                                  </form>
                                </div>

                                <div class="col-lg-3">
                                    
                                </div>

                                
	                       	</div>
                       </div>

                       
                    </div>

                    
                </div>
                
               

               

               
                    
                    

            </div>
           

        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('admin/js/jquery.js')}}"></script>

    
    <script src="{{URL::to('admin/js/bootstrap.min.js')}}"></script>

    
    <script src="{{URL::to('admin/js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{URL::to('admin/js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{URL::to('admin/js/plugins/morris/morris-data.js')}}"></script>

</body>

</html>
