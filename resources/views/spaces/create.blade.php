@extends('layouts.page', [
    'page_title' => ['Spaces', 'Create'],
    'body_classes' => 'py-5',
    'show_sidebar' => false,
    'show_topbar' => false,
])

@push('title_buttons')
    <a href="{{ route('spaces.view') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Show All Spaces</a>
@endpush

@section('body')

    <div class="row">
        <div class="col-4 offset-4">

            <form action="">
                <div class="form-group">
                    <label for="space-name">Name:</label>
                    <input name="space[name]" id="space-name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="space-description">Description:</label>
                    <textarea name="space[description]" id="space-description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="space-access">Access:</label>
                    <select name="space[access]" id="space-access" class="selectize" id="space-access-select">

                    </select>
                </div>
            </form>

        </div>
    </div>

@endsection
