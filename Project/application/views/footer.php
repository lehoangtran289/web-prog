<style>
    
    .footer {
        background: #1e1e1eec;
        color: #8a8a8a;
        font-size: 14px;
        padding: 60px 0 20px;
        margin-top: 3rem;
    }
    
    .footer p {
        color: #8a8a8a;
    }
    
    .footer h3 {
        color: #fff;
        margin-bottom: 20px;
    }
    
    .footer-col-1,
    .footer-col-2,
    .footer-col-3 {
        flex-basis: 30%;
        min-width: 300px;
        margin-bottom: 20px;
    }
    
    .footer-col-2,
    .footer-col-3 {
        text-align: center;
    }
    
    .footer-col-2 img {
        width: 100px;
        margin-bottom: 20px;
    }
    
    .app-logo {
        margin-top: 20px;
    }
    
    .app-logo img {
        width: 140px;
    }
    
    .footer hr {
        border: none;
        background: #b5b5b5;
        height: 1px;
        margin: 20px 0;
    }
    
    ul {
        list-style-type: none;
    }

</style>

<script type="text/javascript">
    let isBonk = 1;
    let bonk = () => {
        const img = document.getElementById("cheems");
        if (isBonk === 1) {
            const audio = new Audio("<?php echo BASE_PATH . '/public/images/bonk (1).mp3' ?>");
            audio.play();
            img.src = "<?php echo BASE_PATH . '/public/images/bonk.jpg' ?>";
            isBonk = 0;
        } else {
            img.src = "<?php echo BASE_PATH . '/public/images/logo_cheems.png' ?>";
            isBonk = 1;
        }
    }
</script>

<div class="footer">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="footer-col-1">
                <h3>Download Our App</h3>
                <p>Download App for Android and Ios</p>
                <div class="app-logo">
                    <a href="https://youtu.be/dQw4w9WgXcQ?autoplay=1"><img src="<?php echo BASE_PATH . '/public/images/app-store.png' ?>"></a>
                    <a href="https://youtu.be/dQw4w9WgXcQ?autoplay=1"><img src="<?php echo BASE_PATH . '/public/images/play-store.png' ?>"></a>
                </div>
            </div>
            <div class="footer-col-2">
                <img id="cheems" onclick="bonk()" src="<?php echo BASE_PATH . '/public/images/logo_cheems.png' ?>">
                <p>J Henlo Cheems Always Welcomes You To The Shop</p>
            </div>
            <div class="footer-col-3">
                <h3>Follow us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Instagram</li>
                    <li>Github</li>
                </ul>
            </div>
        </div>
        <hr>
        <p style="text-align: center;">@Copyright 2021 - J Henlo Cheems</p>
    </div>
</div>

</body>
</html>
