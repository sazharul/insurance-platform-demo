<div class="col-lg-2">
    <div class="user_dashboard_sidebar">
        <ul>
            <li>
                <a href="{{ route('user.dashboard') }}" class="{{ Request::is('user/dashboard') ? 'active' : '' }}">Submit Insurance</a>
                <a href="{{ route('user.dashboard_draft') }}" class="{{ Request::is('user/dashboard/draft') ? 'active' : '' }}">Draft Insurance</a>
                <a href="{{ route('user.change_password') }}" class="{{ Request::is('user/change-password') ? 'active' : '' }}">Change Password</a>
            </li>
        </ul>
    </div>
</div>
