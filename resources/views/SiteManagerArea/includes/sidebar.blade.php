<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{asset('assets/img/blue.png')}}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link  {{ $curr_url=='siteManager.index'?'active':''}}"
                            href="{{route('siteManager.index')}}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Services</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link  {{ $curr_url=='siteManager.sites.all'?'active':''}}"
                            href="{{route('siteManager.sites.all')}}">
                            <i class="fas fa-building"></i>
                            <span class="nav-link-text">Sites</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ $curr_url=='siteManager.suppliers.all'?'active':''}}"
                            href="{{route('siteManager.suppliers.all')}}">
                            <i class="fas fa-users"></i>
                            <span class="nav-link-text">Suppliers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ $curr_url=='siteManager.items.all'?'active':''}}"
                            href="{{route('siteManager.items.all')}}">
                            <i class="fas fa-mountain"></i>
                            <span class="nav-link-text">Items</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
