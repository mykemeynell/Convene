<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h2 mb-0 text-gray-800">
        @foreach((array) $title as $step)
            @if(! $loop->last )
                <span class="text-secondary d-inline-block">{{ $step }} &rsaquo; </span>
            @else
                <span class="text-dark inline-block">{{ $step }}</span>
            @endif
        @endforeach
    </h1>

    @stack('title_buttons')
</div>
