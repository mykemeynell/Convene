<img src="https://www.gravatar.com/avatar/{{ md5($user->getEmail()) }}?s={{ isset($size) ? $size : 32 }}" alt="{{ $user->getDisplayName() }}'s Avatar" class="{{ isset($avatar_classes) ? $avatar_classes : '' }}">
