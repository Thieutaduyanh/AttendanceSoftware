<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: mediumslateblue">
    <!-- Brand Logo -->
    <div class="dropdown">
        <a href="#" class="brand-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @can('teacher')
                    <img src="{{ asset('/image/user.png') }}" alt="Teacher" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-dark" style="margin-left: 0px">{{ Auth::user()->username }}</span>
            @endcan

            @can('admin')
                <img src="{{ asset('/image/duy anh.png') }}" alt="Admin" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-dark">Admin</span>
            @endcan
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-right-from-bracket" style="color: darkgrey"></i> Đăng Xuất
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div>

        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline" style="margin-top: 10px">
            <div class="input-group" data-widget="sidebar-search">
                <div  class="form-control form-control-sidebar" style="background-color: rebeccapurple">Menu</div>
                <div class="input-group-append">
                    <button class="btn btn-sidebar" style="background-color: rebeccapurple">
                        <i class="fas fa-book fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2" >
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item menu-open">

                    <ul class="nav nav-treeview">

                        @can('admin')
                        <li class="nav-item">
                            <a href=" {{ route('student.index') }}" class="nav-link active">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <p>Sinh Viên</p>
                            </a>
                        </li>
                        @endcan

                        @can('admin')
                        <li class="nav-item">
                            <a href="{{ route('classes.index') }}" class="nav-link active">
                                <i class="fas fa-school nav-icon"></i>
                                <p>Lớp Học</p>
                            </a>
                        </li>
                        @endcan

                        @can('admin')
                        <li class="nav-item">
                            <a href="{{ route('classroom.index') }}" class="nav-link active">
                                <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                <p>Phòng Học</p>
                            </a>
                        </li>
                        @endcan

                        @can('admin')
                        <li class="nav-item">
                            <a href="{{ route('subject.index') }}" class="nav-link active">
                                <i class="fas fa-graduation-cap nav-icon"></i>
                                <p>Môn Học</p>
                            </a>
                        </li>
                        @endcan

                        @can('admin')
                        <li class="nav-item">
                            <a href="{{ route('permission.index') }}" class="nav-link active">
                                <i class="fas fa-tasks nav-icon"></i>
                                <p>Quyền</p>
                            </a>
                        </li>
                        @endcan

                        @can('admin')
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link active">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Người Dùng</p>
                            </a>
                        </li>
                        @endcan

                        @can('admin')
                        <li class="nav-item">
                            <a href="{{ route('attendance.index') }}" class="nav-link active">
                                <i class="fas fa-clipboard nav-icon"></i>
                                <p>Quản Lý Điểm Danh </p>
                            </a>
                        </li>
                        @endcan

                        <li class="nav-item">
                            <a href="{{ route('work.index') }}" class="nav-link active">
                                <i class="fas fa-clipboard-list nav-icon"></i>
                                <p>Điểm Danh </p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
