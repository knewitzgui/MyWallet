@if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {!! $error !!}<br>
        @endforeach
    </div>
@endif

@if (Session::has('message'))
    <div class="alert alert-success">
        {!! Session::get('message') !!}
    </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-info">
        {!! Session::get('info') !!}
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning">
        {!! Session::get('warning') !!}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">
        {!! Session::get('error') !!}
    </div>
@endif
