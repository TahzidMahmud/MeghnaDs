<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
    <link rel="stylesheet" type="text/css" href="{{ public_path('css/bootstrap.min.css') }}">
    <style type="text/css" media="screen">
        body {
           background-color: #fff;
            margin: 0px !important;
            padding: 0px !important;
        }
        table.table-bordered{
            border:1px solid #222d32;
            /*margin-top:20px;*/
        }
        table.table-bordered > thead > tr > th{
            border:0.5px solid #222d32;
            line-height: 5px !important;
            font-size: 10px !important;
            font-weight: normal !important;

        }
        table.table-bordered > tbody > tr {
            line-height: 5px !important;

        }
        table.table-bordered > tbody > tr > td{
            border:1px solid #222d32;
            line-height: 5px !important;
            font-size: 8px !important;
        }
        .water-mark{
             display: flex;
             align-content: center;
            height: 500px;
            width: 500px;
            opacity: 0.2;
            margin-top: 30%;
            margin-left:20%;
            padding: auto;
            z-index: -2;

        }

    </style>
</head>
<body>

    @php
    $in_admistration = $premium = $fine = $profit = $total_credit = $out_admistration = $entertainment = $investment_withdraw  = $total_debit = $total_cash_in = $total_cash_out = 0;
    @endphp

    <div class="row" style="margin-bottom: -30px">

        <div class="col-md-6">
          <h4 class="">Monthly Summary</h4>
          <h5 style="color: #999;">{{ DateTime::createFromFormat('!m', $month)->format('F') }} {{$year}}</h5>
      </div>
      <div class="col-md-6">

        <img src="{{asset('logo.jpeg')}}" class=" water-mark" alt="" >
      </div>
  </div>

  <h5 style="text-align: center;">Members Reposts</h5>
  <table class="table table-striped table-bordered text-center" style="margin: 0px !important; padding: 0px !important;">
    <thead>
        <tr>

            <th colspan="9"> Cash In</th>
            <th colspan="7"> Cash Out</th>
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
            <th>Invest</th>
            <th>Total Debit</th>
            <th>Balance</th>
        </tr>
    </thead>
    <tbody>

                                @foreach($cashin as $key =>$report)
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
                                    <td colspan="2">Total</td>
                                    <td style="color: #22af28;">{{ $premium }}</td>
                                    <td style="color: #22af28;">{{ $in_admistration }}</td>
                                    <td style="color: #22af28;">{{ $fine }}</td>
                                    <td>-</td>
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

<hr>

<div class="">
    <div class="col-xs-12">
        <h5 style="text-align: center;">Investments Reports</h5>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th></th>
                    <th colspan="3">Investment Cash In</th>
                    <th colspan="5">Investment Cash Out</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Invest. Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Invest. Name</th>
                    <th>Date</th>
                    <th>Amount</th>
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
    </div>
</div>

<p style="font-weight: bold; color: #195005;">
   Total Balance : {{ ($total_credit + $total_cash_in) - ($total_debit + $total_cash_out) }}
</p>

</body>



