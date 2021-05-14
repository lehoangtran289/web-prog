<html>
<head>
    <script>
        function GEEKFORGEEKS() {
            var name =
                document.forms["RegForm"]["Name"];
            var email =
                document.forms["RegForm"]["EMail"];
            var phone =
                document.forms["RegForm"]["Telephone"];
            var password =
                document.forms["RegForm"]["Password"];
            var confirmPassword = document.forms["RegForm"]["ConfirmPassword"];

            if (name.value == "") {
                window.alert("Please enter your name.");
                name.focus();
                return false;
            }

            if (email.value == "") {
                window.alert(
                    "Please enter a valid e-mail address.");
                email.focus();
                return false;
            }

            if (phone.value == "") {
                window.alert(
                    "Please enter your telephone number.");
                phone.focus();
                return false;
            }

            if (password.value == "") {
                window.alert("Please enter your password");
                password.focus();
                return false;
            }

            if (confirmPassword.value == "") {
                window.alert("Please confirm your password");
                confirmPassword.focus();
                return false;
            }

            if (confirmPassword.value != password.value) {
                window.alert("Your confirmed password is not correct");
                confirmPassword.focus();
                return false;
            }

            window.alert('Create account successfully!');
            return true;
        }
    </script>

    <style>
        div {
            box-sizing: border-box;
            width: 100%;
            border: 100px solid black;
            float: left;
            align-content: center;
            align-items: center;
        }

        form {
            margin: 0 auto;
            width: 600px;
        }
    </style>
</head>

<body>
<h1 style="text-align: center;">REGISTRATION FORM</h1>
<form name="RegForm" action="submit.php"
      onsubmit="return GEEKFORGEEKS()" method="post">
    <p>Name: <input type="text"
                    size="65" name="Name" /></p>
    <br />
    <p>E-mail Address: <input type="email"
                              size="65" name="EMail" /></p>
    <br />
    <p>Password: <input type="password"
                        size="65" name="Password" /></p>
    <br />
    <p>Confirm password: <input type="password"
                        size="65" name="ConfirmPassword" /></p>
    <br />
    <p>Telephone: <input type="tel"
                         size="65" name="Telephone" /></p>
    <br />


        <input type="submit"
               value="send" name="Submit" />
        <input type="reset"
               value="Reset" name="Reset" />
    </p>
</form>
</body>
</html>

