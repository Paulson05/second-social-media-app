<div class="media">
    <a>

        <img class="media-object" src="{{$user->getAvatarUrl()}}">
    </a>
    <div class="media-body">
         <h3 class="media-heading"><a href="{{route('profile.index', ['username'=> Auth::user()->username])}}">{{$user->getNameOrUsername()}}</a></h3>
  @if($user->location)
            <p class="m-2">  Location<strong>:{{$user->location}}</strong></p>

        @endif
    </div>
</div>
