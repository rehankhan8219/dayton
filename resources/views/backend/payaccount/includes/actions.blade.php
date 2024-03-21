@if ($logged_in_user->isAdmin())
    <x-utils.edit-button :href="route('admin.payaccount.edit', $payaccount)" />
    <x-utils.delete-button :href="route('admin.payaccount.destroy', $payaccount)" />
@endif
