@if ($logged_in_user->can('admin.access.user.list'))
    <x-utils.edit-button :href="route('admin.member.broker.edit', [$broker->user, $broker])" />
    <x-utils.delete-button :href="route('admin.member.broker.delete', [$broker->user, $broker])" />
@endif
