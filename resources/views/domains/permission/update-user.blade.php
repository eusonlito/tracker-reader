@extends ('domains.permission.update-layout')

@section ('content')

<input type="search" class="form-control form-control-lg mt-5" placeholder="{{ __('permission-update-user.filter') }}" data-table-search="#permission-update-user-list-table" />

<div class="overflow-auto scroll-visible header-sticky">
    <form method="post">
        <table id="permission-update-user-list-table" class="table table-report sm:mt-2 font-medium font-semibold text-center whitespace-nowrap" data-table-sort data-table-pagination data-table-pagination-limit="10">
            <thead>
                <tr>
                    <th class="text-left">{{ __('permission-update-user.name') }}</th>
                    <th class="w-1"><input type="checkbox" data-checkall="#permission-update-user-list-table > tbody" /></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $each)

                @php ($link = route('user.update', $each->id))

                <tr>
                    <td class="text-left"><a href="{{ $link }}" class="block">{{ $each->name }}</a></td>
                    <td class="w-1"><input type="checkbox" name="selected[]" value="{{ $each->id }}" {{ $each->selected ? 'checked' : '' }} /></td>
                </tr>

                @endforeach
            </tbody>
        </table>

        <div class="box p-5 mt-5">
            <div class="text-right">
                <button type="submit" name="_action" value="updateUser" class="btn btn-primary">{{ __('permission-update-user.relate') }}</button>
            </div>
        </div>
    </form>
</div>

@stop
