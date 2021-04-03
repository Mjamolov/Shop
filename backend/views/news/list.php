<?php include_once __DIR__ . "/../header.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>News</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">News</li>
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
                    <?php foreach ($all as $product) : ?>
                        <tr>
                            <td><?= $product["id"] ?></td>
                            <td><?= $product["title"] ?></td>
                            <td><?= $product["content"] ?></td>
                            <td><?= $product["created"] ?></td>
                            <td style="width: 200px">

                                <!--a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a-->
                                <a class="btn btn-info btn-sm"
                                   href="http://localhost/php/Shop(stream13)/backend/index.php?model=news&action=update&id=<?= $product["id"] ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm"
                                   href="http://localhost/php/Shop(stream13)/backend/index.php?model=news&action=delete&id=<?= $product["id"] ?>">
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

