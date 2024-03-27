@if ($broker->active == 1)
    <svg xmlns="http://www.w3.org/2000/svg" style="width:1.2em;height:1.2em;" class="d-inline-block text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span>Active</span>
@elseif ($broker->active == 2)
    <svg xmlns="http://www.w3.org/2000/svg" style="width:1.2em;height:1.2em;" class="d-inline-block text-danger" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span>Error</span>
@elseif ($broker->active == 0)
    <svg xmlns="http://www.w3.org/2000/svg" style="width:1.2em;height:1.2em;" class="d-inline-block text-danger" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span>Non Active</span>
@endif