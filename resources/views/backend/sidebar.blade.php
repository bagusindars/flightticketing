<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel" style="margin-top: 10px;">
    <div class="pull-left image">
      <img src="{{ asset('images/'.Auth::user()->avatar) }}" alt="" style="border-radius: 50%;width: 90px">
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user()->name }}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- search form -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li class="active">
      <a href="#">
        <i class="fa fa-home"></i> <span>Home</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-green">new</small>
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-database"></i> <span>Manage</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="{{request()->root()}}/admin/muser"><i class="fa fa-users"></i> Users</a></li>
        <li><a href="{{request()->root()}}/admin/mreservasi"><i class="fa fa-bookmark-o"></i>Reservation</a></li>
        <li><a href="{{request()->root()}}/admin/mrute"><i class="fa fa-plane" aria-hidden="true"></i>Rute</a></li>
        <li><a href="{{request()->root()}}/admin/mkota"><i class="fa fa-building" aria-hidden="true"></i>Kota</a></li>
        <li><a href="{{request()->root()}}/admin/mbandara"><i class="fa fa-building" aria-hidden="true"></i>Bandara</a></li>
        <li><a href="{{request()->root()}}/admin/mairlist"><i class="fa fa-plane" aria-hidden="true"></i>Air List</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-plus"></i> <span>Create</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{request()->root()}}/admin/create/rute"><i class="fa fa-plane" aria-hidden="true"></i>Rute</a></li>
        <li><a href="{{request()->root()}}/admin/create/kota"><i class="fa fa-building" aria-hidden="true"></i>Kota</a></li>
        <li><a href="{{request()->root()}}/admin/create/bandara"><i class="fa fa-building" aria-hidden="true"></i>Bandara</a></li>
        <li><a href="{{request()->root()}}/admin/create/al"><i class="fa fa-plane" aria-hidden="true"></i>Air List</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-check"></i> <span>Confirmation</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{request()->root()}}/admin/transaksi"><i class="fa fa-bookmark-o"></i>Transaksi</a></li>
      </ul>
    </li>
  </ul>
</section>