@php $stretched = $block['data']['stretched'] === true; @endphp
@php $captioned = ! empty($block['data']['caption']); @endphp
@php $caption = $block['data']['caption']; @endphp
@php $background = $block['data']['withBackground'] === true; @endphp

<div class="block-image figure-caption my-5 {{ $background ? 'bg-gray-200 text-center py-3 rounded' : '' }}">

    <img src="{{ $block['data']['file']['url'] }}" class="{{ $stretched ? 'img-fluid' : '' }} {{ $captioned ? "" : '' }} rounded" alt="{{ $caption }}">

@if($captioned)
        <div class="caption mt-1 {{ $background || $stretched ? 'mx-auto' : '' }}">
            {{ $caption }}
        </div>
@endif
</div>
