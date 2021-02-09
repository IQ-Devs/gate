@extends('layouts.app')

@section('content')

    <div class="container">

        <form action="{{$allChargeRecords->id}}" method="Post">
            @csrf
            <div class="form-group">
                <label>Card numbere</label>
                <div class="input-group  col-sm-4 " >

                    <input type="text" id="card" name="Card" class="form-control" disabled value="{{$allChargeRecords->cardnumbere}}" >



                </div>
                <br><br>
                <label>Correct Count</label>
                <div class="input-group mb-2 mr-sm-2  col-sm-4" >
                    <div class="input-group-text">$</div>
                    <select name="Count" class="form-control ">
                        <option>5</option>
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                    </select>
                    <div class="input-group-text">.00</div>
                </div>
            </div>



            <button type="submit" class="btn btn-default btn-rounded">Submit</button>
        </form>
    </div>
@endsection
