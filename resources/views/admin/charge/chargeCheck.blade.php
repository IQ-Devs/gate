@extends('layouts.app')

@section('content')
    <div class="container">
       check charge options



        <br>
        add alerts
        @if(session()->has('message'))
        <div class="alert {{session('alert') ?? 'alert-info'}}">
            {{ session('message') }}
        </div>
    @endif
    <!--
 create table with 3 buttons
        -->
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
                        <th>order ID </th>
                        <th>profile ID</th>
                        <th>cardnumbere</th>
                        <th>cardvalue</th>
                        <th>date</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allChargeRecords as $charge)
                        <tr>
                            <td>{{$charge['id']}}</td>
                            <td>{{$charge['profile_id']}}</td>
                            <td>{{$charge['cardnumbere']}}</td>
                            <td>@money($charge['cardvalue'], 'USD')</td>
                          <!--     <td>{{$charge['status']}}</td>
                            <td>{{$charge['comments']}}</td>
                            -->
                            <td>{{ \Carbon\Carbon::parse($charge['created_at'])->format('Y / m / d - h : i') }}</td>

                            <td>
                                <a href="{{route('chrage.accept',$charge['id'])}}"><button  type="button" class="btn btn-success btn-rounded">accept</button></a>
                                <a href="{{route('chrage.edit',$charge['id'])}}"><button type="button" class="btn btn-info btn-rounded">edit</button> </a>
                                <a href="{{route('chrage.reject',$charge['id'])}}"><button  type="button" class="btn btn-danger btn-rounded">reject</button> </a>
                            </td>

                        </tr>
                    @endforeach


                </table>
            </div>

        </div>
     </div>
  </div>
        <!--

  -->
    </div>




@endsection
