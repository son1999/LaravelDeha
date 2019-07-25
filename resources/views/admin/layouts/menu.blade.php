<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
    style="background: #353A40">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-shield"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hello {{ Auth::user()->name }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            Dashboard
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading <--></-->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
       aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        Category
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('category.index') }}">Danh Sách Thể loại</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
       aria-controls="collapseThree">
        <i class="fas fa-fw fa-cog"></i>
        ProductType
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('producttype.index') }}">Danh Sách Danh Mục</a>
        </div>
    </div>
</li>
<hr class="sidebar-divider">
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
