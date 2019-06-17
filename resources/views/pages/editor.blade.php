@inject('service', Convene\Storage\Service\Contract\SpaceAccessServiceInterface)

@extends('layouts.page', [
    'container_id' => 'relative-container'
])

@php /** @var \Convene\Storage\Entity\SpaceEntity $space */ @endphp
@php /** @var \Convene\Storage\Entity\PageEntity $page */ @endphp
@php /** @var \Convene\Storage\Entity\FolderEntity $folder */ @endphp

@switch($route)
    @case('page.showCreate')
        @php $endpoint = route('page.handleCreate', ['space_slug' => $space->getSlug()]); @endphp
    @break

    @case('page.showEdit')
        @php $endpoint = route('page.handleUpdate', ['space_slug' => $space->getSlug(), 'page_slug' => $page->getSlug()]); @endphp
    @break

    @case('page.showFolderEdit')
        @php $endpoint = route('page.handleFolderUpdate', ['space_slug' => $space->getSlug(), 'folder_slug' => $folder->getSlug(), 'page_slug' => $page->getSlug()]); @endphp
    @break
@endswitch

@section('body')

    <input type="hidden" id="space-page-form" value="{{ $endpoint }}">
    <input type="hidden" id="space-id" value="{{ $space->getKey() }}">
    @if(in_array($route, ['page.showEdit']))
        <input type="hidden" id="page-id" value="{{ $page->getKey() }}">
    @endif
    @if($route == 'page.showFolderEdit')
        <input type="hidden" id="folder-id" value="{{ $folder->getKey() }}">
    @endif
    @if(strpos(strtolower($route), 'edit') !== false)
        <input type="hidden" id="editor-data" value="{{ $page->getContent() }}">
    @endif
    <!-- Editor wrapper -->
    <div class="codex-editor" id="codex-editor"></div><!-- end of editor wrapper -->

@endsection
