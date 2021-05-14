<?php
$userName = '';
$linkTo = '';
$password = '';
$result = null;
$connect = null;

    if(isset($_POST["UserName"])){
        $userName = $_POST["UserName"];
        $linkTo = $_REQUEST["LinkTo"];
        $password = $_POST["Password"];

        $host = 'us-cdbr-east-03.cleardb.com';
        $user = 'b387322b6006bc';
        $passwd = '0739b344';
        $database = 'heroku_eedca10c2fc1c8a';
        $table_name = 'user';
        $query = "SELECT * FROM $table_name WHERE UserName='$userName' AND Password='$password'";
        $connect = mysqli_connect($host, $user, $passwd);

        if($connect){
            mysqli_select_db($connect ,$database);
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_row($result);
            if($result && $row){
                if($linkTo != "")
                    header("Location: ".$linkTo);
                else{
                    //assume that google.com is homepage
                    header("Location: https://www.google.com/");
                    exit();
                }
            }
        }
    }
    ?>

<html>
<head>
    <title>Member, please login</title>
    <link rel="stylesheet" href="style.css">
    <script language="javascript">
        function fCommit(){
            if(document.frmLogin.UserName.value === "")
            {
                alert("UserName must be enter!");
                document.frmLogin.UserName.focus();
                return false;
            }
            return true;
        }

        function fReset(){
            document.frmLogin.UserName.value = "";
            document.frmLogin.Password.value = "";
            document.frmLogin.UserName.focus();
        }
    </script>
</head>
<body topmargin="0" leftmargin="0">
<form method="POST" action="" name="frmLogin" onsubmit="return fCommit();">
    <table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle"><td align="center">
       <table>
           <tr>
               <td><p>LOGIN TO THE SYSTEM</p></td>
           </tr>
       </table>
    <table width="280" border="0" cellpadding="1" cellpadding="2">
        <tr><td>
                <table width="100%" border="0" cellpadding="2" cellspacing="0">

                    <tr>
                        <td align="right" width="40%"> User name: &nbsp;</td>
                        <td width="60%">&nbsp;
                            <input style="width: 97%" type="text" name="UserName" value="<?php echo $userName?>">
                            <input type="hidden" name="LinkTo" value="<?php echo $linkTo?>"></td>
                    </tr>
                    <tr>
                        <td align="right" width="40%"> Password: &nbsp;</td>
                        <td width="60%">&nbsp;
                            <input style="width: 97%" type="password" name="Password" value="<?php echo $password?>">
                    </tr>
                    <tr height="30">
                        <td align="center" colspan="2">
                            <input style="width: 80%" type="submit" value="Login">
                            <input style="width: 80%" type="reset" value="Reset" onclick="return fReset();">
                            <input type="hidden" name="LinkTo" value="<?php echo $linkTo?>">
                        </td>
                    </tr>
                    <?php
                    if(isset($user) && !$row){
                        echo '<tr align="center">
                            <td colspan="2"> <p> Invalid name and/or password!</p></td>
                            </tr>
                            ';
                    }
                    if($result != null && $connect != null)
                    {
                        mysqli_free_result($result);
                        mysqli_close($connect);
                    }
                    ?>
                </table>
            </td></tr>
    </table>
    </table>
</form>
<script>
    document.frmLogin.UserName.focus();
</script>
</body>
</html>
