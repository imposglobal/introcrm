<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item <?php echo ($currentURL == base_url('dashboard')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <!-- Add more sidebar items with similar logic -->
        <li class="nav-item <?php echo ($currentURL == base_url('ui-elements')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('ui-elements'); ?>">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">UI Elements</span>
            </a>
        </li>
        <!-- Add more sidebar items with similar logic -->
    </ul>
</nav>
