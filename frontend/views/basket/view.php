<?php
include_once __DIR__ . "/../header.php";
?>

<div class="width1024">
    <div id="basket-container" class="body">
        <h3>Корзина</h3>
        <?php if (empty($items) || !is_array($items)): ?>
            <div>
                <div></br></br></br></div>
                <p>Корзина пуста</p>
                <div></br></br></br></div>
            </div>
        <?php else: ?>
            <table class="w-100">
                <thead>
                <tr>
                    <th class="id">#</th>
                    <th class="picture">Picture</th>
                    <th>Title</th>
                    <th class="qty">Quantity</th>
                    <th class="price">Price</th>
                    <th class="sum">Sum</th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody class="basket-tbody">
                <?php foreach ($items as $key => $item) : ?>
                    <tr>
                        <td><?= ++$key ?></td>
                        <td class="picture">
                            <a href="/php/Shop(stream13)/frontend/index.php?model=product&action=view&id=<?= $item['product_id'] ?>">
                                <img src="http://localhost/php/Shop(stream13)/uploads/products/<?= $item['product']['picture'] ?>">
                            </a>
                        </td>
                        <td>
                            <a href="index.php?model=product&action=view&id=<?= $item['product_id'] ?>">
                                <?= $item['product']['title'] ?>
                            </a>
                        </td>
                        <td>
                            <form action="/php/Shop(stream13)/frontend/index.php?model=basket&action=change"
                                  method="post">
                                <input type="hidden" name="product_id" value="<?= $item['product']['id'] ?>">
                                <input type="text" name="quantity" value="<?= $item['quantity'] ?>">
                                <input type="submit" value="Change">
                            </form>
                        </td>
                        <td><?= $item['product']['price'] ?></td>
                        <td><?= $item['product']['sum'] ?></td>
                        <td>
                            <form action="/php/Shop(stream13)/frontend/index.php?model=basket&action=delete"
                                  method="post">
                                <input type="hidden" name="product_id" value="<?= $item['product']['id'] ?>">
                                <button>Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4">
                        <div class="d-flex align-items-center mt-4">
                            <a class="main-button" href="/php/Shop(stream13)/frontend/?model=order&action=index">Order</a>
                        </div>
                    </td>
                    <td colspan="4">
                        <div class="d-flex justify-content-end align-items-center">
                            Итого: <?= $total ?>$
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
    </section>

<?php
include_once __DIR__ . "/../footer.php";























