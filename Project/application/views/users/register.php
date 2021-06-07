<style>
    .login-page {
        padding: 70px 0;
        min-height: 50%;
    }

    .form-container {
        background: #fff;
        width: 300px;
        height: 570px;
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

    .form-button a:hover {
        color: #ff523b;
    }

    #registerButton {
        margin-left: auto;
        margin-right: auto;
        background: #ff523b;
        border-radius: 5px;
        color: white;
    }

    #loginButton:hover {
        color: #ff523b;
    }

    .input-box {
        margin-bottom: 15px;
    }

    .input-box input {
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

    .input-box input[type="submit"] {
        background: #ff523b;
        color: #fff;
        outline: none;
        border: none;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        text-transform: uppercase;
    }

    .input-box input[type="submit"]:hover {
        background: #563434;
    }

    .input-box a {
        margin-top: 20px;
    }

    .input-box a:hover {
        color: #ff523b;
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
                        <span id="loginButton"><a href="../users/login">Login</a></span>
                        <span id="registerButton">Register</span>
                    </div>
                    <form action="../users/register" method="POST">
                        <div class="input-box">
                            <h3>Welcome,</h3>
                        </div>
                        <div class="input-box">
                            <input required type="text" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="input-box">
                            <input required type="password" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="input-box">
                            <input required type="text" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="input-box">
                            <input required type="email" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="input-box">
                            <input required type="text" id="address" name="address" placeholder="Address">
                        </div>
                        <div class="input-box">
                            <input required type="tel" id="phone" name="phone" placeholder="Phone">
                        </div>
                        <div class="input-box">
                            <input type="submit" name="submit" value="Register">
                        </div>
                        <div class="input-box">
                            <a href="<?php echo BASE_PATH ?>">Back to Home Page</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>