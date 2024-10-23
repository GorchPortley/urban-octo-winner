<div>
    @foreach($designs as $design)
        <div>
            {{$design->name}}
            {{$design->cost}}
        </div>

    @endforeach
</div>