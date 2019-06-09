@extends('layouts.app')

@section('content')

<div class="container py-3">
    <div class="row">
        <div class="col-md-3 order-2 order-md-1">
            <div class="card border-0 rounded-0 mb-3">
                <profile-card-component
                    :user="{{ auth()->user() }}"
                    src="{{ asset('avatar.jpg') }}"
                    total-tweets="{{ auth()->user()->posts()->count() > 0 ? 
                        auth()->user()->posts()->count() : 0 }}"
                >
                </profile-card-component>
            </div>
            <div>
                <trend-component></trend-component>
            </div>
        </div>
        <div class="col-md-6 order-1 order-md-2">
            <div class="row justify-content-center mb-2">
                <tweet-component></tweet-component>
            </div>
            <div class="row justify-content-center">
                <timeline-component 
                    location="index"
                    :user="{{ auth()->user() }}"
                    :auth-user="{{ auth()->user() }}">
                </timeline-component>
            </div>
        </div>
        <div class="col-md-3 order-3 order-md-3">
            <div class="card border-0 rounded-0 mb-3">
                <div class="card-body">
                    <div class="">
                        <h4 class="font-weight-bold">New to Wittr?</h4>
                        <p class="text-muted">Sign up now to get your own personalized timeline!</p>
                        <button class="btn btn-secondary" style="background:#1B95E0; border: #1B95E0;">Sign Up Now</button>
                    </div>

                </div>
            </div>

            <div class="card border-0 rounded-0 mb-3">
                <div class="card-body p-0 m-0">
                    <div class="who-to-follow p-3 m-0">
                        <h5 class="font-weight-bold m-0">Who to follow</h5>
                    </div>
                    <div class="user-to-follow d-flex border-bottom py-1">
                        <div class="image-container mr-1" style="width: 50px; height:50px; border-radius:50%;">
                            <img src="{{asset('avatar.jpg')}}" class="image-rounded" alt="" width="46px" height="46px" style="border-radius: 50%;">
                        </div>
                        <div class="">
                            <div class="d-flex flex-wrap">
                                <p class="font-weight-bold m-0 p-0">{{ auth()->user()->name }}</p>&nbsp;
                                <p class="p-0 m-0 text-muted"> <span>@</span>{{ auth()->user()->username }}</p>
                            </div>
                            <div class="follow-btn d-flex justify-content-start">
                                <button class="btn btn-outline-primary btn-sm">Follow</button>
                            </div>
                        </div>
                    </div>
                    <div class="user-to-follow d-flex border-bottom py-1">
                        <div class="image-container mr-1" style="width: 50px; height:50px; border-radius:50%;">
                            <img src="{{asset('avatar.jpg')}}" class="image-rounded" alt="" width="46px" height="46px" style="border-radius: 50%;">
                        </div>
                        <div class="">
                            <div class="d-flex flex-wrap">
                                <p class="font-weight-bold m-0 p-0">{{ auth()->user()->name }}</p>&nbsp;
                                <p class="p-0 m-0 text-muted"> <span>@</span>{{ auth()->user()->username }}</p>
                            </div>
                            <div class="follow-btn d-flex justify-content-start">
                                <button class="btn btn-outline-primary btn-sm">Follow</button>
                            </div>
                        </div>
                    </div>
                    <div class="find-people p-3 m-0">
                        <a href="">Find people you know</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
