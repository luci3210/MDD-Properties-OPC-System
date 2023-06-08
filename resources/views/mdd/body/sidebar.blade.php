<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{ url('mdd/assets/images/mdd-logo/logo-white-blue.png') }}" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="{{ url('mdd/assets/images/mdd-logo/logo-white.png') }}" srcset="{{ url('mdd/assets/images/logo-dark2x.png 2x') }}" alt="logo-dark">
                        </a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">




<li class="nk-menu-heading">
    <h6 class="overline-title text-primary-alt">Admin Setting</h6>
</li>

<li class="nk-menu-item has-sub">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
        <span class="nk-menu-text">Manage User</span><span class="nk-menu-badge">Admin</span>
    </a>
    <ul class="nk-menu-sub">

        <li class="nk-menu-item">
            <a href="{{ route('mu.user-index') }}" class="nk-menu-link"><span class="nk-menu-text">Manage Users</span></a>
        </li>
        <li class="nk-menu-item">
            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Manage Role</span></a>
        </li>
        <li class="nk-menu-item">
            <a href="{{ route('manage-department-index') }}" class="nk-menu-link"><span class="nk-menu-text">Manage Department</span></a>
        </li>
        <li class="nk-menu-item">
            <a href="{{ route('mu.request-account-index') }}" class="nk-menu-link"><span class="nk-menu-text">Manage Request</span></a>
        </li>
        
    </ul>
</li>

<li class="nk-menu-item has-sub">
    <a href="{{ route('manage-status-index') }}" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
        <span class="nk-menu-text">Manage Status</span>
    </a>
{{--     <ul class="nk-menu-sub">
        <li class="nk-menu-item">
            <a href="html/project-card.html" class="nk-menu-link"><span class="nk-menu-text">Project Cards</span></a>
        </li>
        <li class="nk-menu-item">
            <a href="html/project-list.html" class="nk-menu-link"><span class="nk-menu-text">Project List</span></a>
        </li>
    </ul> --}}
</li>

<li class="nk-menu-item has-sub">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
        <span class="nk-menu-text">Manage Client</span>
    </a>
    <ul class="nk-menu-sub">
        <li class="nk-menu-item">
            <a href="{{ route('c-client_index') }}" class="nk-menu-link"><span class="nk-menu-text">Clients</span></a>
        </li>
    </ul><!-- .nk-menu-sub -->
</li>

<li class="nk-menu-item has-sub">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
        <span class="nk-menu-text">Manage Report</span>
    </a>
    <ul class="nk-menu-sub">
        <li class="nk-menu-item">
            <a href="html/project-card.html" class="nk-menu-link"><span class="nk-menu-text">Project Cards</span></a>
        </li>
        <li class="nk-menu-item">
            <a href="html/project-list.html" class="nk-menu-link"><span class="nk-menu-text">Project List</span></a>
        </li>
    </ul>
</li>

<li class="nk-menu-item has-sub">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
        <span class="nk-menu-text">Manage Sales</span>
    </a>
</li>







<li class="nk-menu-heading">
    <h6 class="overline-title text-primary-alt">Department</h6>
</li><!-- .nk-menu-heading -->

<li class="nk-menu-item has-sub">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
        <span class="nk-menu-text">Casher</span>
    </a>
    <ul class="nk-menu-sub">
        <li class="nk-menu-item">
            <a href="{{ route('casher-over-the-counter') }}" class="nk-menu-link"><span class="nk-menu-text">Casher</span></a>
        </li>
        <li class="nk-menu-item">
            <a href="html/project-list.html" class="nk-menu-link"><span class="nk-menu-text">Project List</span></a>
        </li>
    </ul><!-- .nk-menu-sub -->
</li><!-- .nk-menu-item -->



<li class="nk-menu-item has-sub">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
        <span class="nk-menu-text">Finance</span>
    </a>
    <ul class="nk-menu-sub">
        <li class="nk-menu-item">
            <a href="html/user-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">User List - Regular</span></a>
        </li>
       
    </ul><!-- .nk-menu-sub -->
</li><!-- .nk-menu-item -->


<li class="nk-menu-item has-sub">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
        <span class="nk-menu-text">Marketing</span><span class="nk-menu-badge"></span>
    </a>
    <ul class="nk-menu-sub">
        <li class="nk-menu-item">
            <a href="html/customer-list.html" class="nk-menu-link">
                <em class="icon ni ni-chevron-right"></em>
                <span class="nk-menu-text">Banner</span>
            </a>
        </li>
        <li class="nk-menu-item">
            <a href="{{ route('ms-property-costing-index') }}" class="nk-menu-link">
                <em class="icon ni ni-chevron-right"></em>
                    <span class="nk-menu-text">Costing</span>
            </a>
        </li>

        <li class="nk-menu-item">
            <a href="{{ route('ms-location') }}" class="nk-menu-link"> 
                <em class="icon ni ni-chevron-right"></em>
                <span class="nk-menu-text">Location</span>
            </a>
        </li>
        <li class="nk-menu-item">
            <a href="{{ route('ms_pricing_index') }}" class="nk-menu-link">
                <em class="icon ni ni-chevron-right"></em>
                    <span class="nk-menu-text">Pricing</span>
            </a>
        </li>
        <li class="nk-menu-item">
            <a href="{{ route('ms-projects-index') }}" class="nk-menu-link">
                <em class="icon ni ni-chevron-right"></em> 
                <span class="nk-menu-text">Project Site</span>
            </a>
        </li>

    </ul><!-- .nk-menu-sub -->
</li><!-- .nk-menu-item -->


<li class="nk-menu-item has-sub">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
        <span class="nk-menu-text">Broker</span>
    </a>
    <ul class="nk-menu-sub">
        <li class="nk-menu-item">
            <a href="html/kyc-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">KYC List - Regular</span></a>
        </li>
        <li class="nk-menu-item">
            <a href="html/kyc-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">KYC Details - Regular</span></a>
        </li>
    </ul><!-- .nk-menu-sub -->
</li><!-- .nk-menu-item -->
<!-- .nk-menu-item -->



<li class="nk-menu-heading">
    <h6 class="overline-title text-primary-alt">Other</h6>
</li><!-- .nk-menu-heading -->

<li class="nk-menu-item has-sub">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
        <span class="nk-menu-text">My Setting</span>
    </a>
    <ul class="nk-menu-sub">
        <li class="nk-menu-item">
            <a href="html/project-card.html" class="nk-menu-link"><span class="nk-menu-text">Project Cards</span></a>
        </li>
        <li class="nk-menu-item">
            <a href="html/project-list.html" class="nk-menu-link"><span class="nk-menu-text">Project List</span></a>
        </li>
    </ul><!-- .nk-menu-sub -->
</li><!-- .nk-menu-item -->



                                
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>