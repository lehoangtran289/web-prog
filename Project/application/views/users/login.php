<?php
session_start();
?>

<style>
    section {
        position: relative;
        width: 100%;
        height: 80vh;
        display: flex;
    }

    .image-box {
        position: relative;
        display: flex;
        width: 50%;
        height: 100%;
        align-items: center;
        justify-content: flex-end;
    }

    .image-box img {
        width: 70%;
        height: 70%;
        position: absolute;
        object-fit: cover;
        border-radius: 25px;
    }

    .content-box {
        display: flex;
        width: 50%;
        height: 100%;
        justify-content: flex-start;
        align-items: center;
    }

    .form-box {
        width: 50%;
        margin-left: 50px;
    }

    .form-box h2 {
        color: #555;
        font-weight: 600;
        font-size: 1.5em;
        text-transform: uppercase;
        margin-bottom: 20px;
        border-bottom: 4px solid #ff523b;
        display: inline-block;
        letter-spacing: 1px;
    }

    .input-box {
        margin-bottom: 20px;
    }

    .input-box span {
        font-size: 16px;
        margin-bottom: 5px;
        display: inline-block;
        color: #607d8b;
        font-weight: 300;
        font-size: 16px;
        letter-spacing: 1px;
    }

    .input-box input {
        width: 100%;
        padding: 10px 20px;
        outline: none;
        font-weight: 400;
        border: 1px solid #607d8b;
        font-size: 16px;
        letter-spacing: 1px;
        color: #607d8b;
        background: transparent;
        border-radius: 30px;
    }

    .input-box input[type="submit"] {
        background: #ff523b;
        color: #fff;
        outline: none;
        border: none;
        font-weight: 500;
        cursor: pointer;
    }

    .input-box input[type="submit"]:hover {
        background: #563434;
    }

    .input-box p {
        color: #607d8b;
    }

    .input-box a {
        color: #ff523b;
    }

    .remember {
        margin-bottom: 10px;
        color: #607d8b;
        font-weight: 400;
        font-size: 14px;
    }
</style>

<section>
    <div class="image-box">
        <img src="<?php echo BASE_PATH . '/public/images/Login.jpg' ?>">
    </div>

    <div class="content-box">
        <div class="form-box">
            <h2>Login</h2>
            <form action="../users/login" method="POST">
                <div class="input-box">
                    <span>Username</span>
                    <input required type="text" name="username">
                </div>
                <div class="input-box">
                    <span>Password</span>
                    <input required type="password" name="password">
                </div>
                <div class="remember">
                    <label><input type="checkbox" name="rememberMe"> Remember me</label>
                </div>
                <div class="input-box">
                    <input type="submit" name="submit" value="Login">
                </div>
                <div class="input-box">
                    <p>Don't have an account? <a href="../users/register">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</section>