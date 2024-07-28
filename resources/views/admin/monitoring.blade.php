@extends('layouts.admin')

@section('title', 'Admin')

@section('InternalStyle')
<style type="text/css">
    #txt {
        font-size: 48px;
    }

    .image{
        opacity:0.3;
    }

    .opacity{
        opacity:1;
    }

</style>
@endsection

@section('content')

<div id="page-wrapper">

    <div class="container-fluid">
        <div class="col-lg">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h1>Statistic</h1>
                </div>
                <div style="display:flex; gap:20px" class="panel-body">
                    <p>Total Student <i class="badge">{{$student_num}}</i></p>
                    <p>Total Computer <i class="badge">{{$pc_num}}</i></p>
                    <p>Total Online <i class="badge">{{$online}}</i></p>
                </div>
            </div>
        </div>    


        <div style="display:flex; flex-wrap:wrap;" class="row">
        @foreach($pcs as $pc)
            <div class="col-lg-4">
            
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    @if($pc->room == 1)
                        <span>Lab A</span>
                    @else
                        <span>Lab B</span>
                    @endif
                        <h4>PC No: {{$pc->pc_no}}</h4>
                    </div>
                    <div class="panel-body">
                        <a href="">
                            <div style="
                                background-image:url({{ asset('icons/monitoring.jpg') }}); 
                                background-size:cover; height:276px;
                                position:relative;
                                " class="image @if($pc->status==1) opacity  @endif">
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
            @endforeach

            
        </div>
    </div>
</div>

<div class="modal fade" id="test">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-head">
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
@endsection