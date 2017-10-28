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
                    <h1 class="panel-title pull-left" style="font-size:30px;">Company profile</h1>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Company Data</h3>
                    <br><br>
                    <div class="form-horizontal">
                        <label for="First_name">Company name</label>
                        <input type="text" class="form-control" id="name" value="{{ $company->name }}" disabled>
                        <br>
                        <label for="First_name">Company Email Address</label>
                        <input type="email" class="form-control" id="email" value="{{ $company->email }}" disabled>
                    </div>
                </div>
            </div>

            <form action="{{ route('company.update', $company) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">Company photo</h3>
                        <br><br>
                        <div align="center">
                            <div class="col-lg-12 col-md-12">
                                <img class="img-thumbnail img-responsive" src="{{ asset($company->logo) }}" width="300px" height="300px">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <input type="file" class="btn btn-primary" name="logo"> Upload a new profile photo!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">Company extended profile</h3>
                        <br><br>
                        <div class="form-horizontal">
                            <label>Company bio</label>
                            <textarea class="form-control" rows="5" name="bio">{{ $company->profile->bio }}</textarea>
                        </div>
                        <br><br>
                        <div class="form-horizontal">
                            <label for="address">Company address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $company->profile->address }}">
                            <br>
                            <label for="phone">Company phonenumber</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $company->profile->phone }}">
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <a href="{{ route('company.show', $company) }}" class="btn btn-default"><i
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
