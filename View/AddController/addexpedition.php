<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FoodProductBase</title>
    <link rel="stylesheet" href="View/AddController/AddExpedition/style.css" type="text/css"/>
</head>
<body>

<div id="container">
    <div class="rectangle">
    </div>
    <div style="clear: both"></div>

    <div class="rectangle">
        <div id="addexpedition">
            <form action="?page=addexpedition" method="POST">
                Name of product:<br>
                <input name="date" placeholder="Name of product" type="text" required/><br>
                Calories:<br>
                <input name="pleace" placeholder="Number of calories per 100g" type="text" required/><br>
                Protein:</br>
                <input name="comment" placeholder="Number of protein per 100g" type="text"/><br>

                <input type="submit" value="Add Product"/>
            </form>
            <a href="?page=usermenu" class="tilelink">
                <div class="back">
                    back
                </div>
            </a>
        </div>
    </div>

</div>


</body>

</html>