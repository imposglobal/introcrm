<!-- Included header sidebar & footer in layout -->
<?= $this->extend("layout/layout") ?>
<!-- Define the content section -->
<?= $this->section("content") ?>
<title>View Agent</title>
<style>
    .drop-area {
        border: 2px dashed #ccc;
        padding: 40px;
        text-align: center;
        margin-bottom: 20px;
    }

    .drop-text {
        margin-top: 0;
    }

    .file-list {
        border: 1px solid #ccc;
        padding: 10px;
        max-height: 500px;
        overflow-y: auto;
    }

    .file-item {
        margin-bottom: 5px;
    }
    .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 99999 ;
  top: 0;
  right: 0;
  background-color: #fff;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #111;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #11111150;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<?php 
$session = session();
$center = $session->get('center');
$location = $session->get('location');
$name = $session->get('fname') . " " . $session->get('lname');
$id = $session->get('id');
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body mt-2">
                                <h4 style="display: inline-block;" class="card-title"><i class="mdi mdi-account-multiple bg-primary h4 pt-1 px-2 text-white rounded"></i>
                                    View Agent</h4>

                                    <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModaldd">
                                    Add Agent
                                    </button>
 <!-- The Modal -->
 <div class="modal" id="myModaldd">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Agent</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
                                <!-- table code start -->
                                <div class="container-scroller">
                                    <div class="py-4">
                                    <div class=" d-flex align-items-center auth px-0">
                                        <div class="row w-100 mx-0">
                                        <div class="col-lg-12">
                                            <div class="auth-form-light text-left py-1 ">
                                            
                                            <form class="" action="<?php echo base_url(
                                                "/agent/add"
                                            ); ?>" method="post">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text"   name="fname" class="form-control form-control-lg" id="fname" placeholder="First Name" value="<?= set_value(
                                                            "fname"
                                                        ) ?>">
                                                        <input type="hidden" id="role" name="role" value="2">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text"  name="lname" class="form-control form-control-lg" id="lname" placeholder="Last Name" value="<?= set_value(
                                                            "lname"
                                                        ) ?>">
                                                     </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>User Name</label>
                                                        <input type="text"  name="username" class="form-control form-control-lg" id="username" placeholder="User Name" value="<?= set_value(
                                                            "username"
                                                        ) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password"  name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Center Name</label>
                                                        <input type="text"  name="center_name" class="form-control form-control-lg" id="center_name" placeholder="Center Name" value="<?= $center; ?>" readonly>
                                                     </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <input type="text"  name="location" class="form-control form-control-lg" id="location" placeholder="Location" value="<?= $location; ?>" readonly>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-lg-12">
                                                    <div class="mt-3">
                                                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  >Add Agent</button>
                                                    </div>
                                                </div>
                                                
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- content-wrapper ends -->
                                    </div>
                                    <!-- page-body-wrapper ends -->
                                </div>

                                
                         <!-- table code end -->
        </div>
    
      </div>
    </div>
  </div>
  
                                <hr>
                                <!-- alert message code using flash data -->
                                <?php if (session()->has("alrt")): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session("alrt") ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <!-- alert message code end -->

                                <!-- table code start -->
                                
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Center Name</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php if (
                                            $users &&
                                            count($users) >= 1
                                        ): ?>
                                        <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td>
                                                <?= $i++ ?>
                                            </td>                                       
                                            <td>
                                                <?= $user["fname"] ?>
                                            </td>
                                            
                                            <td>
                                                <?= $user["lname"] ?>
                                            </td>                                          
                                            <td>
                                                <?= $user["center_name"] ?>
                                            </td>
                                            <td>
                                                <?= $user["username"] ?>
                                            </td> 
                                            <td>
                                                <?= $user["password"] ?>
                                            </td> 
                                           
                                            <td>
                                           
                                            <?php
                                            $role = $session->get("role");
                                            if (
                                                $role == 0 ||
                                                $role == 1 ||
                                                $role == 3
                                            ) { ?>
                                            <a href="<?php echo base_url(
                                                "agent/edit/" . $user["id"]
                                            ); ?>" data-toggle="tooltip" data-placement="top" title="edit agent"><i class="mdi mdi-account-edit bg-primary h4 pt-2 px-2 text-white rounded-circle"></i></a>
                                            <?php }
                                            ?>

                                            <?php if (
                                                $role == 0 ||
                                                $role == 1 ||
                                                $role == 3
                                            ) { ?>
                                            <a href="<?php echo base_url(
                                                "agent/delete/" . $user["id"]
                                            ); ?>" onclick="confirmDelete(this)" data-toggle="tooltip" data-placement="top" title="Delete customer"><i class="mdi mdi-account-remove bg-danger h4 pt-2 px-2 text-white rounded-circle"></i></a>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="7">No agents found.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                
                         <!-- table code end -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <?php echo $pager->links("default", "full_pagination"); ?>
            </div>
                
            </div>
            </div>
           
            
        </div>
    </div>

    <script>
    function confirmDelete(link) {
        event.preventDefault(); // Prevent the default behavior of the link

        const deleteUrl = link.getAttribute('href'); // Get the URL to delete

        // Show Sweet Alert confirmation
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this customer!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms deletion, redirect to the delete URL
                window.location.href = deleteUrl;
            } else {
                // If user cancels deletion, do nothing
                Swal.fire("Cancelled", "Your customer is safe!", "info");
            }
        });
    }
</script>
    <!-- content-wrapper ends -->




    <?= $this->endSection() ?>
