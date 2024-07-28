@extends('layouts.admin')

@section('title', 'Admin')

@section('InternalStyle')
<style type="text/css">
    #txt {
        font-size: 48px;
    }

</style>
@endsection

@section('content')
<div id="page-wrapper">

    <div>
        <h2>Admin Reports</h2>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 id="print_head">List of Reports</h3>
            <button type="button" id="print" class="btn btn-info btn-xs">Print</button>
        </div>
        <div class="panel-body">
            <form action="{{route('admin_report')}}" method="GET">
                <div class="form-group">
                    <select name="sort">
                        <option>Daily</option>
                        <option>Weekly</option>
                        <option>Monthly</option>
                    </select>
                    <button type="submit" class="btn btn-default btn-xs">Submit</button>
                    {{csrf_field()}}
                </div>

            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Room</th>
                        <th>PC</th>
                        <th>LastName</th>
                        <th>FirstName</th>
                        {{-- <th>MiddleName</th> --}}
                        <th>Start</th>
                        <th>End</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if($reports->count())
                    @foreach($reports as $report)

                    <tr>
                        <td>{{$report->student->course}}</td>

                        <td>
                            @if($report->staff->role->name == 'cas5')
                            CAS 5
                            @elseif($report->staff->role->name == 'cas7')
                            CAS 7
                            @elseif($report->staff->role->name == 'cas8')
                            CAS 7
                            @endif
                        </td>
                        <td>{{$report->computer_id}}</td>
                        <td>{{$report->student->lname}}</td>
                        <td>{{$report->student->fname}}</td>
                        {{-- <td>{{$report->student->mname}}</td> --}}
                        <td>{{$report->start}}</td>
                        <td>{{$report->end}}</td>
                        <td>{{$report->created_at->toDayDateTimeString()}}</td>
                    </tr>

                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection


@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#print").on('click', function() {
            $("#print_head").addClass("text-center");
            $("#print_head").text("Room {{Auth::user()->role_id}} Daily Report");
            $("tbody").append("<p>by: {{Auth::user()->l_name}}</p>")
            window.print();
        });
    });

</script>
@endsection
