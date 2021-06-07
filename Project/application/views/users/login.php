<?php
session_start();
?>

<style>
    .login-page {
        padding: 70px 0;
        min-height: 50%;
    }

    .form-container {
        background: #fff;
        width: 300px;
        height: 400px;
        text-align: center;
        box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    .form-container form {
        width: 100%;
        max-width: 300px;
        position: absolute;
        padding-right: 20px;
        padding-left: 20px;
        margin-top: 25px;
    }

    .form-button {
        margin-top: 10px;
        width: 100%;
        display: inline-block;
        padding: 20px 0;
    }

    .form-button span {
        font-weight: 400;
        padding: 6px 25px;
        color: #555;
    }

    #loginButton {
        margin-left: auto;
        margin-right: auto;
        background: #ff523b;
        border-radius: 5px;
        color: white;
    }

    #registerButton:hover {
        color: #ff523b;
    }

    .form-row {
        margin-bottom: 15px;
    }

    .form-row input {
        width: 100%;
        padding: 10px 20px;
        outline: none;
        border: 1px solid #607d8b;
        font-size: 14px;
        letter-spacing: 1px;
        color: #607d8b;
        background: transparent;
        border-radius: 5px;
    }

    .form-row input[type="submit"] {
        background: #ff523b;
        color: #fff;
        outline: none;
        border: none;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        text-transform: uppercase;
    }

    .form-row input[type="submit"]:hover {
        background: #563434;
    }

    .form-row a {
        margin-top: 20px;
    }

    .form-row a:hover {
        color: #ff523b;
    }

    .remember-row {
        margin-bottom: 10px;
        color: #607d8b;
        font-weight: 400;
        font-size: 14px;
    }
</style>

<div class="login-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo BASE_PATH . '/public/images/product-0.png' ?>">
            </div>
            <div class="col-2">
                <div class="form-container">
                    <div class="form-button">
                        <span id="loginButton">Login</span>
                        <span><a href="../users/register" id="registerButton">Register</a></span>
                    </div>
                    <form action="../users/login" method="POST">
                        <div class="form-row">
                            <h3>Welcome back,</h3>
                        </div>
                        <div class="form-row">
                            <input required type="text" name="username" placeholder="Username">
                        </div>
                        <div class="form-row">
                            <input required type="password" name="password" placeholder="Password">
                        </div>
                        <div class="remember-row">
                            <div class="checkbox-row">
                                <input type="checkbox" name="rememberMe">
                                <label for="rememberMe">Remember me</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <input type="submit" name="submit" value="Login">
                        </div>
                        <div class="form-row">
                            <a href="<?php echo BASE_PATH ?>">Back to Home Page</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>