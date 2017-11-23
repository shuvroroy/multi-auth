@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('admin.partials._sidebar')
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Dashboard</div>

                    <div class="panel-body">
                        <p class="text-center">
                            You are logged in as <strong>Admin</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
