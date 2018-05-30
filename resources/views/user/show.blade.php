<h2>{{ $user->loc_name }}</h2>

@if ($user->names->count())
    @foreach ($user->names as $name)
        <div class="name">
            <h3> {{ $user->loc_name }} </h3>
            <p> {{ $name->name }} </p>
        </div>
    @endforeach
@endif