<?php
include_once __DIR__ . "/../header.php";
?>

    <style>
        #login-container {
            width: 300px;
            margin: 0 auto;
        }
    </style>

    <div id="login-container" class="width1024">
        <div><br><br><br><br></div>
        <h2>Login</h2>
        <form method="post" action="/php/Shop(stream13)/backend/?model=auth&action=check">
            <div>
                <label>Login:</label>
                <input type="text" name="login"/>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="password"/>
            </div>
            <div>
                <input type="submit" value="Login"/>
            </div>
        </form>
        <div><br><br><br><br></div>
    </div>
<?php
include_once __DIR__ . "/../footer.php";
?>