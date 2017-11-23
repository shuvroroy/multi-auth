@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="panel-title pull-left" style="font-size:30px;"></i> Settings</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="panel-title pull-left" style="font-size:30px;">My basic profile</h1>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">Your Name</h3>
                        <br><br>
                        <div class="form-horizontal">
                            <label for="First_name">Full name</label>
                            <input type="text" class="form-control" id="name" value="{{ $user->name }}" disabled>
                            <br>
                            <label for="First_name">Email Address</label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                </div>

                <form action="{{ route('employee.update', $user) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="panel-title pull-left">Your photo</h3>
                            <br><br>
                            <div align="center">
                                <div class="col-lg-12 col-md-12">
                                    <img class="img-thumbnail img-responsive" src="{{ asset($user->avatar) }}" width="300px" height="300px">
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <input type="file" class="btn btn-primary" name="avatar"> Upload a new profile photo!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="panel-title pull-left">My extended profile</h3>
                            <br><br>
                            <div class="form-horizontal">
                                <label>Your bio</label>
                                <textarea class="form-control" rows="5" name="bio">{{ $user->profile->bio }}</textarea>
                            </div>
                            <br><br>
                            <div class="form-horizontal">
                                <label for="address">Your address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->profile->address }}">
                                <br>
                                <label for="phone">Your phonenumber</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->profile->phone }}">
                                <br>
                                <label for="Your_gender">Your gender</label>
                                <input type="text" value="{{ $user->gender == 1 ? 'Male' : 'Female' }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <a href="{{ route('employee.show', $user) }}" class="btn btn-default"><i
                                            class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</a>
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-check"
                                                                                 aria-hidden="true"></i> Update Profile
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
