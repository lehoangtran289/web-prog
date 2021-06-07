<style>
    .update-page {
        padding: 70px 0;
        min-height: 50%;
    }

    .form-container {
        background: #fff;
        width: 350px;
        height: 500px;
        text-align: center;
        box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    .form-container form {
        width: 100%;
        max-width: 350px;
        position: absolute;
        padding-right: 20px;
        padding-left: 20px;
        margin-top: 15px;
    }

    .form-button {
        width: 100%;
        display: inline-block;
        padding-top: 20px;
    }

    .form-button h3 {
        font-weight: 700;
        padding: 6px 25px;
        color: #1e1e1eec;
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
        font-weight: 600;
        letter-spacing: 1px;
        color: #ff523b;
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

    .input-box a:hover {
        color: #ff523b;
    }
</style>

<div class="update-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo BASE_PATH . '/public/images/product-0.png' ?>">
            </div>
            <div class="col-2">
                <div class="form-container">
                    <div class="form-button">
                        <h3>Your information</h3>
                    </div>
                    <form action="../users/update" method="post">
                        <div class="input-box">
                            <input required type="text" id="username" name="username" value="<?php echo $currentUser['username'] ?>" placeholder="Username">
                        </div>
                        <div class="input-box">
                            <input required type="password" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="input-box">
                            <input required type="text" id="name" name="name" value="<?php echo $currentUser['name'] ?>" placeholder="Name">
                        </div>
                        <div class="input-box">
                            <input required type="email" id="email" name="email" value="<?php echo $currentUser['email'] ?>" placeholder="Email">
                        </div>
                        <div class="input-box">
                            <input required type="text" id="address" name="address" value="<?php echo $currentUser['address'] ?>" placeholder="Address">
                        </div>
                        <div class="input-box">
                            <input required type="tel" id="phone" name="phone" value="<?php echo $currentUser['phone'] ?>" placeholder="Phone">
                        </div>
                        <div class="input-box">
                            <input type="submit" name="submit" value="Save changes">
                        </div>
                        <div class="input-box">
                            <a href="<?php echo BASE_PATH . "/orders/viewall" ?>">Order History</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>