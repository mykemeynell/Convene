<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    <div class="d-inline-block w-50">
        {{ $space->getDisplayName() }}
    </div><div class="d-inline-block w-50 text-right">
        <a href="#" id="new-folder-trigger"><i class="fas fa-folder-plus"></i></a>
    </div>
</div>

<li class="nav-item @if($route == 'spaces.showActivity') active @endif">
    <a class="nav-link" href="{{ route('spaces.showActivity', ['space_slug' => $space->getSlug()]) }}">
        <i class="fas fa-fw fa-history"></i>
        <span>Activity</span></a>
</li>


@foreach($space->pages() as $s_page)
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

@foreach($space->folders() as $s_folder)
    @php $id = md5(microtime()); @endphp
    <li class="nav-item">
        <a class="nav-link @if($s_folder->getSlug() !== $request->route('folder_slug')) collapsed @endif" href="#" data-toggle="collapse" data-target="#item-{{ $id }}" aria-expanded="{{ $s_folder->getSlug() !== $request->route('folder_slug') ? 'false' : 'true' }}" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ $s_folder->getDisplayName() }}</span>
        </a>
        <div id="item-{{ $id }}" class="collapse {{ $s_folder->getSlug() === $request->route('folder_slug') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <a href="{{ route('page.showFolderCreate', ['space_slug' => $space->getSlug(), 'folder_slug' => $s_folder->getSlug()]) }}" class="collapse-item"><i class="fas fa-plus fa-fw mr-2"></i>New Page</a>
                @foreach($s_folder->pages() as $f_page)
                    <a href="{{ route('page.showFolderSpace', ['space_slug' => $space->getSlug(), 'folder_slug' => $s_folder->getSlug(), 'page_slug' => $f_page->getSlug()]) }}"
                       class="collapse-item {{ url($path) ===  route('page.showFolderSpace', ['space_slug' => $space->getSlug(), 'folder_slug' => $s_folder->getSlug(), 'page_slug' => $f_page->getSlug()]) ? 'active' : ''}}">{{ $f_page->getDisplayName() }}</a>
                @endforeach
            </div>
        </div>
    </li>
@endforeach
