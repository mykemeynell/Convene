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

<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-file"></i>
        <span>Welcome to Convene</span></a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>General Help</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">WiFi Passwords</a>
            <a class="collapse-item" href="#">Creating a WiFi network</a>
        </div>
    </div>
</li>
