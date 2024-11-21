<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Quản lý Nhân viên</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('employee.showIndex') }}" aria-expanded="false">
                    <span>
                         <i class="ti ti-chevron-right"></i>
                    </span>
                        <span class="hide-menu">Danh sách</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('employee.showCreate') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chevron-right"></i>
                    </span>
                        <span class="hide-menu">Thêm mới</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Quản lý Phòng ban</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('department.showIndex') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chevron-right"></i>
                    </span>
                        <span class="hide-menu">Danh sách phòng ban</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('department.showCreate') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chevron-right"></i>
                    </span>
                        <span class="hide-menu">Thêm mới phòng ban</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Quản lý Chức vụ</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('position.showIndex') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chevron-right"></i>
                    </span>
                        <span class="hide-menu">Danh sách chức vụ</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('position.showCreate') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chevron-right"></i>
                    </span>
                        <span class="hide-menu">Thêm chức vụ</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Quản lý Hợp đồng</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('contract.showIndex') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chevron-right"></i>
                    </span>
                        <span class="hide-menu">Danh sách hợp đồng</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('contract.showCreate') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chevron-right"></i>
                    </span>
                        <span class="hide-menu">Thêm mới hợp đồng</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Quản lý hiệu suất nhân viên</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('employee-performance.showIndex') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chevron-right"></i>
                    </span>
                        <span class="hide-menu">Danh sách báo cáo</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('employee-performance.showCreate') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chevron-right"></i>
                    </span>
                        <span class="hide-menu">Thêm báo cáo báo cáo</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
