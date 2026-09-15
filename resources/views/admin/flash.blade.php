@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('flash_message'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }} </strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
        <span class="float_right hide_parents"> <img src="{{ asset('frontend/learner/akar-icons_cross_black_large.png') }}" alt=""></span>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors as $error)
        <div class="alert alert-info alert-block">
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
@endif
