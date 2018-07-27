<header class="app-header">
  <a class="app-header__logo" href="#">{{ __('master.logo') }}</a>
  <!-- Sidebar toggle button-->
  <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <!-- Navbar Right Menu-->
  <ul class="app-nav">
     <li class="app-search">
        <input class="app-search__input" type="search" placeholder="{{ __('master.search') }}">
        <button class="app-search__button"><i class="fa fa-search"></i></button>
     </li>
     <!--Notification Menu-->
     <li class="dropdown">
        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
          <i class="fa fa-bell-o fa-lg"></i>
        </a>
     </li>
     <!-- User Menu-->
     <li class="dropdown">
        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
          <i class="fa fa-user fa-lg"></i>
        </a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
           <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i>{{ __('master.setting') }}</a></li>
           <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i>{{ __('master.profile') }}</a></li>
           <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out fa-lg"></i>{{ __('master.logout') }}</a></li>
        </ul>
     </li>
  </ul>
</header>
