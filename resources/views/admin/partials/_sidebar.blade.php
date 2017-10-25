<div class="panel panel-default">
    <div class="panel-heading">
        SideBar
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="{{ \Route::current()->getName() == 'admin.home' ? 'active' : '' }}"><a href="{{ route('admin.home') }}">Home</a></li>
            <li role="presentation" class="{{ \Route::current()->getName() == 'admin.companies' ? 'active' : '' }}"><a href="{{ route('admin.companies') }}">Companies <span class="badge pull-right">{{ $unapprovedCompany }}</span></a></li>
            <li role="presentation"  class="{{ \Route::current()->getName() == 'admin.employees' ? 'active' : '' }}"><a href="{{ route('admin.employees') }}">Employees <span class="badge pull-right">{{ $unapprovedEmployee }}</span></a></li>
        </ul>
    </div>
</div>
