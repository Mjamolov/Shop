<?php
    include_once __DIR__ . "/../header.php";
?>


<div class="width1024">
    <div><br><br><br></div>
    <h1>Register</h1>
    <div><br><br></div>
    <form action="/php/Shop(stream13)/frontend/index.php?model=register&action=register" method="post">
        <div class="reg-name-field">
            <label>Name:</label><input type="text" name="name">
        </div>
        <div class="reg-phone-field">
            <label>Phone:</label><input type="text" name="phone">
        </div>
        <div class="reg-email-field">
            <label>Email:</label><input type="text" name="email">
        </div>
        <div class="reg-password-field">
            <label>Password:</label><input type="password" name="password">
        </div>
        <div class="reg-password-repeat-field">
            <label>Password(repeat):</label><input type="password" name="password_repeat">
        </div>
        <div>
            <input type="submit" value="Register">
        </div>
    </form>
    <div><br><br><br></div>
</div>

<?php
    include_once __DIR__ . "/../footer.php";
?>

