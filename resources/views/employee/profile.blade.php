@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">
                            <img class="thumbnail img-responsive" src="{{ asset($user->avatar) }}" width="300px" height="300px">
                        </div>
                        <div class="media-body">
                            <hr>
                            <h3><strong>Bio</strong></h3>
                            <p>
                                {{ $user->profile->bio }}
                            </p>
                            <hr>
                            <h3><strong>Location</strong></h3>
                            <p>{{ $user->profile->address }}</p>
                            <hr>
                            <h3><strong>Gender</strong></h3>
                            <p>{{ $user->gender == 1 ? 'Male' : 'Female' }}</p>
                            <hr>
                            <h3><strong>Phone</strong></h3>
                            <p>{{ $user->profile->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>{{ $user->name }}'s profile
                        @can('touchUser', $user->profile)
                            <span class="pull-right">
                                <a href="{{ route('employee.edit', $user) }}" class="btn btn-primary">Edit Profile</a>
                            </span>
                        @endcan
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
