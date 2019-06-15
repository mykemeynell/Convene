@inject('service', Convene\Storage\Service\Contract\SpaceAccessServiceInterface)

@extends('layouts.page', [
    'container_id' => 'relative-container'
])

@section('body')

    <input type="hidden" id="space-page-form" value="{{ $route == 'page.showCreate' ? route('page.handleCreate', ['space_slug' => $space->getSlug()]) : route('page.handleUpdate') }}">
    <input type="hidden" id="space-id" value="{{ $space->getKey() }}">
    <!-- Editor wrapper -->
    <div class="codex-editor" id="codex-editor"></div><!-- end of editor wrapper -->

@endsection
