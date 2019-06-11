<!-- Page Heading -->
<h3 class="h1 mb-0 text-gray-800">
    @foreach((array) $title as $step)
        @if(! $loop->last )
            <span class="text-secondary d-inline-block">{{ $step }} &rsaquo; </span>
        @else
            <span class="text-dark inline-block">{{ $step }}</span>
        @endif
    @endforeach
</h3>
