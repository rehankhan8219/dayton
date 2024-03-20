@if (!$role->isAdmin())
    <x-utils.edit-button :href="route('admin.role.edit', $role)" />
    <x-utils.delete-button :href="route('admin.role.destroy', $role)" />
@endif
