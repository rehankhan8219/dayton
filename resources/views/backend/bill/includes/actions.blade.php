@if ($logged_in_user->can('admin.access.bill'))
    <x-utils.edit-button :href="route('admin.bill.edit', $bill)" />
    <x-utils.delete-button :href="route('admin.bill.destroy', $bill)" />
@endif
