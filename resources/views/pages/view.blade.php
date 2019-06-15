@inject('service', Convene\Storage\Service\Contract\SpaceAccessServiceInterface)

@extends('layouts.page')

@section('body')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @foreach($page->getBlocks() as $block)
{{--                    {{ $block['type'] }}{{ view()->exists("pages.types.{$block['type']}") }}<br>--}}
                    @if(view()->exists("pages.types.{$block['type']}"))
                        @include("pages.types.{$block['type']}", compact('block'))
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection
