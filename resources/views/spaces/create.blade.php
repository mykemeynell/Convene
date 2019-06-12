@inject('service', Convene\Storage\Service\Contract\SpaceAccessServiceInterface)

@extends('layouts.page', [
    'page_title' => ['Spaces', 'Create'],
    'body_classes' => 'py-5 vh-100',
    'wrapper_classes' => 'vh-100',
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
                    <select name="space[access]" id="space-access" class="selectize">
                        @foreach($service->fetchAll() as $level)
                            <option value="{{ $level->getKey() }}" data-data="{{ json_encode(['icon' => $level->getIcon(), 'description' => $level->getDescription()]) }}">{{ $level->getDisplayName() }}</option>
                        @endforeach
                    </select>
                </div>
            </form>

        </div>
    </div>

@endsection
