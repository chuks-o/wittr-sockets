@extends('layouts.app')

@section('content')
<div class="trend-container">
    <div class="trend-background d-flex align-items-center" style="background: rgb(27, 149, 224); height: 60px;">
        <div class="container">
            <h4 class="font-weight-bold m-0 p-0" style="color: #fff;">#{{$trend}}</h4>
        </div>
    </div>
    <div class="trend-background d-flex align-items-center" style="background: #fff; height: 50px; box-shadow: 1px 1px 5px 1px #ccc;">
        <div class="container">
            <div class="trend-navigations d-flex align-items-center">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="" class="nav-link font-weight-bold text-dark">Top</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Latest</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">People</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">News</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Broadcasts</a>
                    </li>
                </ul>
                <div class="ml-auto">
                    <span class="fa fa-ellipsis-v" style="font-size: 18px;"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card border-0 rounded-0 mb-3">
                    <div class="card-body p-3">
                        <h5 class="font-weight-bold p-0 m-0">Search Filters <a href="" class="font-weight-normal" style="font-size:12px;">. show</a></h5>
                    </div>
                </div>

                <div class="card border-0 rounded-0 mb-3">
                    <div class="card-body p-3">
                        <h5 class="font-weight-bold">Related searches</h5>
                        <p class="font-weight-bold m-0 p-0"> <a href="">#womenwhocode</a></p>
                        <p class="font-weight-bold m-0 p-0"> <a href="">#womenwhocode</a></p>
                        <p class="font-weight-bold m-0 p-0"> <a href="">#womenwhocode</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <timeline-component 
                        location="trends"
                        :user="{{ auth()->user() }}"
                        :auth-user="{{ auth()->user() }}"
                        trend="{{ $trend }}">
                    </timeline-component>
                </div>
            </div>
           
        </div>
    </div>

</div>

@endsection

