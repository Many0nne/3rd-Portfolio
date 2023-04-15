<?php
session_start();

include './header.php'

?>

<div class="user-login">
    <div class="user-login-container">
        <form id="user-login-container-form" method="POST" action="./actions/add_client.php">
            <div class="user-login-conatiner-form-title">   
                <h1>User Register</h1>
            </div>
            <label for="Username">Username :</label>
            <input required name="username" type="Username" placeholder="Username">
            <label for="Password">Password :</label>
            <input required name="password" type="Password" placeholder="Password">
            <label for="Email">Email :</label>
            <input required name="email" type="Email" placeholder="Email">
            <div class="user-login-conatiner-form-button">
                <button type="submit" class="login-button">Register</button>
            </div>
            <p>Already a member ? <a href="user-login.php">Click Here</a></p>
        </form>
    </div>
</div>