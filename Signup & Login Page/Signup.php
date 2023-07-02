<!DOCTYPE html>
<head>
<title>Register Form Design</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="box">
    <img src="FG.png" class="user">

        <h1>Register Here</h1>
        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form name="myform2" action="login_data.php" method="POST">

            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" required="">

            <p>Email</p>
            <input type="Email" name="email" placeholder="Enter email id" required="">

            <p>Password</p>
            <input type="password" name="pass1" placeholder="Enter Password" required="">

            <p>Retype Password</p>
            <input type="password" name="pass2" placeholder="Re-Enter Password" required="">

            <input type="submit" name="" value="Register">

            <br><br>
            <a href="Login.php">existing user, login !?</a>
        </form>
        
    </div>
    <script>
$(document).ready(function() {
  $('.box').fadeIn(1500); // Adjust the duration as needed (in milliseconds)
});
</script>


</body>
</html>