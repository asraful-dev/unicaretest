<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#17A2B8;">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block text-center">
          <a class="btn btn-success" target="_blank" href="{{ route('home') }}" class="nav-link">Visit Site</a>
      </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                      <img src="{{ asset('backend/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                          class="img-size-50 mr-3 img-circle">
                      <div class="media-body">
                          <h3 class="dropdown-item-title">
                              Brad Diesel
                              <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                          </h3>
                          <p class="text-sm">Call me whenever you can...</p>
                          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                  </div>
                  <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                      <img src="{{ asset('backend/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                          class="img-size-50 img-circle mr-3">
                      <div class="media-body">
                          <h3 class="dropdown-item-title">
                              John Pierce
                              <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                          </h3>
                          <p class="text-sm">I got your message bro</p>
                          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                  </div>
                  <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                      <img src="{{ asset('backend/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                          class="img-size-50 img-circle mr-3">
                      <div class="media-body">
                          <h3 class="dropdown-item-title">
                              Nora Silvester
                              <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                          </h3>
                          <p class="text-sm">The subject goes here</p>
                          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                  </div>
                  <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                  <i class="fas fa-envelope mr-2"></i> 4 new messages
                  <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                  <i class="fas fa-users mr-2"></i> 8 friend requests
                  <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                  <i class="fas fa-file mr-2"></i> 3 new reports
                  <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
      </li>

      <!-- Profile Dropdown Menu -->
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="{{ route('profile.view') }}" class="dropdown-item">
                  <i class="fas fa-user mr-2"></i> My Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item" data-toggle="modal" data-target="#changePasswordModal">
                  <i class="fas fa-lock mr-2"></i> Change Password
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('admin.logout') }}" class="dropdown-item">
                  <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
              </a>
          </div>
      </li>
  </ul>
</nav>
<!-- /.navbar -->
<!-- পাসওয়ার্ড পরিবর্তনের মডাল -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Password Change Form -->
                <form action="{{ route('passwordUpdate') }}" method="POST" id="passwordChangeForm">
                    @csrf
                    <!-- Old Password -->
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <div class="input-group">
                            <input type="password" name="old_password" class="form-control" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- New Password -->
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Confirm New Password -->
                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" class="form-control" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Password Change Button -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(function(button) {
        button.addEventListener('click', function() {
            const passwordInput = this.parentNode.previousElementSibling;
            const passwordType = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', passwordType);
            this.innerHTML = passwordType === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    });
</script>
