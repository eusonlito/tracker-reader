@extends ('layouts.in')

@section ('body')

<form method="get">
    <div class="sm:flex sm:space-x-4">
        <div class="flex-grow mt-2 sm:mt-0">
            <input type="search" class="form-control form-control-lg" placeholder="{{ __('permission-index.filter') }}" data-table-search="#permission-list-table" />
        </div>
    </div>
</form>

<div class="overflow-auto scroll-visible header-sticky">
    <table id="permission-list-table" class="table table-report sm:mt-2 font-medium font-semibold text-center whitespace-nowrap" data-table-sort>
        <thead>
            <tr>
                <th class="text-left w-1">{{ __('permission-index.code') }}</th>
                <th class="text-left">{{ __('permission-index.name') }}</th>
                <th class="w-1">{{ __('permission-index.users') }}</th>
                <th>{{ __('permission-index.enabled') }}</th>
                <th>{{ __('permission-index.admin') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($list as $row)

            @php ($link = route('permission.update', $row->id))

            <tr>
                <td class="text-left w-1"><a href="{{ $link }}" class="block">{{ $row->code }}</a></td>
                <td class="text-left"><a href="{{ $link }}" class="block">{{ $row->title() }}</a></td>
                <td class="w-1">{{ $row->users_count }}</td>
                <td data-table-sort-value="{{ (int)$row->enabled }}" class="w-1">@status($row->enabled)</td>
                <td data-table-sort-value="{{ (int)$row->admin }}" class="w-1">@status($row->admin)</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@stop
