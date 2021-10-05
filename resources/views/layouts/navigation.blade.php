<div class="navbar-inner">
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">

        <!-- Nav items -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="ni ni-tv-2 text-primary"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('orders*') ? 'active' : '' }}" href="{{ route('orders.index') }}">
                    <i class="ni ni-bag-17 text-orange"></i>
                    <span class="nav-link-text">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                    <i class="ni ni-tag text-primary"></i>
                    <span class="nav-link-text">Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('inventory*') ? 'active' : '' }}" href="{{ route('inventory.index') }}">
                    <i class="ni ni-check-bold text-green"></i>
                    <span class="nav-link-text">Inventory</span>
                </a>
            </li>
        </ul>

        {{--
        <!-- Divider -->
        <hr class="my-3">

        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
        </h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                    <i class="ni ni-spaceship"></i>
                    <span class="nav-link-text">Getting started</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                    <i class="ni ni-palette"></i>
                    <span class="nav-link-text">Foundation</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                    <i class="ni ni-ui-04"></i>
                    <span class="nav-link-text">Components</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                    <i class="ni ni-chart-pie-35"></i>
                    <span class="nav-link-text">Plugins</span>
                </a>
            </li>
        </ul>
        --}}

    </div>
</div>
