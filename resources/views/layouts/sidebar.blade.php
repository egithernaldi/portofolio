<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Portofolio</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.campur.aboutme') }}">
            <i class="fas fa-user"></i>
            <span>Profile</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.campur.portofolio') }}">
            <i class="fas fa-folder-open"></i>
            <span>Portofolio</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.campur.skills') }}">
            <i class="fas fa-thumbs-up"></i>
            <span>Skill</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.edit-section.index') }}">
            <i class="fas fa-tags"></i>
            <span>Sosial Media</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.campur.experience') }}">
            <i class="fas fa-clock"></i>
            <span>Pengalaman</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
