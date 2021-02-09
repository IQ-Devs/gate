@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Auth Core Manager</p>
                </div>
                <div class="card-body">

                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table dataTable my-0" id="dataTable">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>phone number</th>
                                <th>provider</th>
                                <th>token</th>
                                <th>active</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{{$record->phoneNum}}</td>
                                    <td>{{$record->cellProvider}}</td>
                                    <td>{{$record->token}}</td>
                                    <td>{{$record->token}}</td>





                                </tr>
                            @endforeach


                        </table>
                    </div>

                </div>
            </div>

    </div>



@endsection

