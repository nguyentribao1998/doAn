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
    @if(Auth::user()->role == 1 ||Auth::user()->role == 2)
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Danh mục sản phẩm
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Category</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục sản phẩm</h6>
                <a class="collapse-item" href="{{route('category.index')}}">Danh sách </a>
                <a class="collapse-item" href="{{route('category.create')}}">Thêm mới </a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#producttype" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Producttype</span>
        </a>
        <div id="producttype" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Loai sản phẩm</h6>
                <a class="collapse-item" href="{{route('producttype.index')}}">Danh sách </a>
                <a class="collapse-item" href="{{route('producttype.create')}}">Thêm mới </a>

            </div>
        </div>
    </li>
    @endif
    @if(Auth::user()->role == 3||Auth::user()->role == 1)

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sản phẩm
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-pro"></i>
            <span>Product</span>
        </a>
        <div id="product" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quản lí sản phẩm</h6>
                <a class="collapse-item" href="{{route('product.index')}}">Danh sách </a>
                <a class="collapse-item" href="{{route('product.create')}}">Thêm mới </a>

            </div>
        </div>
    </li>
        @endif
    @if(Auth::user()->role == 4||Auth::user()->role == 1)

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Order
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#order" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-pro"></i>
                <span>Quản lí đơn hàng</span>
            </a>
            <div id="order" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('order.index')}}">Danh sách khách hàng </a>


                </div>
            </div>
        </li>


    @endif



</ul>