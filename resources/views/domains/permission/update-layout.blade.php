@extends ('layouts.in')

@section ('body')

<div class="box flex items-center px-5">
    <div class="nav nav-tabs flex overflow-auto whitespace-nowrap" role="tablist">
        <a href="{{ route('permission.update', $row->id) }}" class="p-4 {{ ($ROUTE === 'permission.update') ? 'active' : '' }}" role="tab">{{ $row->title() }}</a>
    </div>

    <div class="nav nav-tabs flex overflow-auto whitespace-nowrap" role="tablist">
        <a href="{{ route('permission.update.user', $row->id) }}" class="p-4 {{ ($ROUTE === 'permission.update.user') ? 'active' : '' }}" role="tab">{{ __('permission-update.header.users') }}</a>
    </div>
</div>

<div class="tab-content">
    <div class="tab-pane active" role="tabpanel">
        @yield('content')
    </div>
</div>

@stop
