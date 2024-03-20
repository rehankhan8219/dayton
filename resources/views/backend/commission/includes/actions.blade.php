@if ($logged_in_user->can('admin.access.commission'))
    <x-utils.edit-button :href="route('admin.commission.edit', $commission)" />
    <x-utils.delete-button :href="route('admin.commission.destroy', $commission)" />
@endif
