<!DOCTYPE html>
<html >

<head>
    <meta charset="UTF-8">
    <title>AdminPanel</title>
    <link rel="stylesheet" href="View/AdminController/AdminMenu/style.css" type="text/css"/>

</head>

<body>

<div id="container">
    <div class="rectangle">
        <a href="?page=index" class="tilelink">
        </a>
        <a href="?page=usermenu" class="tilelink">
            <div class="back">
                BACK
            </div>
        </a>
        <div style="clear: both"></div>
    </div>

    <div class="description">
        USERS
    </div>


    <div class="square">
        <table class="tabela2" cellspacing='0'>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Delete</th>
            </tr>

            <?php
            foreach ($_SESSION['users'] as $user){
                echo "                 
                     <tr>
                        <td>{$user['name']}</td>
                        <td>{$user['surname']}</td>
                        <td>{$user['email']}</td>
                        <td>{$user['role']}</td>
                        
                        <td>
                            <a href=\"?page=deleteuser&id_user={$user['id']}\" class=\"tilelink\">
                                <div class=\"delete\">usun </div> 
                            </a>
                        </td>
                        
                     </tr>           
                ";
            }
            unset($_SESSION['users']);
            ?>

        </table>

    </div>

    <div style="clear: both"></div>

</div>

</body>
</html>