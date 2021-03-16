@extends('templates.defaults')
@section('content')

    <header class="masthead" style="background:url('assets/img/bg-pattern.png'), linear-gradient(to left, #7b4397, #dc2430);height:100%;">
        <div class="container h-100">
            <div class="row h-100">

                @if (!Auth::check())
                <div class="col-lg-7 my-auto">
                    <div class="container" style="">

                        {{--                    @if (!Auth::check())--}}
                        <h2 style="color: white">Sign up</h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="" method= "POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" style="color: white">Email address:</label>
                                        <input type="email" class="form-control" placeholder="Enter email" name ="email" id="email"  required>
                                        {{-- @if($errors-has('email '))
                                            <span class="help-block">{{ $error->first('username') }}</span>
                                        @endif --}}
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="pwd" style="color: white">username:</label>
                                        <input type="text" class="form-control" placeholder="Enter username"  name ="username"  id="pwd" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="pwd" style="color: white">Password:</label>
                                        <input type="password" class="form-control" placeholder="Enter password"  name ="password"  id="pwd" required value="">
                                    </div>

                                    <div class="form-group form-check">
                                        <label class="form-check-label" style="color: white">
                                            <input class="form-check-input style="color: white"" type="checkbox"> Remember me
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign up</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-auto d-none d-md-block">
                    <div class="device-container">
                        @include('templates.partials.alert')
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device" style="background-image:url('assets/img/iphone_6_plus_white_port.png');">
                                <div class="screen"><img class="img-fluid" src="assets/img/demo-screen-1.jpg"></div>
                                <div class="button"></div>
                            </div>
                        </div>
                    </div>
                    <div class="iphone-mockup"></div>
                </div>
            </div>
        </div>
            @endif

        <div class="container">
            <form action="" method="post">
                @csrf
                <input type="text" name="emal" id="" placeholder="type your email">
                <button type="submit">submit</button>
            </form>
        </div>
    </header>

@endsection
