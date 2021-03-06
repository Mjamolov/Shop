<?php
include_once __DIR__ . "/../header.php";
?>
<div id="banner-container" class="width1024">
    <div id="slider">
        <div class="slides">
            <div class="slide"><a href="#"><img src="/php/Shop(stream13)/frontend/imgs/banner01.jpg" alt=""></a></div>
            <div class="slide"><a href="#"><img src="/php/Shop(stream13)/frontend/imgs/banner02.jpg" alt=""></a></div>
            <div class="slide"><a href="#"><img src="/php/Shop(stream13)/frontend/imgs/banner03.jpg" alt=""></a></div>
        </div>
        <a href="#" class="banner-btn btn-left"><span></span><img src="/php/Shop(stream13)/frontend/imgs/banner_arrow_left.png"></a>
        <a href="#" class="banner-btn btn-right"><span></span><img src="/php/Shop(stream13)/frontend/imgs/banner_arrow_right.png"></a>
    </div>
    <div id="rand-product-banner">
        <h3>Deal of the Month</h3>
        <div class="slugan">The Human Face of Big Data</div>
        <div class="pic"><a href="#"> <img src="/php/Shop(stream13)/frontend/imgs/book01.jpg"></a></div>
        <div class="price">
            <span> Save 45% Today</span>
            <b>$123.0</b>
        </div>
        <div class="btn-buy">
            <a href="#">Buy now</a>
        </div>
    </div>
</div>
<div id="content" class="width1024">
    <?php
    include_once __DIR__ . "/../sidebar.php"
    ?>
    <div class="body">
        <div class="bookmarks desktop-element">
            <ul>
                <li class="active"><a href="#">Best sellers</a></li>
                <li><a href="#">New Arrivals</a></li>
                <li><a href="#">Used Books</a></li>
                <li><a href="#">Special Offers</a></li>
            </ul>
        </div>
        <div class="bookmarks-mobile mobile-element">
            <select  onchange="document.location=this.value">
                <option value="#Best sellers">Best sellers</option>
                <option value="">New Arrivals</option>
                <option value="">Used Books</option>
                <option value="">Special Offers</option>
            </select>
        </div>
        <div id="product-list">
            <ul>
                <?php for ($i=0; $i < sizeof($all); $i++) :
                    if ($i % 5 === 0) print "</ul><ul>"?>
                    <li>
                        <img src="/php/Shop(stream13)/frontend/imgs/sale30.png">
                        <a href="/php/Shop(stream13)/frontend/index.php?model=product&action=view&id=<?=$all[$i]['id']?>"><img src="/php/Shop(stream13)/uploads/products/<?=$all[$i]['picture']?>"></a>
                        <h4><a href="/php/Shop(stream13)/frontend/index.php?model=product&action=view&id=<?=$all[$i]['id']?>"><?=$all[$i]['title']?> </a></h4>
                        <div class="price">$<?=$all[$i]['price']?></div>
                    </li>
                <?php endfor; ?>
            </ul>
            <div class="pager">
                <div class="link-to-begin"><a href="#"><<<</a></div>
                <div class="link-to-left"><a href="#"><</a></div>
                <div class="link-to-pager" class=""><a href="#">1</a></div>
                <div class="link-to-pager"><a href="#">2</a></div>
                <div class="link-to-pager current"><a href="#">3</a></div>
                <div class="link-to-pager"><a href="#">4</a></div>
                <div class="link-to-pager"><a href="#">5</a></div>
                <div class="link-to-right"><a href="#">></a></div>
                <div class="link-to-end"><a href="#">>>></a></div>
            </div>
        </div>
    </div>
</div>

<?php
include_once __DIR__ . "/../footer.php";
?>

