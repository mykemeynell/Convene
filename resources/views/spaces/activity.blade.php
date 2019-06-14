@extends('layouts.page', ['page_title' => ['Spaces', $space->getDisplayName(), 'Activity']])

@push('title_buttons')
    <a href="{{ route('spaces.showCreate') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create Space</a>
@endpush

@section('body')

    <div class="row">
        <div class="col-12">
        </div>
    </div>

@endsection
