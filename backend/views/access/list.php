<?php
include_once __DIR__ . "/../header.php";
?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage access</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Manage access</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card card-info">
                <form class="form-horizontal"
                      action="/php/Shop(stream13)/backend/?model=access&action=save"
                      method="post"
                      enctype="multipart/form-data">
                    <div class="card-body" style="overflow: auto">
                        <table id="access-table" style="margin-bottom: 5px; font-size: 13px">
                            <thead>
                            <th style="border: 1px solid gray">Roles</th>
                            <?php foreach ($roles as $role): ?>
                                <th style="border: 1px solid gray">
                                    <?= $role ?>
                                </th>
                            <?php endforeach; ?>
                            </thead>
                            <tbody>
                            <?php foreach ($permissions as $index => $name): ?>
                                <tr style="background-color: ">
                                    <td style="border: 1px solid gray"><?= $name ?></td>
                                    <?php foreach ($roles as $role): ?>
                                        <td style="border: 1px solid gray">
<!--                                            --><?//= isset($access[$role][$name]) ? 'background-color: #28a745' : ''?>
                                            <input type="checkbox"
                                                <?= (isset($access[$role][$name])) ? 'checked' : '' ?>
                                                   name="access[<?= $role ?>][<?= $name ?>]">
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <input value="Save" type="submit" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

<?php
include_once __DIR__ . "/../footer.php";
?>