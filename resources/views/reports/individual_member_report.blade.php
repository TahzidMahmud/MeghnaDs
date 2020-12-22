@extends('layouts.master')
@section('page_main_content')

@php
     $total_cash_in = $total_cash_out = 0;
@endphp

<div class="box">
    <div class="box-header">
        <h1 class="box-title">Member Report</h1><br>
        <strong style="color: #999;">   From:        {{ Carbon\Carbon::parse($from)->format('d-M-Y') }}   <span style="margin-left: 100px"> To: {{ Carbon\Carbon::parse($to)->format('d-M-Y') }}</span></strong>
        <br>
        {{-- <button onclick="reportToCsv('repots.csv')" class="btn btn-primary" style="float: right;">Save as CSV</button> --}}
        <form action="{{ url('/report-pdf') }}" method="post" style="float: right; margin-right: 3px;">
            @csrf
            <input type="hidden" name="name" value="{{ $name }}">
            <input type="hidden" name="from" value="{{ $from }}">
            <input type="hidden" name="to" value="{{ $to }}">

            {{-- <h1>"The PDF Download option is under development"</h1> --}}
            <button type="submit" class="btn btn-info">Save as PDF</button>
        </form>
    </div>

<section class="content">
    <div class="row">
            <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="text-align: center;"><legend>Members Reposts</legend><h2>{{ $name }}</h2></div>

                <div class="col-md-4"></div>
            </div>
            @if(count($cash_in)>0)

            <div class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
                <table class="table table-bordered table-hover text-center" role="grid">
                    <thead>
                        <tr>
                            <!-- <th colspan="2"></th> -->
                            <th colspan="9"> Cash In</th>

                        </tr>
                        <tr>

                            <th>Serial</th>
                            <th>Date</th>
                            <th>Cash-In</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($cash_in as $key => $in)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{ Carbon\Carbon::parse($in->date)->format('d-M-Y') }}</td>
                            <td>{{ $in->total_credit }}</td>
                            <td>{{ $in->comments}}</td>
                        </tr>
                        @php

                        $total_cash_in += $in->total_credit;

                        @endphp

                        @endforeach
                        @else

                        <h1 style="color: red;">No Data </h1>
                    @endif
                        <tr>
                            <td colspan="9"><h5 class="text-end text-success"> <b>Total Cash-in :   </b><strong>{{ $total_cash_in }}</strong></h5></td>
                        </tr>
                    </tbody>

                </table>
            </div>
            @if(count($cash_out) > 0)
            <div class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
                <table class="table table-bordered table-hover text-center" role="grid">
                    <thead>
                        <tr>
                            <!-- <th colspan="2"></th> -->
                            <th colspan="9"> Cash Out</th>

                        </tr>
                        <tr>

                            <th>Serial</th>
                            <th>Date</th>
                            <th>Cash-Out</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($cash_out as $key => $out)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{ Carbon\Carbon::parse($out->date)->format('d-M-Y') }}</td>
                            <td>{{ $out->total_debit}}</td>
                            <td>{{ $out->comments}}</td>
                        </tr>
                        @php

                         $total_cash_out+= $out->total_debit;

                        @endphp

                        @endforeach
                        @else

                        <h1 style="color: red;">No Cash Out</h1>
                        @endif

                        <tr>
                            {{-- <td colspan="9"><h5 class="text-end text-success"> <b>Total Cash-Out :   </b><strong>{{ $total_cash_Out }}</strong></h5></td> --}}
                        </tr>
                    </tbody>

                </table>
            </div>




            <br> <hr> <br>



        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
        </div>
        <p style="font-weight: bold; color: #195005;">

</p>
</section>

</div>

<script type="text/javascript">

    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV file
        csvFile = new Blob([csv], {type: "text/csv"});

        // Download link
        downloadLink = document.createElement("a");

        // File name
        downloadLink.download = filename;

        // Create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);

        // Hide download link
        downloadLink.style.display = "none";

        // Add the link to DOM
        document.body.appendChild(downloadLink);

        // Click download link
        downloadLink.click();
    }

    function reportToCsv(filename)
    {
        var csv = [];
        var rows = document.querySelectorAll("table tr");

        for (var i = 0; i < rows.length; i++)
        {
            var row = [], cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++)
                if (j == 6 || j == 7) {

                }
                else {
                    row.push(cols[j].innerText);
                }

            csv.push(row.join(","));
        }

        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
    }
</script>

@endsection
