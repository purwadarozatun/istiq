<div class="ui attached vertical menu fluid borderless inverted large">
    @if(($items = app('laravolt.menu')->roots()) && (!$items->isEmpty()))
        @include('ui::menu.sidebar_items', ['items' => $items])
    @endif
</div>
