<?php
include_once __DIR__ . "/../header.php"
?>

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"> Create Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <section class="content">
            <div class="card card-info">
                <!-- form start -->
                <form class="form-horizontal"
                      action="http://localhost/php/Shop(stream13)/backend/index.php?model=category&action=save"
                      method="post">
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?= $one['id'] ?? '' ?>"/>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $one['title'] ?? '' ?>" name="title"
                                       class="form-control"/>
                            </div>
                        </div>
                        <!--                        <div class="form-group row">-->
                        <!--                            <label class="col-sm-2 col-form-label">Picture</label>-->
                        <!--                            <div class="col-sm-10">-->
                        <!--                                <input type="file" name="picture" class="form-control"/>-->
                        <!--                            </div>-->
                        <!--                            --><?php
                        //                            if (!empty($one['picture'])) {
                        //                                ?>
                        <!--                                <img src="/php/Shop(stream13)/uploads/products/-->
                        <?php //echo $one['picture']; ?><!--" style="width: 70px">-->
                        <!--                                --><?php
                        //                            }
                        //                            ?>
                        <!--                        </div>-->
                        <!--                        <div class="form-group row">-->
                        <!--                            <label class="col-sm-2 col-form-label">Preview</label>-->
                        <!--                            <div  class="col-sm-10">-->
                        <!--                                <input type="text" value="-->
                        <? //= $one['preview'] ?? '' ?><!--" name="preview" class="form-control"/>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">groupId</label>
                            <div class="col-sm-10">
                                <input name="group_id" value="<?= $one['group_id'] ?? '' ?>" type="number"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">parentId</label>
                            <div class="col-sm-10">
                                <input name="parent_id" value="<?= $one['parent_id'] ?? '' ?>" type="number"
                                       class="form-control"/>
                            </div>
                            <!--                        </div>-->
                            <!--                        <div class="form-group row">-->
                            <!--                            <label class="col-sm-2 col-form-label">Content</label>-->
                            <!--                            <div class="col-sm-10">-->
                            <!--                                <textarea rows="7" name="content" class="form-control"> -->
                            <? //= $one['content'] ?? '' ?><!-- </textarea>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-success" value="Save">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </section>
    </div>
<?php
include_once __DIR__ . "/../footer.php"
?>