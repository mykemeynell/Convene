@inject('service', Convene\Storage\Service\Contract\SpaceAccessServiceInterface)

@extends('layouts.page', [
    'container_id' => 'relative-container'
])

{{--@push('title_buttons')--}}
{{--    <a href="{{ route('spaces.view') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Show All Spaces</a>--}}
{{--@endpush--}}

@section('body')

{{--    <div id="convene-space-page-buttons">--}}
{{--        <a href="#" class="btn btn-round btn-primary">Edit this page</a>--}}
{{--    </div>--}}

    <!-- Editor wrapper -->
    <div class="codex-editor" id="codex-editor"></div><!-- end of editor wrapper -->

@endsection
