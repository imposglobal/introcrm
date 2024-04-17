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
                                <h4 class="card-title"><i
                                        class="mdi mdi-account-multiple-plus bg-primary h4 pt-1 px-2 text-white rounded"></i>
                                    View Customer</h4>
                                <hr>

                                <!-- table code start -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Lead ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php if ($customers && count($customers) > 0): ?>
                                        <?php foreach ($customers as $customer): ?>
                                        <tr>
                                            <td>
                                                <?= $i++ ?>
                                            </td>
                                            <td>
                                                <?= $customer['fname'] ?>
                                            </td>
                                            <td>
                                                <?= $customer['lname'] ?>
                                            </td>
                                            <td>
                                                <?= $customer['mobile'] ?>
                                            </td>
                                            <td>
                                                <?= $customer['email'] ?>
                                            </td>
                                            <td>
                                                <?= $customer['lead_id'] ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="6">No customers found.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>

                                <nav aria-label="...">
                                    <ul class="pagination">
                                        <!-- Previous Page Link -->
                                        <?php if ($hasPreviousPage) : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= $base ?>?page=<?= $currentPage - 1 ?>"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <?php else : ?>
                                        <li class="page-item disabled">
                                            <span class="page-link" aria-hidden="true">&laquo;</span>
                                        </li>
                                        <?php endif; ?>

                                        <!-- Next Page Link -->
                                        <?php if ($hasNextPage) : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= $base ?>?page=<?= $currentPage + 1 ?>"
                                                aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                        <?php else : ?>
                                        <li class="page-item disabled">
                                            <span class="page-link" aria-hidden="true">&raquo;</span>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>

                                <!-- table code end -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- content-wrapper ends -->

    <?= $this->endSection() ?>