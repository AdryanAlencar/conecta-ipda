@extends('layouts.site')
@section('content')
{{-- make a profile card --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card profile-card">
                <div class="card-body">
                    {{-- Profile photo --}}
                    <div class="row">
                        <div class="col-md-12 profile-photo">
                            <img src="{{ asset('assets/img/user.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row user-details">
                        <div class="md-6 sm-6">
                            <i class="far fa-user"></i>
                            <label>{{ $user->name }}</label>
                        </div>
                        <div class="md-6 sm-6">
                            <span class="far fa-envelope"></span>
                            <label for="">{{$user->email}}</label>
                        </div>
                    </div>
                    <div class="row user-details">
                        <div class="md-6 sm-6 star-rating">
                            @for ($i = 0; $i < $user->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            @for ($i = 0; $i < 5 - $user->rating; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Two simple tabs for wish list and stores --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Wish List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Stores</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="wishlist">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6>Wish List</h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Show</label>
                                                                <select class="form-control">
                                                                    <option>10</option>
                                                                    <option>20</option>
                                                                    <option>30</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @for ($i = 0; $i <= sizeof($stores); $i = $i + 3)
                                                <div class="row">
                                                    @for ($j = 0; $j < $i + 3; $j++)
                                                    <div class="card" style="width: 18rem;">
                                                        <img src="..." class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Card title</h5>
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        </div>
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">Cras justo odio</li>
                                                            <li class="list-group-item">Dapibus ac facilisis in</li>
                                                            <li class="list-group-item">Vestibulum at eros</li>
                                                        </ul>
                                                        <div class="card-body">
                                                            <a href="#" class="card-link">Card link</a>
                                                            <a href="#" class="card-link">Another link</a>
                                                        </div>
                                                    </div>
                                                    @endfor
                                                </div>
                                            @endfor
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
