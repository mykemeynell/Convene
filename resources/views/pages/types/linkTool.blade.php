<div class="block-link">
    @if(key_exists('image', $block['data']['meta']))
    <div class="block-link__image">
        <a href="{{ $block['data']['link'] }}">
            <img src="{{ $block['data']['meta']['image']['url'] }}" alt="{{ $block['data']['meta']['title'] }}">
        </a>
    </div>
    @endif
    <div class="block-link__top">
        <div class="block-link__title">
            {{ $block['data']['meta']['title'] }}
        </div>
        <div class="block-link__link">
            <a href="#">{{ $block['data']['link'] }}</a>
        </div>
    </div>
    <div class="block-link__description">
        {{ $block['data']['meta']['description'] }}
    </div>
</div>
