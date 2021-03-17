<div class="media">
    <a>

        <img class="media-object" src="{{$user->getAvatarUrl()}}">
    </a>
    <div class="media-body">
         <h3 class="media-heading"><a href="{{route('profile.index', ['username' => $user->username])}}">{{$user->getNameOrUsername()}}</a></h3>
    </div>
</div>
