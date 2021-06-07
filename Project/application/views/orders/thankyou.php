<style>
    .thank-you-page {
        min-height: 70%;
        padding: 230px 0;
    }

    .thank-you-page h2 {
        font-size: 62px;
        font-weight: 700;
        color: #1e1e1eec;
        margin-bottom: 20px;
    }
</style>

<div class="small-container thank-you-page">
    <div class="row">
        <h2>Thank you for your purchase</h2>
    </div>
    <div class="row">
        <a href="<?php echo BASE_PATH ?>" class="button">Back to Home Page</a>
    </div>
</div>

<?php
unset($_SESSION['cart']);
?>