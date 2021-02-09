@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-left-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span><strong>Wallet</strong></span></div>
                            <div class="text-dark font-weight-bold h5 mb-0"><span>
                                    @php
                                 $withdraw =$profiles->balance * ($profiles->company->percentage /100);
                                  $withdraw -$profiles->balance;
                                    @endphp

                                          @money( $withdraw,'USD' )</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

