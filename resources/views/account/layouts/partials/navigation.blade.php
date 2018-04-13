<div class="list-group">
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
    <a href="{{ route('account.twofactor.index') }}"
       class="list-group-item list-group-item-action {{ return_if(on_page('account/twofactor'), 'active')}}">
        Two Factor Authentication
    </a>
    <a href="{{ route('account.deactivate.index') }}"
       class="list-group-item list-group-item-action {{ return_if(on_page('account/deactivate'), 'active')}}">
        Deactivate Account
    </a>
    <a href="{{ route('account.token.index') }}"
       class="list-group-item list-group-item-action {{ return_if(on_page('account/tokens'), 'active')}}">
        API Tokens
    </a>

</div>

@subscribed
    @notpiggybacksubscription
    <div class="list-group mt-3">
        @subscriptionnotcancelled
            <a href="{{ route('account.subscription.swap.index') }}"
               class="list-group-item list-group-item-action {{ return_if(on_page('account/subscription/swap'), 'active')}}">
                Change Plan
            </a>
            <a href="{{ route('account.subscription.cancel.index') }}"
               class="list-group-item list-group-item-action {{ return_if(on_page('account/subscription/cancel'), 'active')}}">
                Cancel Subscription
            </a>
        @endsubscriptionnotcancelled
        @subscriptioncancelled
            <a href="{{ route('account.subscription.resume.index') }}"
               class="list-group-item list-group-item-action {{ return_if(on_page('account/subscription/resume'), 'active')}}">
                Resume Subscription
            </a>
        @endsubscriptioncancelled
        <a href="{{ route('account.subscription.card.index') }}"
           class="list-group-item list-group-item-action {{ return_if(on_page('account/subscription/card'), 'active')}}">
            Update Card
        </a>
        @teamsubscription
        <a href="{{ route('account.subscription.team.index')}}"
           class="list-group-item list-group-item-action {{ return_if(on_page('account/subscription/team'), 'active')}}">
            Manage Team
        </a>
        @endteamsubscription
    </div>
    @endnotpiggybacksubscription
@endsubscribed
