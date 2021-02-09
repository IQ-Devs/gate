@extends('layouts.app')

@section('content')
    <div class="container">
        admin options
        <br>
        <a href="{{route('chrage.check')}}"><button  type="button" class="btn aqua-gradient  btn-rounded">check table</button></a>
 <br>
        <a href="{{route('company.actions')}}"><button  type="button" class="btn aqua-gradient  btn-rounded">company table</button></a>

    </div>

@endsection
