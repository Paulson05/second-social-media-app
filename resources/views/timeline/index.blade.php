@extends('templates.defaults')
@section('content')
    <div class="container p-5">
          <div class="row">
               <div class="col-lg-6">
                   <form role="form" action="{{route('timeline.index')}}" method="POST">
                       @csrf
                     <textarea placeholder="what up {{Auth::user()->getFirstNameOrUsername()}}?" rows="3" class="form-control" name="status" ></textarea>
                       @error('status')
                       <span class="alert alert-primary">{{$errors->first('status')}}</span>
                       @enderror
                       <button class="btn btn-success btn-sm m-2" type="submit">update status</button>
                   </form>

               </div>
          </div>
        <div class="row" >
            <div class="col-lg-6">

            </div>

        </div>
    </div>
@endsection
