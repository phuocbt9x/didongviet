<!-- Header-Custom -->
<div class="header-custom">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="{{ asset('assets/admin') }}/#" role="button"><i
                        class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ asset('assets/admin') }}/index3.html" class="brand-link">
            <img src="{{ asset('assets/admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('assets/admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ asset('assets/admin') }}/#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}"
                            class="nav-link  {{ ($title == 'Dashboard')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('banner.index') }}"
                            class="nav-link  {{ ($title == 'Banner')  ? 'active' : ''}}">
                            <i class="nav-icon far fa-images"></i>
                            <p>Banner</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}"
                            class="nav-link  {{ ($title == 'Category')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact.index') }}"
                            class="nav-link  {{ ($title == 'Contact')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-file-contract"></i>
                            <p>Contact</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('coupon.index') }}"
                            class="nav-link  {{ ($title == 'Coupon')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-ticket-alt"></i>
                            <p>Coupon</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('attribute.index') }}"
                            class="nav-link  {{ ($title == 'Attribute')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>Attribute</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('attributeValue.index') }}"
                            class="nav-link  {{ ($title == 'AttributeValue')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Attribute Value</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('discount.index') }}"
                            class="nav-link  {{ ($title == 'Discount')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-percent"></i>
                            <p>Discount</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}"
                            class="nav-link  {{ ($title == 'Product')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>Product</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link  {{ ($title == 'User')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>User Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('role.index') }}" class="nav-link  {{ ($title == 'Role')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-user-tag"></i>
                            <p>Role</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login.logout') }}" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                    <li class="nav-header"></li>
                    <li class="nav-header"></li>
                    <li class="nav-header"></li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</div>