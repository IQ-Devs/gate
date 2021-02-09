@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="article__title">charge options</h3>


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
 <div class="col">

        <form action="charge" method="Post">
            @csrf
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2  col-sm-4">

                    <input type="text"  id="card" name="Card" onchange="input()"  onfocusout="input()" class="form-control py-0" id="inlineFormInputGroupUsername2" placeholder="card numbere">
                    <div class="input-group-text">
                        <span id="demo" onclick="input()">0</span>
                    </div>
                </div>
@error('Card')
                <div class="alert alert-danger" role="alert">{{ $errors->first('Card') }}</div>
@enderror
            </div>
          <div class="form-group">
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
<br>
        <!--charge-->
        <div class="col">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">charge history</p>
                </div>
                <div class="card-body">

                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table dataTable my-0" id="dataTable">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>card numbere</th>
                                <th>card value</th>
                                <th>status</th>
                                <th>comments</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($charge as $charges)
                                <tr>
                                    <td>{{$charges['id']}}</td>
                                    <td>{{$charges['cardnumbere']}}</td>
                                    <td>@money($charges['cardvalue'], 'USD')</td>

                                    @if($charges['status']== '0')
                                    <td>reject</td>
                                    @elseif($charges['status']== '1')
                                        <td>accept</td>
                                    @else
                                        <td>wait</td>
                                    @endif
                                    <td>{{$charges['comments']}}</td>
                                </tr>
                            @endforeach


                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
