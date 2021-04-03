<?php include_once __DIR__ . "/../header.php"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Delivery</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Delivery</li>
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
                        <th>Content</th>
                        <th>Created</th>
                        </thead>
                        <tbody>
                        <?php foreach ($all as $delivery) : ?>
                            <tr>
                                <td><?= $delivery["id"] ?></td>
                                <td><?= $delivery["title"] ?></td>
                                <td><?= $delivery["code"] ?></td>
                                <td><?= $delivery["priority"] ?></td>
                                <td style="width: 180px" class="project-actions text-right">
                                    <a class="btn btn-info btn-sm"
                                       href="/?model=delivery&action=update&id=<?= $delivery["id"] ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                       href="/?model=delivery&action=delete&id=<?= $delivery["id"] ?>">
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
<?php include_once __DIR__ . "/../footer.php"; ?>