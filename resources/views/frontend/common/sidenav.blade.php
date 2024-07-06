<div class="panel panel-default">
    <div class="panel-body text-center">
        <div class="pv-lg">
            <img class="center-block img-responsive img-thumbnail" src="{{ asset($userData->photo ?? 'frontend/defaault-image.png')}}" alt="Contact">
            <h3>Name:  {{ Str::ucfirst(Auth::user()->name ?? 'N/A') }}</h3>
        </div>
      
    </div>
    @php
        $route = Route::current()->getName();
        $prefix = Request::route()->getPrefix();
    @endphp
    <div class="panel-body shadow-lg" style="max-height:250px; overflow-y: auto;">
        <ul class="list-group">
            <li class="list-group-item {{ ($route == 'user.dashboard') ? 'active' : '' }}">
                <a href="{{ route('user.dashboard')}}" class="btn btn-link">Dashboard</a>
            </li>
            <li class="list-group-item {{ ($route == 'my_course_view') ? 'active' : '' }}">
                <a href="{{ route('my_course_view')}}" class="btn btn-link">My Course</a>
            </li>
            <li class="list-group-item {{ ($route == 'my.profile.view') ? 'active' : '' }}">
                <a href="{{ route('my.profile.view') }}" class="btn btn-link">Class Routine</a>
            </li>
            <li class="list-group-item {{ ($route == 'my.profile.view') ? 'active' : '' }}">
                <a href="{{ route('my.profile.view') }}" class="btn btn-link">Exam Routine</a>
            </li>
            <li class="list-group-item {{ ($route == 'my.profile.view') ? 'active' : '' }}">
                <a href="{{ route('my.profile.view') }}" class="btn btn-link">My Profile</a>
            </li>
            <li class="list-group-item">
                <a href="#" class="btn btn-link" data-toggle="modal" data-target="#changePasswordModal">Change Password</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('logout') }}" class="btn btn-link" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
