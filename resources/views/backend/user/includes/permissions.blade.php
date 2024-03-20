<div class="form-group row">
    {{-- <label for="permissions" class="col-md-2 col-form-label">@lang('Additional Permissions')</label> --}}
    <label for="permissions" class="col-md-2 col-form-label">@lang('Permissions')</label>

    <div class="col-md-4 mt-2">
        @include('backend.role.includes.no-permissions-message')

        <div x-show="userType === '{{ $model::TYPE_ADMIN }}'">
            @include('backend.user.includes.partials.permission-type', ['type' => $model::TYPE_ADMIN])
        </div>

        <div x-show="userType === '{{ $model::TYPE_USER}}'">
            @include('backend.user.includes.partials.permission-type', ['type' => $model::TYPE_USER])
        </div>
    </div>
</div><!--form-group-->
