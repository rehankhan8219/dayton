@if ($logged_in_user->can('admin.access.bill'))
    <x-utils.edit-button :href="route('admin.bill.edit', $bill)" />
    <x-utils.delete-button :href="route('admin.bill.destroy', $bill)" />

    @if ($bill->status != 'paid')
        <x-utils.form-button
            :action="route('admin.bill.mark', [$bill, 'paid'])"
            method="patch"
            button-class="btn btn-outline-success btn-sm waves-effect waves-light"
            icon="fas fa-check"
            name="confirm-item"
        >
            @lang('Paid')
        </x-utils.form-button>
        <x-utils.form-button
            :action="route('admin.bill.mark', [$bill, 'unpaid'])"
            method="patch"
            button-class="btn btn-outline-danger btn-sm waves-effect waves-light"
            icon="fas fa-times"
            name="confirm-item"
        >
            @lang('Unpaid')
        </x-utils.form-button>
    @endif

@endif
