@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-inline md-form mr-auto mb-4" method="post" action="{{ route('withdraw') }}
            " >
            @csrf
            <input name="search" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning btn-rounded btn-sm my-0" type="submit">Search</button>
        </form>
    </div>



@endsection

