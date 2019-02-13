<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FoodProductBase</title>
    <link rel="stylesheet" href="View/SignupController/Signup/style.css" type="text/css"/>

</head>
<body>
    <div id="container">

        <div style="clear: both"></div>

        <div class="rectangle">
            <div id="signupwin">
                <form action="?page=signup" method="POST">
                    <input name="name" placeholder="name" type="text" required/><br>
                    <?php
                    if(isset($_SESSION['e_name'])){
                        echo '<div class="error">'.$_SESSION['e_name'].'</div>';
                        unset($_SESSION['e_name']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input name="surname" placeholder="surname" type="text" required/><br>
                    <?php
                    if(isset($_SESSION['e_surname'])){
                        echo '<div class="error">'.$_SESSION['e_surname'].'</div>';
                        unset($_SESSION['e_surname']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input name="email" placeholder="email" type="text" required/><br>
                    <?php
                    if(isset($_SESSION['e_email'])){
                        echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                        unset($_SESSION['e_email']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input name="password1" placeholder="password" type="password" required/><br>
                    <?php
                    if(isset($_SESSION['e_password'])){
                        echo '<div class="error">'.$_SESSION['e_password'].'</div>';
                        unset($_SESSION['e_password']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input name="password2" placeholder="repeat password" type="password" required/><br><br>
                    <label>
                        <input type="checkbox" name="reg"/>Accept the terms<br>
                    </label>
                    <?php
                    if(isset($_SESSION['e_reg'])){
                        echo '<div class="error">'.$_SESSION['e_reg'].'</div>';
                        unset($_SESSION['e_reg']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input type="submit" value="Sign up"/>
                </form>
            </div>
        </div>


    </div>



</body>

</html>