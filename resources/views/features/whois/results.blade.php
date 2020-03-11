@extends('layouts.app')

@section('content')
  
<div class="row layout-top-spacing text-center">
    <div class="col-xl-12 col-lg-12  col-sm-12">
        <div class="infobox-3">
            <h5 class="info-heading">{{ $data['guild']->name }}</h5>
            
            <div class="text-center">
                <a href="#"><div class="btn btn-primary mb-2">Recommend Server</div></a>
                <a href="#"><div class="btn btn-primary mb-2">Request Invite Link</div></a>
            </div>
        </div>
    </div>
    
</div>

<div class="row layout-top-spacing" style="padding-top:30px">
    <div class="col-xl-4 col-lg-4 col-sm-12" style="padding-bottom:30px">
        <div class="widget widget-one_hybrid widget-followers ">
            <div class="widget-heading">
                <div class="w-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <p class="w-value">{{ count($data['members']) }}</p>
                <h5 class="">Members</h5>
            </div>

        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-sm-12" style="padding-bottom:30px">
        <div class="widget widget-one_hybrid widget-referral">
            <div class="widget-heading">
                <div class="w-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                    </svg>
                </div>
                <p class="w-value">{{ count($data['channels']) }}</p>
                <h5 class="">Channels</h5>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-sm-12" style="padding-bottom:30px">
        <div class="widget widget-one_hybrid widget-engagement">
            <div class="widget-heading">
                <div class="w-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                        </path>
                    </svg>
                </div>
                <p class="w-value">{{ count($data['guild']->roles)}}</p>
                <h5 class="">Roles</h5>
            </div>
        </div>
    </div>
</div>
  
<div class="row layout-top-spacing">
    <div id="card_8" class="col-lg-8 offset-lg-2 layout-spacing">
        <div class="statbox widget box">

            <div class="widget-content widget-content-area">

                <div class="card component-card_8">
                    <div class="card-body">

                        <div class="progress-order">
                            <div class="progress-order-header">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <h6>Recommended by</h6>
                                    </div>
                                
                                </div>
                            </div>

                            <div class="progress-order-body">
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <ul class="list-inline badge-collapsed-img mb-0 mb-3">
                                            <li class="list-inline-item chat-online-usr">
                                                <img alt="avatar" src="assets/img/90x90.jpg" class="ml-0">
                                            </li>
                                            <li class="list-inline-item chat-online-usr">
                                                <img alt="avatar" src="assets/img/90x90.jpg">
                                            </li>
                                            <li class="list-inline-item chat-online-usr">
                                                <img alt="avatar" src="assets/img/90x90.jpg">
                                            </li>
                                            <li class="list-inline-item chat-online-usr">
                                                <img alt="avatar" src="assets/img/90x90.jpg">
                                            </li>
                                            <li class="list-inline-item badge-notify mr-0">
                                                <div class="notification">
                                                    <span class="badge badge-info badge-pill">+5 more</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <span class=" p-o-percentage mr-4">60%</span>
                                        <div class="progress p-o-progress mt-2">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            

            </div>
        </div>
    </div>
</div>

@endsection