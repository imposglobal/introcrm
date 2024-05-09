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
        <li class="nav-item <?php echo ($currentURL == base_url('index.php/dashboard')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <?php if( $role != 3){ ?>
        <li class="nav-item <?php echo ($currentURL === base_url('index.php/customer') || $currentURL === base_url('index.php/customer/view')) ? 'active' : ''; ?>">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class=" menu-icon mdi mdi-account-card-details" style="font-size:18px"></i>
              <span class="menu-title">Customers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('customer'); ?>">Add Customer</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('customer/view'); ?>">View Customers</a></li>
              </ul>
            </div>
          <? } ?>
            <?php if( $role == 3){ ?>
          <li class="nav-item  <?php echo ($currentURL == base_url('index.php/customer')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('customer'); ?>">
            <i class="menu-icon mdi mdi-account-plus" style="font-size:18px"></i>
                <span class="menu-title">Add Customer</span>
            </a>
        </li>
        <li class="nav-item  <?php echo ($currentURL == base_url('index.php/customer/view')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('customer/view'); ?>">
            <i class="menu-icon mdi mdi-account-card-details" style="font-size:18px"></i>
                <span class="menu-title">View Customer</span>
            </a>
        </li>
       
        <li class="nav-item  <?php echo ($currentURL == base_url('index.php/status/New%20Lead')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('status/New%20Lead'); ?>">
            <i class=" menu-icon mdi mdi-account-star" style="font-size:18px"></i>
                <span class="menu-title">New Lead</span>
            </a>
        </li>
        <?php } ?>
        <?php if( $role == 3 || $role == 1 || $role == 0){ ?>

        <li class="nav-item  <?php echo ($currentURL == base_url('index.php/status/Callback')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('status/Callback?status=Callback'); ?>">
            <i class=" menu-icon mdi mdi-headphones-box" style="font-size:18px"></i>
                <span class="menu-title">View Callback</span>
            </a>
        </li>
            
        <?php } ?>


        <?php if( $role == 3 ){ ?>

        <li class="nav-item  <?php echo ($currentURL == base_url('index.php/status/DWP%20Submitted')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('status/DWP%20Submitted'); ?>">
            <i class=" menu-icon mdi mdi-account-check" style="font-size:18px"></i>
                <span class="menu-title">DWP Submitted</span>
            </a>
        </li>
        <li class="nav-item  <?php echo ($currentURL == base_url('index.php/status/Survey%20Booked')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('status/Survey%20Booked'); ?>">
            <i class=" menu-icon mdi mdi-file-check" style="font-size:18px"></i>
                <span class="menu-title">Survey Booked</span>
            </a>
        </li>
            
        <?php } ?>

          </li>
          <?php if(  $role == "0" ){ ?>
          <li class="nav-item <?php echo ($currentURL === base_url('index.php/invite') || $currentURL === base_url('index.php/introducer/view')) ? 'active' : ''; ?>">
            <a class="nav-link" data-toggle="collapse" href="#intro" aria-expanded="false" aria-controls="intro">
            <i class=" menu-icon mdi mdi-account-network" style="font-size:18px"></i>
              <span class="menu-title">Introducers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="intro">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('invite'); ?>">Invite</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('introducer/view'); ?>">View </a></li>
              </ul>
            </div>
            
          </li>
          <li class="nav-item  <?php echo ($currentURL == base_url('index.php/client/view')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('client/view'); ?>">
            <i class=" menu-icon mdi mdi-account-multiple" style="font-size:18px"></i>
                <span class="menu-title">Clients</span>
            </a>
        </li>
          <?php } ?>
    
        <?php if( $role == "1" || $role == 0){ 
            if($role != 3){
        ?>
        
      
        <li class="nav-item  <?php echo ($currentURL == base_url('index.php/agent/view')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('agent/view'); ?>">
                <i class=" menu-icon mdi mdi-account-box" style="font-size:18px"></i>
                <span class="menu-title"> Agents</span>
            </a>
        </li>

        <li class="nav-item  <?php echo ($currentURL == base_url('index.php/ip/Management')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('ip/Management'); ?>">
            <i class=" menu-icon mdi mdi-remote" style="font-size:18px"></i>
                <span class="menu-title">IP Management</span>
            </a>
        </li>
                <?php } ?>
       
        
        <?php }?>
        <?php if( $role == "1" || $role == 0 || $role == 3){  ?>
        <li class="nav-item  <?php echo ($currentURL == base_url('index.php/view/reports')) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url('view/reports'); ?>">
            <i class=" menu-icon mdi mdi-file-excel" style="font-size:18px"></i>
                <span class="menu-title">Get Reports</span>
            </a>
        </li>
            <?php } ?>
        <!-- Add more sidebar items with similar logic -->
    </ul>
</nav>
