<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FoodProductBase</title>
    <link rel="stylesheet" href="View/DefaultController/Login/style.css" type="text/css"/>
</head>

<body>
    <div id="container">


        <div class="login">
            <div id="window">
                <form action="?page=login" method="POST">
                    <input name="email" placeholder="email" type="text" required/><br>
                    <?php
                    if(isset($_SESSION['e_email'])){
                        echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                        unset($_SESSION['e_email']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input name="password" placeholder="password" type="password" required/><br>
                    <?php
                    if(isset($_SESSION['e_password'])){
                        echo '<div class="error">'.$_SESSION['e_password'].'</div>';
                        unset($_SESSION['e_password']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input type="submit" value="Log in"/>
                </form>
            </div>
        </div>


    </div>

</body>
</html>