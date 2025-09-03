<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="#" class="brand-link">
            <span class="brand-text fw-light">AdminLTE 4</span>
        </a>
    </div>
    <!--end::Sidebar Brand-->
    
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation">
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-person"></i>
                        <p>Profile</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-database"></i>
                        <p>
                            Master Data
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-bar-chart"></i>
                        <p>
                            Reports
                            <span class="nav-badge badge text-bg-info me-3">New</span>
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-graph-up"></i>
                                <p>
                                    Sales
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-record-circle"></i>
                                        <p>Daily Report</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-record-circle"></i>
                                        <p>Monthly Report</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Analytics</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-header">SYSTEM</li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-gear"></i>
                        <p>Settings</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-question-circle"></i>
                        <p>Help</p>
                    </a>
                </li>
                
                @yield('sidebar-menu')
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->