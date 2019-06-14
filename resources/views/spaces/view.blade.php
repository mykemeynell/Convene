@inject('service', Convene\Storage\Service\Contract\SpaceAccessServiceInterface)

@extends('layouts.page', [
    'container_id' => 'relative-container'
])

{{--@push('title_buttons')--}}
{{--    <a href="{{ route('spaces.view') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Show All Spaces</a>--}}
{{--@endpush--}}

@section('body')

<form id="space-page-form" name="space-page-form" action="{{ route('page.handlePost') }}" method="POST">
    {!! csrf_field() !!}
    <textarea name="page[content]" id="page-content" class="d-none"></textarea>

    <!-- Editor wrapper -->
    <div class="codex-editor" id="codex-editor"></div><!-- end of editor wrapper -->
</form>

@endsection
