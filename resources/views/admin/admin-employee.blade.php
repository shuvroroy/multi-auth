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
                                @forelse ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.employees.approve', $employee) }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('approve-form-{{ $employee->id }}').submit();" class="btn btn-sm btn-success">
                                                Approve
                                            </a>

                                            <form id="approve-form-{{ $employee->id }}" action="{{ route('admin.employees.approve', $employee) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.employees.reject', $employee) }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('reject-form-{{ $employee->id }}').submit();" class="btn btn-sm btn-danger">
                                                Reject
                                            </a>

                                            <form id="reject-form-{{ $employee->id }}" action="{{ route('admin.employees.reject', $employee) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <p class="text-center">
                                        No Employee left to approve.
                                    </p>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{ $employees->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
