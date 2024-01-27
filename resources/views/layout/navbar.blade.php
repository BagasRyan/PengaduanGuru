<nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class="bx bx-menu"></i></div>

            <div class="top-menu ms-auto">
              <ul class="navbar-nav align-items-center">

                  <div class="dropdown-menu dropdown-menu-end">
                    <div class="header-notifications-list"></div>
                  </div>
 
                  <div class="dropdown-menu dropdown-menu-end">
                    <div class="header-message-list"></div>
                  </div>
              </ul>
            </div>
            <!-- <div class="user-box dropdown">
              <a
                class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <div class="user-info ps-3">
                  <p class="user-name mb-0">{{ $database->username }}</p>
                  <p class="designattion mb-0">{{ $database->profesi }}</p>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href=""
                    ><i class="bx bx-user"></i><span>Profile</span></a
                  >
                </li>
                <li> -->
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                  <button class="btn btn-sm"><i class="bx bx-log-out-circle"> Logout</i></button>
                  </form>
                <!-- </li>
              </ul>
            </div> -->
          </nav>