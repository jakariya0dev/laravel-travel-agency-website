<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            {{-- <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li> --}}

            <li class="{{ Request::is('admin/profile') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>
            <li class="{{ Request::is('admin/logout') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.logout') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>
            <li class="{{ Request::is('admin/slider/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('slider.index') }}"><i class="fas fa-hand-point-right"></i> <span>Slider</span></a></li>
            <li class="{{ Request::is('admin/about/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.about.edit') }}"><i class="fas fa-hand-point-right"></i> <span>About</span></a></li>
            <li class="{{ Request::is('admin/feature/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.feature.edit') }}"><i class="fas fa-hand-point-right"></i> <span>Feature</span></a></li>
            <li class="{{ Request::is('admin/review/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('review.index') }}"><i class="fas fa-hand-point-right"></i> <span>Review</span></a></li>
            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('faq.index') }}"><i class="fas fa-hand-point-right"></i> <span>Faq</span></a></li>
            <li class="nav-item dropdown {{ Request::is('admin/blog/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Blog Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/blog-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('blog-category.index') }}"><i class="fas fa-angle-right"></i> Blog Category</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>