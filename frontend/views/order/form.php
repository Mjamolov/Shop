<?php
    include_once __DIR__ . "/../header.php"
?>

<div class="width1024">
    <h1>Create Order</h1>
    <form action="/php/Shop(stream13)/frontend/index.php?model=order&action=create" method="post">
        <div>
            <label for="">Name:</label><input type="text" name="name" required>
        </div>
        <div>
            <label for="">Phone:</label><input type="text" name="phone" required>
        </div>
        <div>
            <label for="">Email:</label><input type="email" name="email" required>
        </div>
        <div>
            <label for="">Delivery:</label>
            <select name="delivery">
                <option value="1">Delivery 1</option>
                <option value="2">Delivery 2</option>
                <option value="3">Delivery 3</option>
            </select>
        </div>
        <div>
            <label for="">Payment:</label>
            <select name="payment">
                <option value="1">Payment 1</option>
                <option value="2">Payment 2</option>
                <option value="3">Payment 3</option>
            </select>
        </div>
        <div>
            <label for="">Comment</label><br>
            <textarea name="comment"></textarea>
        </div>
        <div>
            <button>Create</button>
        </div>
    </form>
</div>
<?php
    include_once __DIR__ . "/../footer.php"
?>















