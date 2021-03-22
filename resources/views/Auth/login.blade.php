@extends('templates.defaults')
@section('content')
    <div class="container" style="">

        {{--                    @if (!Auth::check())--}}
        <h2 style="color: white">login</h2>
        <div class="row">
            <div class="col-lg-8">
                @include('templates.partials.alert')
                <form action="{{route('auth.postlogin')}}" method= "POST">
                    @csrf
                    <div class="form-group">
                        <label class="text-danger">Email address:</label>
                        <input type="email" class="form-control" placeholder="Enter email" name ="email" id="email" value = "{{Request::old('email') ?: ''}}">
                        @error('email')
                        <span class="form-text text-danger">{{$errors->first('email')}}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label class="text-danger">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter password"  name ="password"  id="pwd" value = "{{Request::old('password') ?: ''}}">
                        @error('password')
                        <span class="form-text text-danger">{{$errors->first('password')}}</span>
                        @enderror
                    </div>

                    <div class="form-group form-check">
                        <label class="form-check-label" style="color: white">
                            <input class="form-check-input style="color: white"" type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary"> login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
