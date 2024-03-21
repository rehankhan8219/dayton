@if ($logged_in_user->isAdmin())
    <x-utils.edit-button :href="route('admin.helpcenter.edit', $helpcenter)" />
    <x-utils.delete-button :href="route('admin.helpcenter.destroy', $helpcenter)" />
@endif
