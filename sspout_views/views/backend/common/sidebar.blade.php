<!-- sidebar code start here -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                @if (Auth::guard('admin_user')->user())
                <p>{{ Auth::guard('admin_user')->user()->name }}</p>
                @endif
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Users Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> View All Users</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Add User</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> View All Groups</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Add Group</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Permissions</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Categories Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> View All Categories</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Add Category</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- sidebar code end here -->