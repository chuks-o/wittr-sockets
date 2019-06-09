@extends('layouts.app')

@section('content')
 
<div class="">
    <div class="card border-0 mb-3">
        <div class="card-body p-0 m-0">
            <div class="profile-section">
                <div class="bg-color" style="height:150px; background: #1B95E0;"></div>
                <div class="tweet-profile d-flex">
                    <div class="col-md-4 "></div>
                    <div class="col-md-8 px-4 py-1 ">
                        <div class="">
                            <div class="d-flex justify-content-around align-items-center w-100 mr-5">
                                <div class="no-of-tweets text-center">
                                    <small class="font-weight-bold">Tweets</small>
                                    <h5>2308</h5>
                                </div>
                                <div class="no-of-following text-center">
                                    <small class="font-weight-bold">Followers</small>
                                    <h5>{{ $response['followers_count']}}</h5>
                                </div>
                                <div class="no-of-followers text-center">
                                    <small class="font-weight-bold">Following</small>
                                    <h5>{{ $response['following_count']}}</h5>
                                </div>

                                <div class="no-of-following text-center">
                                    <small class="font-weight-bold">Likes</small>
                                    <h5>630</h5>
                                </div>
                                <div class="no-of-followers text-center">
                                    <small class="font-weight-bold">Lists</small>
                                    <h5>1230</h5>
                                </div>
                                <div class="no-of-followers text-center">
                                    <small class="font-weight-bold">Moments</small>
                                    <h5>30</h5>
                                </div>
                                <div class="text-center">

                                    @if($response['is_my_profile'])
                                    <button class="btn btn-primary mr-2">Edit Profile</button>
                                    @else
                                    <?php
                                    $link = $response['is_following'] ? route('user.unfollow', $user) :  route('user.follow', $user) ;
                                    ?>
                                    <follow-component 
                                        :is-following="{{ $response['is_following'] ? 'true' : 'false' }}"
                                        :user="{{ $user }}"
                                    >
                                    </follow-component>
                                    @endif
                                    <!-- <a><span class="fa fa-ellipsis-v text-muted" style="font-size: 18px;"></span></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex avatar-container pl-5 ml-5">
                    <div class="d-flex justify-content-center align-items-center" 
                        style="border: 5px solid white; border-radius: 50%; position:absolute; width: 200px; height:200px; top: 40px; bottom:0;"
                    >
                        <img class="image-rounded" src="{{asset('avatar.jpg')}}" alt="" width="192px" height="192px" style="border-radius:50%;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-0">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-info mt-4 py-1">
                    <h5 class="font-weight-bold m-0  p-0">{{ $user->name }}</h5>
                    <p class="p-0 m-0 text-muted"> <span>@</span>{{ $user->username }}</p>
                </div>
                <div class="about-me py-1">
                    <p>Creator of #BlackTechTwitter & #BlackTechPipeline discord✊🏽Front End React/React Native dev👩🏽‍💻Writer🖋Creative curly gal➰bringing ideas to life with code✨</p>
                </div>
                <div class="location">
                    <p><span class="fa fa-map-marker mr-2 "></span>Lekki </p>
                </div>
                <div class="user-link">
                    <p><span class="fa fa-link mr-2 "></span><a href="{{ url('home') }}">{{ url('home') }}</a> </p>
                </div>
                <div class="date-joined">
                    <p><span class="fa fa-calendar mr-2"></span>Joined August 2018 </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <timeline-component
                        location="profile"
                        :user="{{ $user }}"
                        :auth-user="{{ auth()->user() }}">
                    </timeline-component>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0">
                    <div class="card-body p-3">
                        <div class="header">
                            <h5 class="font-weight-bold">Who to follow </h5>
                        </div>
                        <div class="user-to-follow d-flex border-bottom py-1">
                            <div class="image-container mr-1" style="width: 50px; height:50px; border-radius:50%;">
                                <img src="{{asset('avatar.jpg')}}" class="image-rounded" alt="" width="46px" height="46px" style="border-radius: 50%;">
                            </div>
                            <div class="">
                                <div class="d-flex">
                                    <p class="font-weight-bold m-0 p-0">{{ $user->name }}</p>&nbsp;
                                    <p class="p-0 m-0 text-muted"> <span>@</span>{{ $user->username }}</p>
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
                                <div class="d-flex">
                                    <p class="font-weight-bold m-0 p-0">{{ $user->name }}</p>&nbsp;
                                    <p class="p-0 m-0 text-muted"> <span>@</span>{{ $user->username }}</p>
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
                                <div class="d-flex">
                                    <p class="font-weight-bold m-0 p-0">{{ $user->name }}</p>&nbsp;
                                    <p class="p-0 m-0 text-muted"> <span>@</span>{{ $user->username }}</p>
                                </div>
                                <div class="follow-btn d-flex justify-content-start">
                                    <button class="btn btn-outline-primary btn-sm">Follow</button>
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
