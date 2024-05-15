<html>
<head>
    <title>Order System</title>
</head>
<body>
    <?php 
        session_start();
        $welcomeMessage = "Welcome to the canteen, ".$_SESSION['username']."! <br><br> Here are the prices:";
    ?>
    <h1><?php echo $welcomeMessage; ?></h1>
    <ul>
        <li>Fishball - 30 PHP</li>
        <li>Kikiam - 40 PHP</li>
        <li>Corndog - 50 PHP</li>
    </ul>
    <form action="orderForm.php" method="post">
        <label for="order">Choose your order:</label>
        <select name="order">
            <option value="Fishball">Fishball</option>
            <option value="Kikiam">Kikiam</option>
            <option value="Corndog">Corndog</option>
        </select><br><br>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity"><br><br>
        <label for="cash">Cash:</label>
        <input type="text" name="cash"><br><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
    $fishball = 30;
    $kikiam = 40;
    $corndog = 50;
    if (empty($_POST["quantity"]) || empty($_POST["cash"])) {
    } else {
        if (is_numeric($_POST["quantity"]) && is_numeric($_POST["cash"])) {
            if ($_POST["order"] == "Fishball") {
                $_POST["order"] = $fishball;
            } elseif ($_POST["order"] == "Kikiam") {
                $_POST["order"] = $kikiam;
            } elseif ($_POST["order"] == "Corndog") {
                $_POST["order"] = $corndog;
            }
            $order = $_POST["order"];
            $quantity = ($_POST["quantity"]);
            $cash = ($_POST["cash"]);
            $total_cost = $order * $quantity;
            $change = $cash - $total_cost;
            if ($quantity <= 0) {
                echo"<br>Invalid";
            } elseif ($total_cost <= $cash) {
                echo"<strong><br><br>The total cost is {$total_cost} <br>";
                echo"Your change is {$change}<br><br></strong>";
                echo"<strong>Thanks for the order, ".$_SESSION['username']."!";
            } else {
                echo "<strong><br><br>Insufficient amount!</strong>  ";
            }
        } else {
            echo "<br>Invalid Input";
        }
    }
?>
