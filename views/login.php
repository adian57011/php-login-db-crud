<?php
include("layout.html")
?>

<head>
    <link rel="stylesheet" href="../contents/login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="../controllers/loginController.php" method="POST">
            
                <legend>Login</legend>
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Enter Email"><br>
                    <label for="password">Password</label>
                    <input type="password" name = "password" placeholder="Enter Password"><br>

                    <input type="submit" name="submit" value="Login">
                    <input type="reset" name = "reset" value ="Reset">
        </form>
                          
    </div>
</body>