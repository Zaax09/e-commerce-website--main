<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "andrea");
if (isset($_POST["Add_To_Cart"]))

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><Canvas>Catalogue</Canvas></title>
</head>

<body>
    <div class="container">
        <h2>Catalogue</h2>
        <?php
    $query =  "SELECT * FROM products ORDER BY productID  ASC";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)) {
        ?>

            <form method="POST" action="cart.php?action=add&productID=<?php echo $row["productID"];  ?>">
                <div>

                    <img src="<?php echo $row["image"]; ?>" alt="image">
                    <h4><?php echo $row["productName"]; ?></h4>
                    <h4><?php echo $row["description"]; ?></h4>
                    <h4>$<?php echo $row["unitPrice"]; ?></h4>
                    <h4><?php echo $row["quantityInStock"]; ?></h4>
                    <input type="number" name="quantity" min=1 value="1">
                    <!--input for Add to cart cart infos-->
                    <input type="hidden" name="hidden_img" value="<?php echo $row["image"];  ?>">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["productName"]; ?>">
                    <input type="hidden" name="hidden_description" value="<?php echo $row["description"]; ?>">
                    <input type="hidden" name="hidden_price" value="$<?php echo $row["unitPrice"]; ?>">
                    <input type="hidden" name="hidden_total" value="<?php echo $TotalPrice = $row["unitPrice"] * $_POST["quantity"]; ?>">
                    <input type="submit" name="Add_To_Cart" value="Add To Cart">

                </div>
            </form>

        <?php
    }
        ?>
        <br><br>
        <h3>Order Details</h3>

        <table border>
            <thead>
                <tr>
                    <th colspan=2>Products</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>


        </table>
        <input type="submit" value="Update">

    </div>
</body>

</html>