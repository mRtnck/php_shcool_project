<?php

require_once 'db.php';
$sql = "SELECT * FROM tblproduct";
$sh_prosuct = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    include("header.php");
    ?>
    <main>
        <?php
        while ($row = mysqli_fetch_assoc($sh_prosuct)) {
        ?>
            <div class="card">
                <div class="image">
                    <img src="Images/<?php echo $row["picture"]; ?>" alt="">
                </div>
                <div class="caption">
                    <p class="rate">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </p>
                    <p class="product_name"><?php echo $row["productname"]; ?></p>
                    <p class="discount"><?php echo $row["detail"]; ?></p>
                    <p class="price"><b>$</b><?php echo $row["price"]; ?></p>
                </div>
                <button class="add">Add to cart</button>
            </div>
        <?php
        }
        ?>
    </main>

    </div><br><br><br><br><br><br><br><br>
    <p>
        <a href="add.php">Upload</a> &nbsp;|&nbsp;
        <a href="student.php">Student</a>
    <p>
        <?php
        include("footer.php");
        ?>
</body>

</html>