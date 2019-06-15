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
<li class="nav-item @if(url($path) == route('page.showSpace', ['space_slug' => $space->getSlug(), 'page_slug' => $s_page->getSlug()])) active @endif">
    <a class="nav-link" href="{{ route('page.showSpace', ['space_slug' => $space->getSlug(), 'page_slug' => $s_page->getSlug()]) }}">
        <i class="fas fa-fw fa-file"></i>
        <span>{{ $s_page->getDisplayName() }}</span></a>
</li>
@endforeach
