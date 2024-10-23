<div>
    @foreach($drivers as $driver)
        <div>
            {{$driver->brand}}
            {{$driver->model}}
        </div>

    @endforeach
</div>
