<?php
include_once __DIR__ . "/../header.php";
?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Permission</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Permission</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card card-info">
                <form class="form-horizontal"
                      action="/php/Shop(stream13)/backend/?model=permission&action=save"
                      method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Permission name</label>
                            <div class="col-sm-10">
                                <input type="text" name="permission"
                                       class="form-control"/>
                            </div>
                        </div>
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