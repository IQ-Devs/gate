@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

                <!-- Card -->
                <div class="card card-cascade cascading-admin-card">

                    <!-- Card Data -->
                    <div class="admin-up">
                        <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">wallet</p>
                            <h4 class="font-weight-bold dark-grey-text">@money($balance, 'USD')</h4>
                        </div>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade">
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <a class=" waves-light" href="{{ url('/profile/charge') }}"><button type="button" class="btn blue-gradient  btn-rounded">charge</button></a>

                    </div>

                </div>
                <!-- Card -->

            </div>





        </div>

        <br>
        <br>


     <div class="row">

        <!--bill-->
        <div class="col">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">bill history</p>
                </div>
                <div class="card-body">

                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table dataTable my-0" id="dataTable">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>quantity</th>
                                <th>from</th>
                                <th>to</th>
                                <th>date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bills as $bill)
                            <tr>
                                <td>{{$bill['id']}}</td>
                                <td>@money($bill['quantity'],'USD')</td>
                                <td>{{$bill->billsSent->user->name}}</td>
                                <td>{{$bill->billsReceived->user->name}}</td>
{{-- <td>{{\App\Profile::find(  $bill['from'])->user->name}}</td>--}}
{{--                                <td>{{\App\Profile::find(  $bill['to'])->user->name}}</td>--}}

                                <td>{{  \Carbon\Carbon::parse($bill['created_at'])->format('Y / m / d - h : i') }}</td>



                            </tr>
                            @endforeach


                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>





    </div>





















@endsection
