<?php
include_once __DIR__ . "/../header.php"
?>

    <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create News</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Create News</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
            <div class="card card-info">
                    <!-- form start -->
                    <form  class="form-horizontal" action="http://localhost/php/Shop(stream13)/backend/index.php?model=news&action=save" method="post"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?= $oneNews['id'] ?? '' ?>"/>
                        <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?= $oneNews['title'] ?? '' ?>" name="title" class="form-control"/>
                    </div>
                  </div>
<!--                        <div class="form-group row">-->
<!--                            <label class="col-sm-2 col-form-label">Picture</label>-->
<!--                            <div class="col-sm-10">-->
<!--                                <input type="file" name="picture" class="form-control"/>-->
<!--                            </div>-->
<!--                            --><?php
//                            if (!empty($oneProduct['picture'])) {
//                                ?>
<!--                                <img src="/php/Shop(stream13)/uploads/products/--><?php //echo $oneProduct['picture']; ?><!--" style="width: 70px">-->
<!--                                --><?php
//                            }
//                            ?>
<!--                        </div>-->
<!--                        <div class="form-group row">-->
<!--                            <label class="col-sm-2 col-form-label">Preview</label>-->
<!--                            <div  class="col-sm-10">-->
<!--                                <input type="text" value="--><?//= $oneProduct['preview'] ?? '' ?><!--" name="preview" class="form-control"/>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group row">-->
<!--                            <label class="col-sm-2 col-form-label">Price</label>-->
<!--                            <div class="col-sm-10">-->
<!--                                <input name="price" value="--><?//= $oneProduct['price'] ?? '' ?><!--" type="number" class="form-control"/>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group row">-->
<!--                            <label class="col-sm-2 col-form-label">Status</label>-->
<!--                            <div class="col-sm-10">-->
<!--                                <input name="status" value="--><?//= $oneProduct['status'] ?? '' ?><!--" type="number" class="form-control"/>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea rows="7" name="content" class="form-control"> <?= $oneNews['content'] ?? '' ?> </textarea>
                            </div>
                        </div>
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