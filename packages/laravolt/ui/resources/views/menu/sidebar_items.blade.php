@foreach($items as $item)

    @if($item->hasChildren())
        <div class="item">
            <div class="header">
                @if($item->data('icon'))
                <i class="icon {{ $item->data('icon') }}"></i>
                @endif
                {!! $item->title !!}
            </div>
            <div class="menu">
                @include('ui::menu.sidebar_items', ['items' => $item->children()])
            </div>
    @else
        <a href="{{ $item->url() }}" class="item">
            {!! $item->title !!}
            <i class="icon left {{ $item->data('icon') }}"></i>
    @endif

    @if($item->hasChildren())
        </div>
    @else
        </a>
    @endif
@endforeach
