@extends('templates.defaults')
@section('content')
    <div class="container p-5">
          <div class="row">
               <div class="col-lg-6">
                   <form role="form" action="" method="post">
                     <textarea placeholder="what up {{Auth::user()->getFirstNameOrUsername()}}?" rows="3" class="form-control" name="status" ></textarea>
                       <button type="button">update status</button>
                   </form>

               </div>
          </div>
        <div class="row" >
            <div class="col-lg-6">

            </div>

        </div>
    </div>
@endsection
