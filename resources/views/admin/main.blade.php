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
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }; // add zero in front of numbers < 10
        return i;
    }

</script>
@endsection
@section('content')

<div id="page-wrapper">

    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-12">
                <h1>Dolandyryş paneli</h1>
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
                                    <td>PC No</td>
                                    <td>Otag</td>
                                    <td>Ýagdaýy</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pcs as $pc)
                                @if($pc->room == 1)
                                <tr>
                                    <td>{{$pc->pc_no}}</td>
                                    <td>LAB A</td>
                                    <td><a href="{{route('pc_info', ['pc_id'=> $pc->id])}}" class="btn btn-info btn-xs">giňişleýin</a></td>
                                </tr>
                                @endif
                                @endforeach
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
                                    <td>PC No</td>
                                    <td>Otag</td>
                                    <td>Ýagdaýy</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pcs as $pc)
                                @if($pc->room == 2)
                                <tr>
                                    <td>{{$pc->pc_no}}</td>
                                    <td>LAB B</td>
                                    <td><a href="{{route('pc_info', ['pc_id'=> $pc->id])}}" class="btn btn-info btn-xs">giňişleýin</a></td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h1>Hazirki wagt</h1>
                    </div>
                    <div class="panel-body">
                        <div id="txt"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h1>Statistika</h1>
                    </div>
                    <div class="panel-body">
                        <p>Ähli talyplar <i class="badge">{{$student_num}}</i></p>
                        <p>Ähli kompýuterler <i class="badge">{{$pc_num}}</i></p>
                        <p>Online <i class="badge">{{$online}}</i></p>
                    </div>
                </div>
            </div>
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