@extends('templates.defaults')
@section('content')
    <form action="{{route('profile.postedit')}}" method="POST">
        @csrf
        <div class="container p-5">
            <div class="row pt-5 pb-5">
                <div class="col-4">
                    <label>first name</label>
                    <input type="text"  name="first_name" class="form-control" value="{{Request::old('first_name') ?: Auth::user()->first_name}}" placeholder="first name" >
                    @error('first_name')
                    <span class="form-text text-danger">{{$errors->first('first_name')}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label>last name</label>
                    <input type="text" name="last_name" value="{{Request::old('last_name') ?: Auth::user()->last_name}}" class="form-control" placeholder="last name">
                    @error('last_name')
                    <span class="form-text text-danger">{{$errors->first('last_name')}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <label>location</label>
                    <input type="text" name="location" class="form-control" value = "{{Request::old('location') ?: Auth::user()->location}}" placeholder="location">
                    @error('location')
                    <span class="form-text text-danger">{{$errors->first('location')}}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="bnt btn-success mt-2 border-success" > update</button>

        </div>
    </form>

@endsection
