@inject('service', Convene\Storage\Service\Contract\SpaceAccessServiceInterface)

@extends('layouts.page', [
    'container_id' => 'relative-container'
])

@section('body')

    <input type="hidden" id="space-page-form" value="{{ $route == 'page.showCreate' ? route('page.handleCreate', ['space_slug' => $space->getSlug()]) : route('page.handleUpdate', ['space_slug' => $space->getSlug(), 'page_slug' => $page->getSlug()]) }}">
    <input type="hidden" id="space-id" value="{{ $space->getKey() }}">
    @if($route == 'page.showEdit')
        <input type="hidden" id="page-id" value="{{ $page->getKey() }}">
        <input type="hidden" id="editor-data" value="{{ $page->getContent() }}">
    @endif
    <!-- Editor wrapper -->
    <div class="codex-editor" id="codex-editor"></div><!-- end of editor wrapper -->

@endsection
