<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    {{ $space->getDisplayName() }}
</div>

<li class="nav-item @if($route == 'spaces.showActivity') active @endif">
    <a class="nav-link" href="{{ route('spaces.showActivity', ['space_slug' => $space->getSlug()]) }}">
        <i class="fas fa-fw fa-history"></i>
        <span>Activity</span></a>
</li>


@foreach($space->items() as $s_page)
<li class="nav-item @if(
        url($path) == route('page.showSpace', ['space_slug' => $space->getSlug(), 'page_slug' => $s_page->getSlug()]) ||
        url($path) == route('page.showEdit', ['space_slug' => $space->getSlug(), 'page_slug' => $s_page->getSlug()])
    ) active @endif">
    <a class="nav-link" href="{{ route('page.showSpace', ['space_slug' => $space->getSlug(), 'page_slug' => $s_page->getSlug()]) }}">
        <i class="fas fa-fw fa-file"></i>
        <span>{{ $s_page->getDisplayName() }}</span>@if(url($path) == route('page.showEdit', ['space_slug' => $space->getSlug(), 'page_slug' => $s_page->getSlug()]))<span class="badge badge-pill badge-light text-primary ml-2 hint--right hint--rounded hint--bounce" aria-label="You are currently editing this item"><i class="text-primary fas fa-pen mr-0"></i></span>@endif
    </a>
    @if($route !== 'page.showEdit')
    <div class="dropdown space-menu-item-dropdown">
        <a data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Move</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="#">Delete</a>
        </div>
    </div>
    @endif
</li>
@endforeach
