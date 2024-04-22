<style>
  .nav-link{
    background: #f5f5f5;
  }
</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item mb-1 <?php echo ($currentURL == base_url('dashboard')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
       
        <li class="nav-item mb-1 <?php echo ($currentURL == base_url('customer/add')) ? 'active' : ''; ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Customer</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link active" href="<?php echo base_url('customer'); ?>">Add Customer</a></li>
                <li class="nav-item"> <a class="nav-link active" href="<?php echo base_url('customer/view'); ?>">View Customer</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item mb-1 <?php echo ($currentURL == base_url('invite')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                <i class=" menu-icon mdi mdi-account-multiple-plus" style="font-size:18px"></i>
                <span class="menu-title">Invite</span>
            </a>
        </li>

        <li class="nav-item mb-1 <?php echo ($currentURL == base_url('agent')) ? 'active' : ''; ?>">
            <a class="nav-link" data-toggle="collapse" href="#magent" aria-expanded="false" aria-controls="magent">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Manage Agents</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="magent">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link active" href="<?php echo base_url('agent'); ?>">Add Agents</a></li>
                <li class="nav-item"> <a class="nav-link active" href="<?php echo base_url('agent/view'); ?>">View Agents</a></li>
              </ul>
            </div>
          </li>
        <!-- Add more sidebar items with similar logic -->
    </ul>
</nav>
