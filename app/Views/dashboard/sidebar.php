<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item <?php echo ($currentURL == base_url('dashboard')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
       
        <li class="nav-item <?php echo ($currentURL == base_url('customer/add')) ? 'active' : ''; ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Customer</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link active" href="<?php echo base_url('customer/add'); ?>">Add Customer</a></li>
                <li class="nav-item"> <a class="nav-link active" href="<?php echo base_url('customer/add'); ?>">View Customer</a></li>
              </ul>
            </div>
          </li>
        <!-- Add more sidebar items with similar logic -->
    </ul>
</nav>
