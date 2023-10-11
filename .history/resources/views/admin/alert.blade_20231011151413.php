@if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
@if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif
@if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif
@if(session('primary'))
    <div class="alert alert-primary">
        {{ session('primary') }}
    </div>
@endif
@if(session('secondary'))
    <div class="alert alert-secondary">
        {{ session('secondary') }}
    </div>
@endif
@if(session('light'))
    <div class="alert alert-light">
        {{ session('light') }}
    </div>

@endif
