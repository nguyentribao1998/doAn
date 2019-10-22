<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="admin/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span></a>
    </li>

    <!-- Divider -->

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Danh mục sản phẩm
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Thể loại</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Danh mục sản phẩm</h6>
                    <a class="collapse-item" href="{{route('theloai.index')}}">Danh sách </a>
                    <a class="collapse-item" href="{{route('theloai.create')}}">Thêm mới </a>

                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#producttype" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Loại tin</span>
            </a>
            <div id="producttype" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Loại tin</h6>
                    <a class="collapse-item" href="{{route('loaitin.index')}}">Danh sách </a>
                    <a class="collapse-item" href="{{route('loaitin.create')}}">Thêm mới </a>

                </div>
            </div>
        </li>


        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Sản phẩm
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-pro"></i>
                <span>Tin tức</span>
            </a>
            <div id="product" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Quản lí sản phẩm</h6>
                    <a class="collapse-item" href="{{route('tintuc.index')}}">Danh sách </a>
                    <a class="collapse-item" href="{{route('tintuc.create')}}">Thêm mới </a>

                </div>
            </div>
        </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-pro"></i>
            <span>Slide</span>
        </a>
        <div id="product" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quản lí Slide</h6>
                <a class="collapse-item" href="{{route('slide.index')}}">Danh sách </a>
                <a class="collapse-item" href="{{route('slide.create')}}">Thêm mới </a>

            </div>
        </div>
    </li>









</ul>