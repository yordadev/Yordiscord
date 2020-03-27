@extends('layouts.app')

@section('content')

@if($errors->any())
<div class="row" style="padding-top:30px">
    <div class="col-12 text-center">
        @foreach($errors->all() as $error)
        <div class="alert alert-arrow-right alert-icon-right alert-light-primary mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <svg> ... </svg>
            <strong>Uhoh!</strong> {{ $error }}.
        </div>
        @endforeach
    </div>
</div>
@endif

@if(Session::has('success'))
<div class="row" style="padding-top:30px">
    <div class="col-12 text-center">

        <div class="alert alert-arrow-right alert-icon-right alert-light-primary mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <svg> ... </svg>
            <strong class="text-black">Great news!</strong> <span
                class="text-black">{{ Session::get('success') }}</span>.
        </div>

    </div>
</div>
@endif


<div class="row">
    <div class="col-lg-12">
        <div class="jumbotron">
            <h1 class="display-4">Yordiscord Booster Packs</h1>
            <p class="lead">Booster packs allow you to get an edge over the rest of the server's listed.</p>
            <hr class="my-4">
            <h5 class="display-5">Booster Pack Information</h5>
            <p><b>Booster Pack Subscriptions</b> are valid for <b>30 days</b>, upgrading will prorate the remaining 30
                days on your current <b>booster pack</b> subscription. Subscriptions will be renewed
                <b>automatically</b>, and you can cancel at <b>anytime</b>. Canceling a <b>Booster Pack</b> will stop
                the auto renewal and the current subscription will expire on the <b>30th day</b>.</p>
        </div>
    </div>


</div>

<div class="row text-center">


    <div class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Pricing</h1>
            <p class="lead"><strong>Pay</strong> to get seen <strong>first</strong> above the rest with <strong>featured</strong> discord server listings to get your discord community <strong>fresh attention</strong>.</p>
          </div>
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Single Booster Pack</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$4.99 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="list-group-item"><strong>1</strong> <strong>featured</strong> server.</li>
                        <li class="list-group-item"><strong>Moderate</strong> featured server recommendations.</li>
                        <li class="list-group-item"><strike>Edit <b>your</b> recommendations</strike></li>
                        <li class="list-group-item"><strong>2</strong> additional <b>Tags</b>.</li>
                    </ul>
                    
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary" data-toggle="modal"
                                        data-target="#purchase{{ $data['plans'][2]['id'] }}Modal">Purchase</button>
                                        
                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Value Booster Pack</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$9.99 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="list-group-item"><strong>3</strong> <strong>featured</strong> servers.</li>
                        <li class="list-group-item"><strong>Moderate</strong> recommendations <b>on each featured</b> listing.</li>
                        <li class="list-group-item"><strike>Edit <b>your</b> recommendations</strike></li>
                        <li class="list-group-item"><strong>2</strong> additional <b>Tags</b> per server.</li>
                        <li class="list-group-item">Buy 2 Packs, Get One Free</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal"
                                        data-target="#purchase{{ $data['plans'][1]['id'] }}Modal">Purchase</button>
                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Premium Booster Pack</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$14.99 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="list-group-item"><strong>3</strong> <strong>featured</strong> servers.</li>
                        <li class="list-group-item"><strong>Moderate</strong> recommendations <b>on each</b> listing.</li>
                        <li class="list-group-item">Edit <b>your</b> recommendations</li>
                        <li class="list-group-item"><b>5 total</b> additional <b>Tags</b></li>
                        
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary" data-toggle="modal"
                                        data-target="#purchase{{ $data['plans'][0]['id'] }}Modal">Purchase</button>
                </div>
            </div>
        </div>
        
    </div>

</div>


@foreach($data['plans'] as $plan)

@include('billing.purchase', ['plan', $plan])
@endforeach

@endsection