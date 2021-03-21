@extends('templates.defaults')

@section('content')

    <div class="container" style="">

        {{--                    @if (!Auth::check())--}}
        <h2 style="color: white">Sign up</h2>
        <div class="row">
            <div class="col-lg-8">
                @include('templates.partials.alert')
                <form action="{{route('auth.postsignup')}}" method= "POST">
                    @csrf
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" style="color: white">Email address:</label>
                        <input type="email" class="form-control" placeholder="Enter email" name ="email" id="email" value = "{{Request::old('email') ?: ''}}">
                        @error('email')
                        <span class="form-text text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="pwd" style="color: white">username:</label>
                        <input type="text" class="form-control" placeholder="Enter username"  name ="username"  id="pwd" value = "{{Request::old('username') ?: ''}}" >
                        @error('username')
                        <span class="form-text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pwd" style="color: white">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter password"  name ="password"  id="pwd" value = "{{Request::old('password') ?: ''}}">
                        @error('password')
                        <span class="form-text text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Sign up</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
