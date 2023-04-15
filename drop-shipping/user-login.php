<?php
include './header.php'

?>

<div class="user-login">
    <div class="user-login-container">
        <form id="user-login-container-form" action="./actions/login_client.php" method="POST">
            <div class="user-login-conatiner-form-title">
                <h1>User Login</h1>
            </div>
            <label for="Username">Username :</label>
            <input required name="username" type="Username" placeholder="Username">
            <label for="Password">Password :</label>
            <input required name="password" type="Password" placeholder="Password">
            <label for="email">Email :</label>
            <input required name="email" type="email" placeholder="Email">
            <div class="user-login-conatiner-form-button">
                <button type="submit" class="login-button">Login</button>
            </div>
            <p>Not a member yet ? <a href="user-register.php">Click Here</a></p>
        </form>
    </div>
</div>