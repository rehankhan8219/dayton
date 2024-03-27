@if ($withdrawal->status == 'processing')
    <x-utils.form-button
        :action="route('admin.withdrawal.mark', [$withdrawal, 1])"
        method="patch"
        button-class="btn btn-outline-success btn-sm waves-effect waves-light"
        icon="fas fa-check"
        name="confirm-item"
        permission="admin.access.withdrawal"
        >
        @lang('Mark As Paid')
    </x-utils.form-button>
    <x-utils.form-button
        :action="route('admin.withdrawal.mark', [$withdrawal, 2])"
        method="patch"
        button-class="btn btn-outline-danger btn-sm waves-effect waves-light"
        icon="fas fa-times"
        name="confirm-item"
        permission="admin.access.withdrawal"
        >
        @lang('Mark As Unpaid')
    </x-utils.form-button>
@else
    ---
@endif
