<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>Add Customer</title>
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
</style>
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
                                <h4 class="card-title"><i class="mdi mdi-account-multiple bg-primary h4 pt-1 px-2 text-white rounded"></i>
                                    View Customer</h4>
                                <hr>

                                <!-- table code start -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php if ($customers && count($customers) > 1): ?>
                                        <?php foreach ($customers as $customer): ?>
                                        <tr>
                                            <td>
                                                <?= $i++ ?>
                                            </td>
                                            <td>
                                                <?= $customer['fname']." ". $customer['lname'] ?>
                                            </td>
                                            <td>
                                                <?= $customer['mobile'] ?>
                                            </td>
                                            <td>
                                                <?= $customer['email'] ?>
                                            </td>
                                            <td>
                                            <a href="<?php echo base_url('customer/'.$customer['lead_id']);?>" data-toggle="tooltip" data-placement="top" title="view customer"><i class="mdi mdi-account-search bg-primary h4 pt-2 px-2 text-white rounded-circle"></i></a>

                                            <a href="<?php echo base_url('customer/'.$customer['lead_id']);?>" data-toggle="tooltip" data-placement="top" title="edit customer"><i class="mdi mdi-account-edit bg-primary h4 pt-2 px-2 text-white rounded-circle"></i></a>

                                            <a href="<?php echo base_url('delete/'.$customer['lead_id']);?>" onclick="confirmDelete(this)" data-toggle="tooltip" data-placement="top" title="Delete customer"><i class="mdi mdi-account-remove bg-danger h4 pt-2 px-2 text-white rounded-circle"></i></a>

                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="6">No customers found.</td>
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
                <?php echo $pager->links('default','full_pagination');?>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
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
    <?= $this->endSection() ?>