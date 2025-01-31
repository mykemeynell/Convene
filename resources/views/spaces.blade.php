@extends('layouts.page', ['page_title' => 'Spaces'])

@push('title_buttons')
    <a href="{{ route('spaces.showCreate') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create Space</a>
@endpush

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Space</th>
                        <th>Description</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($spaces as $space)
                    <tr>
                        <td>
                            <img src="https://placehold.it/50" alt="Space Icon" class="mr-2">
                            <span><a href="{{ route('spaces.showActivity', ['space_slug' => $space->getSlug()])  }}">{{ $space->getDisplayName() }}</a></span>
                        </td>
                        <td>
                            {{ $space->getDescription() }}
                        </td>
                        <td align="right">
                            <a href="#" class="btn btn-outline-dark btn-sm">Options</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
