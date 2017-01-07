<script>
    @foreach($bags as $bag)
    Messenger({
        extraClasses: 'messenger-fixed messenger-on-top animated messenger-type-{{ $bag['type'] }}',
        theme: 'dark'
    }).post({!! json_encode($bag) !!});
    @endforeach
</script>
