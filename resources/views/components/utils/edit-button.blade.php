@props(['href' => '#', 'permission' => false])

<x-utils.link :href="$href" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fas fa-pencil-alt" :text="__('Edit')" permission="{{ $permission }}" />
