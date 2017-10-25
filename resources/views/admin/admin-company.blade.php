@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('admin.partials._sidebar')
        </div>
        <div class="col-md-9">
            @include('admin.partials._alert')

            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Approve</th>
                            <th>Reject</th>
                        </thead>

                        <tbody>
                            @forelse ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.companies.approve', $company) }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('approve-form').submit();" class="btn btn-sm btn-success">
                                            Approve
                                        </a>

                                        <form id="approve-form" action="{{ route('admin.companies.approve', $company) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.companies.reject', $company) }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('reject-form').submit();" class="btn btn-sm btn-danger">
                                            Reject
                                        </a>

                                        <form id="reject-form" action="{{ route('admin.companies.reject', $company) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p class="text-center">
                                    No Company left to approve.
                                </p>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="pull-right">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
