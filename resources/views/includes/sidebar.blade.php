<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Main</li>
                <li class="">
                    {{-- <a href="{{route('admin')}}" class="waves-effect {{ request()->is(" admin") ||
                        request()->is("admin/*") ? "mm active" : "" }}"> --}}
                        <a href="javascript:;">
                            <i class="ti-home"></i><span class="badge badge-primary badge-pill float-right">2</span>
                            <span>
                                Dashboard </span>
                        </a>
                </li>


                {{-- <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i><span> Products <span
                                class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li>
                            <a href="/Products" class="waves-effect {{ request()->is(" Products") ||
                                request()->is("/Products/*") ? "mm active" : "" }}"><i
                                    class="dripicons-view-apps"></i><span>Products List</span></a>
                        </li>

                    </ul>
                </li> --}}

                <li class="menu-title">Manage</li>

                <li class="">
                    <a href="{{ route('books.index') }}" class="waves-effect mm active">
                        <i class="dripicons-to-do"></i> <span> Books </span>
                    </a>
                </li>


            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->