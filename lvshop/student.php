<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        img {
            border-radius: 100%;
        }

        div {
            width: 100%;
            padding: 10px 50px;
            box-sizing: border-box;
        }

        table {
            margin-top: 5px;
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        input[type=text],
        select {
            width: 150px;
            padding: 8px 15px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 8px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            width: 8rem;
        }

        .button2 {
            background-color: #008CBA;
        }

        /* Blue */
        .button3 {
            background-color: #f44336;
        }

        /* Red */
        .button4 {
            background-color: #e7e7e7;
            color: black;
        }

        /* Gray */
        .button5 {
            background-color: #555555;
        }

        /* Black */
    </style>
</head>

<body>
    <div>
        <h2>Product List</h2>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Detail</th>
                <th>Quantity</th>
                <th>Price</th>
                <th colspan="2">Option</th>
            </tr>
            <?php
            require("db.php");
            $sql = "SELECT * FROM tblproduct Order by productsid ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["productsid"] . "</td>";
                echo "<td>" . $row["productname"] . "</td>";
                echo "<td>" . $row["detail"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "<td><img src='Images/" . $row["picture"] . "' width='80px' height='80px'></td>";
                echo "<td>  
                    <a href='updatestudent.php?productsid=" . $row["productsid"] . "' class='button button2'>Edit</a> |  
                    <a href='DeleteStudent.php?productsid=" . $row["productsid"] . "' class='button button3' onclick='return 
confirm(\"Sure?\");'>Delete</a> 
                </td>";
                echo "</tr>";
            }
            ?>
        </table>
        <p><a href="AddStudent.php" class="button">AddNew Product</a> </p>
        <p><a href="index.php" class="button">Home</a> </p>
    </div>
</body>

</html>