<!DOCTYPE html>
<head>
<title>Login Form Design</title>
<link rel="stylesheet" type="text/css" href="login.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>
    

<body>


    <div class="box">

    <img src="FG.png" class="user">

        <h1>Login Here</h1>

        <form name="myform"  action="connect.php" method="POST" >

            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username " required="">

            <p>Password</p>
            <input type="password" name="pass1" placeholder="Enter Password" required="">


            <input type="submit" name="" value="Login">

            <br><br>
            <a href="Signup.php">Register for new account ?</a>

        </form>
        
    </div>
    <script>
$(document).ready(function() {
  $('.box').fadeIn(1500); // Adjust the duration as needed (in milliseconds)
});
</script>

    

</body>
</html>