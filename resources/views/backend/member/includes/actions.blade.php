@if ($logged_in_user->can('admin.access.user.list'))
    <x-utils.link :href="route('admin.member.broker.create', $member)" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fas fa-plus" :text="__('Add Broker')" />
    <x-utils.edit-button :href="route('admin.member.edit', $member)" />
    <x-utils.delete-button :href="route('admin.member.delete', $member)" />
@endif