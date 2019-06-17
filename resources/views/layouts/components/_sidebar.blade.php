<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('spaces.view') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/logo/logo-white.svg') }}" width="39" alt="Convene Logo">
        </div>
        <div class="sidebar-brand-text mx-3">Convene</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Activity -->
    {{--<li class="nav-item @if(in_array($route, ['spaces.view'])) active @endif">--}}
        {{--<a class="nav-link" href="{{ route('spaces.view') }}">--}}
            {{--<i class="fas fa-fw fa-briefcase"></i>--}}
            {{--<span>Activity</span></a>--}}
    {{--</li>--}}

    <li class="nav-item @if(in_array($route, ['spaces.view'])) active @endif">
        <a class="nav-link" href="{{ route('spaces.view') }}">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Spaces</span></a>
    </li>

    @if(in_array($route, ['spaces.showSpace', 'spaces.showActivity', 'page.showSpace', 'page.showCreate', 'page.showEdit', 'page.showFolderSpace', 'page.showFolderEdit']))
        @include('layouts.components._space-items')
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider" id="afterSpaceItems">

    <!-- Heading -->
    <div class="sidebar-heading">
        Application
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>{{ __('Settings') }}</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
