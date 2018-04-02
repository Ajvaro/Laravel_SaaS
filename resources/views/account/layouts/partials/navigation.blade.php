<a href="{{ route('account.index') }}"
   class="list-group-item list-group-item-action {{ return_if(on_page('account'), 'active')}}">
    Account Overview
</a>
<a href="{{ route('account.profile.index') }}"
   class="list-group-item list-group-item-action {{ return_if(on_page('account/profile'), 'active') }}">
    Profile
</a>
<a href="{{ route('account.password.index') }}"
   class="list-group-item list-group-item-action {{ return_if(on_page('account/password'), 'active')}}">
    Change Password
</a>
