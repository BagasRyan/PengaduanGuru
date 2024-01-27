<div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
          <div>
            <h6 class="logo-text">Pengaduan Guru</h6>
          </div>
          <div class="toggle-icon ms-auto">
            <i class="bx bx-arrow-to-left"></i>
          </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
        <li>
          <a href="{{ route('dashboard') }}">
              <div class="parent-icon"><i class="bx bx-home"></i></div>
              <div class="menu-title">Beranda</div>
            </a>
            </li>
            @foreach($sidebar as $menu)
          <li>
          <a href="{{ route($menu->menu_route) }}">
              <div class="parent-icon"><i class="{{ $menu->menu_icon }}"></i></div>
              <div class="menu-title">{{ $menu->menu_name }}</div>
            </a>
            </li>
            @endforeach

        </ul>
      </div>