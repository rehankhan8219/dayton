@if ($logged_in_user->can('admin.access.grow_tree'))
    <x-utils.edit-button :href="route('admin.growtree.edit', $growtree)" />
    <x-utils.delete-button :href="route('admin.growtree.destroy', $growtree)" />
@endif
