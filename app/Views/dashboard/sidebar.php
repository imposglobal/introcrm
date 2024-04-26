<style>
  
  .false{
    background: #f5f5f5 !important;
  }
</style>
<?php $session = session();
      $role = $session->get('role');
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item mb-3 <?php echo ($currentURL == base_url('index.php/dashboard')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item  <?php echo ($currentURL === base_url('index.php/customer')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('customer'); ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Add Customer</span>
            </a>
        </li>
        <li class="nav-item mb-3 <?php echo ($currentURL === base_url('index.php/customer/view')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('customer/view'); ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">View Customers</span>
            </a>
        </li>
       
        <?php if( $role != "1" && $role != "2" ){ ?>
          <li class="nav-item mb-3 <?php echo ($currentURL === base_url('index.php/invite')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('invite'); ?>">
                <i class=" menu-icon mdi mdi-account-multiple-plus" style="font-size:18px"></i>
                <span class="menu-title">Invite Introducer</span>
            </a>
        </li>
        <?php }?>

        <?php  if( $role != "2" ){ ?>
        <li class="nav-item  <?php echo ($currentURL == base_url('index.php/agent')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('agent'); ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Add Agents</span>
                
            </a>
          
        </li>
      
        <li class="nav-item mb-3 <?php echo ($currentURL == base_url('index.php/agent/view')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('agent/view'); ?>">
                <i class=" menu-icon mdi mdi-account-multiple-plus" style="font-size:18px"></i>
                <span class="menu-title">View Agent</span>
            </a>
        </li>

        <li class="nav-item  <?php echo ($currentURL == base_url('index.php/view/callback')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('view/callback'); ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">View Callback</span>
            </a>
        </li>
        
        <?php }?>

        <!-- Add more sidebar items with similar logic -->
    </ul>
</nav>
