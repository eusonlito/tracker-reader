@extends ('domains.permission.update-layout')

@section ('content')

<form method="post">
    <input type="hidden" name="_action" value="update" />

    <div class="box p-5 mt-5">
        <div class="p-2">
            <label for="permission-code" class="form-label">{{ __('permission-update.code') }}</label>
            <input type="text" class="form-control form-control-lg" id="permission-code" value="{{ $REQUEST->input('code') }}" readonly>
        </div>

        <div class="p-2">
            <div class="form-check">
                <input type="checkbox" name="enabled" value="1" class="form-check-switch" id="permission-enabled" {{ $REQUEST->input('enabled') ? 'checked' : '' }}>
                <label for="permission-enabled" class="form-check-label">{{ __('permission-update.enabled') }}</label>
            </div>
        </div>
    </div>


    <div class="box p-5 mt-5">
        <div class="text-right">
            <button type="submit" class="btn btn-primary">{{ __('permission-update.save') }}</button>
        </div>
    </div>
</form>

@stop
