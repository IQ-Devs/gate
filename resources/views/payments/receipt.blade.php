@extends('layouts.app')

@section('content')

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
    <div class="card-header">
        <em>Receipt #: {{$bill->id}}</em>
        <span class="float-right"> <strong>Status:</strong> Pending</span>

    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h6 class="mb-3">From:{{auth()->user()->name}}</h6>





            </div>

            <div class="col-sm-6">
                <h6 class="mb-3">To:{{$bill->billsReceived->user->name}}</h6>





            </div>
        </div>

        <div class="table-responsive-sm">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="center">#</th>

                    <th>Description</th>

                    <th class="right">Unit Cost</th>


                </tr>
                </thead>
                <tbody>



                <tr>
                    <td class="center">4</td>

                    <td class="left">1 year subcription 24/7</td>

                    <td class="right">@money($bill->quantity,'USD')</td>


                </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-5">

            </div>

            <div class="col-lg-4 col-sm-5 ml-auto">
                <table class="table table-clear">
                    <tbody>



                    <tr>
                        <td class="left">
                            <strong>Total</strong>
                        </td>
                        <td class="right">
                            <strong>@money($bill->quantity,'USD')</strong>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <div class="col-lg-4 col-sm-5">
                @if($notEnough)
                    <div class="alert {{$notEnough['alert'] ?? 'alert-info'}}">
                        {{ $notEnough['notEnough']}}
                    </div>
                @else
                    <form>
                        @csrf
                        <button type="submit" class="btn aqua-gradient btn-rounded btn-lg btn-block"  formmethod="post" formaction="{{route('payment.Confirm',['companyID'=>$companyID,'paymentID' => $paymentID,'billID'=>$bill->id])}}">
                            Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
</div>

@endsection
