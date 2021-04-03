<?php include_once __DIR__ . "/../header.php";?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Shops</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shops</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Address</th>
                    <th>City</th>
                    </thead>
                    <tbody>
                    <?php foreach ($all as $shop) : ?>
                        <tr>
                            <td><?= $shop["id"] ?></td>
                            <td><?= $shop["title"] ?></td>
                            <td><?= $shop["address"] ?></td>
                            <td><?= $shop["city"] ?></td>
                            <td style="width: 180px" class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="http://shop.local/backend/index.php/?model=shop&action=update&id=<?= $shop["id"] ?>" >
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="http://shop.local/backend/index.php/?model=shop&action=delete&id=<?= $shop["id"] ?>" >
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once __DIR__ . "/../footer.php";?>

