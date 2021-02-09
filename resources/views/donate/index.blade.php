@extends('layouts.app')

@section('content')
<div class="container">
    <script>

        document.getElementById('card').addEventListener("onchange",input);
        S

        //  const x= 1;
        function input(){
            var inputVal = document.getElementById('card').value.length;
            document.getElementById('demo').textContent= parseInt( inputVal) ;

        }






    </script>

    <br>
    <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
        <span class="col-sm-5 col-md-3 col-xs-1 col-xs-offset-2"></span>
        <span class="glyphicon glyphicon-grain col-sm-5 col-md-5 col-xs-5 "style="font-size:80px;" aria-hidden="true"></span>
        <span class="col-sm-5 col-md-1 col-xs-1 col-xs-offset-1"></span>
        <br>

        <p class="text-center col-sm-5 col-md-12 col-xs-12 col-xs-offset-1">   في تبرعاتكم {{$companyID->profile->user->name }} ترحب منظمة   </p>
            <form action={{route('donate.Confirm',['companyID'=>$companyID->id])}} method="Post">
        @csrf
        <div class="form-group">
            <label>Card numbere</label>
            <div class="input-group  col-sm-6 " >

                <input type="text" id="card" name="Card" class="form-control" onchange="input()"  onfocusout="input()" >


                <div class="input-group-addon">
                    <span id="demo" onclick="input()">0</span>
                </div>
            </div>
            <p class=" list-group-item-danger col-sm-4  border-radius">{{ $errors->first('Card') }}</p>
            <br><br>
            <label>Count</label>
            <div class="input-group  col-sm-4 " >
                <div class="input-group-addon">$</div>
                <select name="Count" class="form-control ">
                    <option>5</option>
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                </select>
                <div class="input-group-addon">.00</div>
            </div>
        </div>



        <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <br>
    </div>
</div>


@endsection
