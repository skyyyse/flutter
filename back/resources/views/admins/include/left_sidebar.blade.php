<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">
    <!-- Brand Logo Light -->
    <a href="{{route("admin.dashboard")}}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{asset('admin/assets/images/logo.png')}}" alt="logo" />
        </span>
        <span class="logo-sm">
            <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="small logo" />
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{route("admin.dashboard")}}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="dark logo" />
        </span>
        <span class="logo-sm">
            <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="small logo" />
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.php">
                <img src="{{asset('admin/assets/images/users/avatar-1.jpg')}}" alt="user-image" height="42" class="rounded-circle shadow-sm" />
                <span class="leftbar-user-name mt-2">aaaaaaaaaa</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title">Navigation</li>
            <li class="side-nav-item">
                <a href="{{route("admin.dashboard")}}" class="side-nav-link">
                    <i class="ri-calendar-event-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-title">Apps</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#employee" aria-expanded="false" aria-controls="employee" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span> Employee </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="employee">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route("user.index")}}">Users</a>
                        </li>
                        <li>
                            <a href="{{route("user.create")}}">Create Users</a>
                        </li>
                        <li>
                            <a href="{{route("user.history")}}">history Login</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#customer" aria-expanded="false" aria-controls="customer" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span> Customer </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="customer">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="table_customer.php">customer</a>
                        </li>
                        <li>
                            <a href="#">history customer</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category" class="side-nav-link">
                    <i class="ri-shopping-bag-3-fill"></i>
                    <span> Category </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="category">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route("categories.index")}}">All Category</a>
                        </li>
                        <li>
                            <a href="{{route('sub.index')}}">Sub Category</a>
                        </li>
                        <li>
                            <a href="{{route("categories.create")}}">Create Category</a>
                        </li>
                        <li>
                            <a href="{{route("sub.create")}}">Create Sub Category</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#brands" aria-expanded="false" aria-controls="brands" class="side-nav-link">
                    <i class="ri-shopping-bag-3-fill"></i>
                    <span> Brands </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="brands">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('brands.index')}}">All Brands</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products" class="side-nav-link">
                    <i class="ri-shopping-bag-3-fill"></i>
                    <span> Producs </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="products">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('products.index')}}">All Producs</a>
                        </li>
                    </ul>
                </div>
            </li>




            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="ri-mail-line"></i>
                    <span> Email </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('user.chat')}}">Chat</a>
                        </li>
                        <li>
                            <a href="{{route('user.inbox')}}">Inbox</a>
                        </li>
                        <li>
                            <a href="apps-email-read.php">Read Email</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-title">Custom</li>
            <li class="side-nav-item">
                <a href="{{route('slider.index')}}" class="side-nav-link">
                    <i class="ri-list-check-3"></i>
                    <span>Slider </span>
                </a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
