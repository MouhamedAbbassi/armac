<?php include "nav-bar.php" ?>
<?php
include('../controller_back/service_C.php');
$service_C = new service_C();
$response = $service_C->afficherService($service_C->conn);

?>
    <div class="row tm-content-row tm-mt-big">
    <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
    <div class="bg-white tm-block h-100">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h2 class="tm-block-title d-inline-block">Service</h2>
            </div>
            <div class="col-md-4 col-sm-12 text-right">
                <a href="addService.php" class="btn btn-small btn-primary">Add New Service</a>
            </div>
        </div>

        <div class="table-responsive">
            <?php
            while ($service = $response->fetch()) {
                ?>
                <table class="table table-hover table-striped tm-table-striped-even mt-3">
                    <thead>
                    <tr class="tm-bg-gray">

                        <th> id</th>
                        <th> Type</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> <?php echo $service['id']; ?></td>
                        <td> <?php echo $service['type']; ?></td>
                        <td><?php echo $service['nom']; ?></td>
                        <td><?php echo $service['prix']; ?></td>
                        <td><?php echo $service['description']; ?></td>
                        <td> <form action="../core/deleteService.php" method="POST" enctype="multipart/form-data">
                                <button type="submit" name="id" value="<?php echo $service['id']; ?>"
                                        class="btn btn-danger">Delete
                                </button>
                            </form></td><td> <form action="updateService.php" method="POST" enctype="multipart/form-data">
                                <button type="submit" name="id" value="<?php echo $service['id']; ?>"
                                        class="btn btn-danger">Update
                                </button>
                            </form></td>
                    </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>

        <div class="tm-table-mt tm-table-actions-row">
            <div class="tm-table-actions-col-left">


            </div>
        </div>
    </div>

<?php include "Footer.php" ?>