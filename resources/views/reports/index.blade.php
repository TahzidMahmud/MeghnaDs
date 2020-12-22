@extends('layouts.master')
@section('page_main_content')

@php
    $in_admistration = $premium = $fine = $profit = $total_credit = $out_admistration = $entertainment = $investment_withdraw = $others = $total_debit = $total_cash_in = $total_cash_out = 0;
@endphp

<div class="box">
    <div class="box-header">
        <h1 class="box-title">Monthly Summary</h1><br>
        <strong style="color: #999;">{{ DateTime::createFromFormat('!m', $month)->format('F') }} {{$year}}</strong>
        <button onclick="reportToCsv('repots.csv')" class="btn btn-primary" style="float: right;">Save as CSV</button>
        <form action="{{ url('/reports-pdf') }}" method="post" style="float: right; margin-right: 3px;">
            @csrf
            <input type="hidden" name="month" value="{{ $month }}">
            <input type="hidden" name="year" value="{{ $year }}">
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
                <div class="col-md-4" style="text-align: center;"><legend>Members Reposts</legend></div>
                <div class="col-md-4"></div>
            </div>
            @if(count($cashin) or count($cashout) > 0)

            <div class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
                <table class="table table-bordered table-hover text-center" role="grid">
                    <thead>
                        <tr>
                            <!-- <th colspan="2"></th> -->
                            <th colspan="9"> Cash In</th>
                            <th colspan="8"> Cash Out</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Premium</th>
                            <th>Admin</th>
                            <th>Fine</th>
                            <th>Profit</th>
                            <th>Total Credit</th>
                            <th>Comments</th>
                            <th>Date</th>
                            <th>Purpose</th>
                            <th>Admin</th>
                            <th>Entertain</th>
                            <th>Invest.</th>
                            <th>Total Debit</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($cashin as $key => $report)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{ Carbon\Carbon::parse($report->date)->format('d-M-Y') }}</td>
                            <td>{{ $report->member->name }}</td>
                            <td>{{ $report->premium }}</td>
                            <td>{{ $report->in_admistration }}</td>
                            <td>{{ $report->fine }}</td>
                            <td>{{ $report->profit }}</td>
                            <td>{{ $report->total_credit }}</td>
                            <td>{{ $report->comments}}</td>

                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        @php
                            $in_admistration += $report->in_admistration;
                            $premium += $report->premium;
                            $fine += $report->fine;
                            $profit += $report->profit;
                            $total_credit += $report->total_credit;
                            $out_admistration += $report->out_admistration;
                            $entertainment += $report->entertainment;
                            $investment_withdraw += $report->investment_withdraw;

                            $total_debit += $report->total_debit;
                        @endphp

                        @endforeach
                         @foreach($cashout as $report)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>-</td>
                            @if($report->member_id!==null)
                            <td>{{ $report->member->name }}</td>
                            @else
                            <td></td>
                            @endif
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                           <td> {{ Carbon\Carbon::parse($report->date)->format('d-M-Y') }}</td>
                            <td>{{ $report->purpose}}</td>
                            <td>{{ $report->out_admistration }}</td>
                            <td>{{ $report->entertainment }}</td>
                            <td>{{ $report->investment_withdraw }}</td>
                            <td>{{ $report->total_debit }}</td>
                            <td>-</td>
                        </tr>
                        @php
                            $in_admistration += $report->in_admistration;
                            $premium += $report->premium;

                            $profit += $report->profit;
                            $total_credit += $report->total_credit;
                            $out_admistration += $report->out_admistration;
                            $entertainment += $report->entertainment;
                            $investment_withdraw += $report->investment_withdraw;

                            $total_debit += $report->total_debit;
                        @endphp

                        @endforeach



                        <tr style="font-weight: bold;">
                            <td></td>
                            <td colspan="2">Total</td>
                            <td style="color: #22af28;">{{ $premium }}</td>
                            <td style="color: #22af28;">{{ $in_admistration }}</td>
                            <td style="color: #22af28;">{{ $fine }}</td>
                            <td style="color: #22af28;">{{  $profit}}</td>
                            <td style="color: #22af28;">{{ $total_credit }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ $out_admistration }}</td>
                            <td>{{ $entertainment }}</td>
                            <td>{{ $investment_withdraw }}</td>
                            <td style="color: red;">{{ $total_debit }}</td>
                            <td style="background: #222d32; color: #fff;">{{ $total_credit - $total_debit }}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
            @else
                <h1 style="color: red;">No Data Found!</h1>
            @endif


            <br> <hr> <br>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="text-align: center;"><legend>Investment Summary</legend></div>
                <div class="col-md-4"></div>
            </div>

            @if(count($investments) > 0)
            <div class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th></th>
                            <th colspan="3">Investment Cash In</th>
                            <th colspan="5">Investment Cash Out</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Investment Name</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Investment Name</th>
                            <th>Date</th>
                            <th>Amounts</th>
                            <th>Status</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($investments as $investment)
                        <tr>
                            <td>{{ $investment->id }}</td>

                            @if($investment->purpose == 'cash_in')
                                <td>{{ get_investment_by_id($investment->details)->details }}</td>
                                <td>{{ Carbon\Carbon::parse($investment->created_at)->toDateString() }}</td>
                                <td>{{ $investment->amount }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td>0</td>
                                <td>-</td>
                                <td>-</td>

                                @php $total_cash_in += $investment->amount; @endphp
                            @else
                                <td>-</td>
                                <td>-</td>
                                <td>0</td>
                                <td>{{ $investment->details }}</td>
                                <td>{{ Carbon\Carbon::parse($investment->created_at)->toDateString() }}</td>
                                <td>{{ $investment->amount }}</td>
                                <td>{{ $investment->status == 1 ? 'Running' : 'Closed' }}</td>
                                <td>-</td>

                                @php $total_cash_out += $investment->amount; @endphp
                            @endif
                        </tr>

                        @endforeach

                        <tr style="font-weight: bold;">
                            <td></td>
                            <td>Total</td>
                            <td></td>
                            <td style="color: #22af28;">{{ $total_cash_in }}</td>
                            <td></td>
                            <td></td>
                            <td style="color: red;">{{ $total_cash_out }}</td>
                            <td></td>
                            <td style="background: #222d32; color: #fff;">
                                {{ $total_cash_in - $total_cash_out }}
                            </td>
                        </tr>
                    </tbody>

                </table>

                <table>
                    <thead>
                        <tr>
                            <th>Total Bank Balance : </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="font-weight: bold; color: #195005;">
                            <td>৳ {{ ($total_credit + $total_cash_in) - ($total_debit + $total_cash_out) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @else
                <h1 style="color: red;">No Data Found!</h1>
            @endif
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
        </div>
        <p style="font-weight: bold; color: #195005;">
   Total Balance : {{ ($total_credit + $total_cash_in) - ($total_debit + $total_cash_out) }}
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
