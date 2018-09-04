<header class="app-header">
  <a class="app-header__logo" href="#">{{ __('master.logo') }}</a>
  <!-- Sidebar toggle button-->
  <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <!-- Navbar Right Menu-->
  <ul class="app-nav">
     <li class="app-search">
      <div class="container">
        <div class="row searchFilter" >
          <div class="col-sm-12" >
            <div class="input-group" >
            <input id="table_filter" type="text" class="form-control" aria-label="Text input with segmented button dropdown" >
            <div class="input-group-btn" >
              <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><span class="label-icon" >Category</span> <span class="caret" >&nbsp;</span></button>
              <div class="dropdown-menu dropdown-menu-right" >
                <ul class="category_filters" >
                  <li >
                    <input class="cat_type category-input" data-label="all" id="all" value="all" name="search-filter" type="radio" ><label for="all" >All</label>
                  </li>
                  <li >
                    <input class="cat_type category-input" data-label="film" id="film" value="film" name="search-filter" type="radio" ><label for="film" >Film</label>
                  </li>
                  <li >
                    <input type="radio" name="search-filter" id="user" value="user" ><label class="category-label" for="user" >User</label>
                  </li>
                </ul>
              </div>
              <a href="#searchModal" data-toggle="modal"><button id="searchBtn" type="button" class="btn btn-secondary btn-search" ><span class="glyphicon glyphicon-search" >&nbsp;</span> <span class="label-icon" >Search</span></button></a>
            </div>
            </div>
            <div class="search-hint" id="search-hint"></div>
          </div>
        </div>
      </div>
     </li>
     <!--Notification Menu-->
     <li class="dropdown">
        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
          <i class="fa fa-bell-o fa-lg"></i>
        </a>
     </li>
     <!-- User Menu-->
     <li class="dropdown">
        <a class="app-nav__item" href="#"  id="logout-button" data-toggle="dropdown" aria-label="Open Profile Menu">
          <i class="fa fa-user fa-lg"></i>
        </a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
           <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i>{{ __('master.setting') }}</a></li>
           <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i>
            @if (Auth::user())
              {{ Auth::user()->full_name }}
           @endif
          </a></li>
           <li><a class="dropdown-item" id="link-click-me" href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-lg"></i>{{ __('master.logout') }}</a></li>
        </ul>
     </li>
  </ul>
</header>

<!-- Model search result -->
<div class="modal" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog-centered modal-full" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="model-title">Result:</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-4" id="result">
                    <div class="row">
                    <div id="group-film-result" class="group-film-small"> 
                    </div>
                    <div id="group-user-result" class="group-film-small"> 
                    </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
