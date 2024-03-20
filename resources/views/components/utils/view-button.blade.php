@props(['href' => '#', 'permission' => false])

<x-utils.link :href="$href" class="btn btn-outline-info btn-sm waves-effect waves-light" icon="fas fa-search" :text="__('View')" permission="{{ $permission }}" />
