<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
   <div class="app-sidebar__user">
      <img class="app-sidebar__user-avatar" src="images/admin/avatar/admin.png" alt="User Image">
      <div>
        <p class="app-sidebar__user-name">{{ __('master.admin') }}</p>
        <p class="app-sidebar__user-designation">{{ __('master.manage') }}</p>
      </div>
   </div>
   <ul class="app-menu">
      <li><a class="app-menu__item active" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i>
        <span class="app-menu__label">@lang('master.home')</span></a>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i>
          <span class="app-menu__label">@lang('master.categories')</span>
          <i class="treeview-indicator fa fa-angle-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ route('admin.categories.index') }}"><i class="icon fa fa-circle-o"></i> @lang('master.list_category')</a></li>
          <li><a class="treeview-item" href="{{ route('admin.categories.create') }}"><i class="icon fa fa-circle-o"></i> @lang('master.add_category')</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i>
          <span class="app-menu__label">@lang('master.films')</span><i class="treeview-indicator fa fa-angle-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('admin.films.index') }}"><i class="icon fa fa-circle-o"></i> @lang('master.list_film')</a></li>
            <li><a class="treeview-item" href="{{ route('admin.films.create') }}"><i class="icon fa fa-circle-o"></i> @lang('master.add_film')</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i>
          <span class="app-menu__label">@lang('master.bookings')</span><i class="treeview-indicator fa fa-angle-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ route('admin.bookings.index') }}"><i class="icon fa fa-circle-o"></i> @lang('master.list_booking')</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i>
          <span class="app-menu__label">@lang('master.users')</span><i class="treeview-indicator fa fa-angle-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ route('admin.users.index') }}"><i class="icon fa fa-circle-o"></i> @lang('master.list_user')</a></li>
          <li><a class="treeview-item" href="{{ route('admin.users.create') }}"><i class="icon fa fa-circle-o"></i> @lang('master.add_user')</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i>
          <span class="app-menu__label">@lang('master.pages')</span><i class="treeview-indicator fa fa-angle-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> @lang('master.logout_page')</a></li>
          <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> @lang('master.user_page')</a></li>
          <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> @lang('master.mailbox')</a></li>
        </ul>
      </li>
   </ul>
</aside>
