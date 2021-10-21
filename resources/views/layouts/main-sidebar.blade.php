<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->

                    <li>
                        <a href={{route('dashboard')}}><i class="ti-home"></i><span class="right-nav-text">
                            dashboard</span> </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>


                    <!-- menu item todo-->
                    <li>
                        <a href={{route('products.index')}}><i class="ti-menu-alt"></i><span class="right-nav-text">
                                Products</span> </a>
                    </li>
                    <li>
                        <a href={{route('couriers.index')}}><i class="ti-menu-alt"></i><span class="right-nav-text">
                                Couriers</span> </a>
                    </li>

                    <li>
                        <a href={{route('shipments.index')}}><i class="ti-menu-alt"></i><span class="right-nav-text">
                                Shipment </span> </a>
                    </li>


                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
