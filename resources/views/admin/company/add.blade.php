@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{route('company.add')}}" method="Post">
            @csrf
            <div class="form-group">
                <label>profile numbere</label>
                <div class="input-group mb-2 mr-sm-2  col-sm-4" >

                    @if( $errors->first('profileID'))
                        <p class=" list-group-item-danger col-sm-4  border-radius">{{ $errors->first('profileID') }}</p>

                    @endif

                @if(session()->has('message'))
                        <div class="alert {{session('alert') ?? 'alert-info'}}">
                            {{ session('message') }}
                        </div>
                    @endif

                    <input type="text" name="profileID" class="form-control py-0"  >



                </div>
                <br>



            <button type="submit" class="btn btn-default btn-rounded">Submit</button>
            </div>
        </form>

    <br>
        <div class="card shadow">
        <div class="card-body">

            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                    <tr>
                        <th>company ID </th>
                        <th>profile ID</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allCompanyRecords as $company)
                        <tr>
                            <td>{{$company['id']}}</td>
                            <td>{{$company['profile_id']}}</td>

                         <!--   <td>
                                <a href="{{route('chrage.edit',$company['id'])}}"><button type="button" class="btn btn-info">edit</button> </a>
                            </td>
                         -->

                        </tr>
                    @endforeach


                </table>
            </div>
        </div>
    </div>

@endsection
