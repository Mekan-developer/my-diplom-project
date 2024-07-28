<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    
    <link href="{{URL::to('admin/css/bootstrap.min.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('admin/css/sb-admin.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('admin/css/plugins/morris.css')}}" rel="stylesheet">

    
    <link href="{{URL::to('admin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    @yield('scriptTime')
    @yield('InternalStyle')

</head>

<body onload="startTime()">

    <div id="wrapper">

       
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="padding-left:80px" class="navbar-brand" href="#" data-toggle="modal" data-target="#test">TITULAB</a>
            </div>
            
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->f_name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        
                        <li>
                            <a href="{{route('admin_settings')}}"><i class="fa fa-fw fa-gear"></i> Sazlamalar</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off"></i> Hasapdan çykmak</a>
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
                    <li class="{{ request()->routeIs('admin')? 'active' : '' }}">
                        <a href="{{ route('admin') }}"><i class="fa fa-fw fa-dashboard"></i> Panel</a>
                    </li>
                     <li class="{{ request()->routeIs('admin_staff')? 'active' : '' }}">
                        <a href="{{route('admin_staff')}}"><i class="fa fa-fw fa-dashboard"></i> Ýolbaşçylar </a>
                    </li>
                    <li class="{{ request()->routeIs('admin-student')? 'active' : '' }}">
                        <a href="{{route('admin-student')}}"><i class="fa fa-fw fa-dashboard"></i> Talyplar</a>
                    </li>
                   	<li class="{{ request()->routeIs('admin-pc')? 'active' : '' }}">
                        <a href="{{route('admin-pc')}}"><i class="fa fa-fw fa-dashboard"></i> Kompýuterler</a>
                    </li>
                    <li class="{{ request()->routeIs('monitoring')? 'active' : '' }}">
                        <a href="{{  route('monitoring')  }}"><i class="fa fa-fw fa-dashboard"></i> Gözegçilik ediş </a>
                    </li>
                    {{-- <li class="{{ request()->routeIs('admin_report')? 'active' : '' }}">
                    	<a href="{{route('admin_report')}}"><i class="fa fa-fw fa-dashboard"></i> Reports</a>
                    </li> --}}
                    
                </ul>
            </div>
           
        </nav>

        @yield('content')

    </div>
   
    @yield('script')
   
    <script src="{{URL::to('admin/js/jquery.js')}}"></script>    
    <script src="{{URL::to('admin/js/bootstrap.min.js')}}"></script>


    
    <script src="{{URL::to('admin/js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{URL::to('admin/js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{URL::to('admin/js/plugins/morris/morris-data.js')}}"></script>

</body>

</html>
