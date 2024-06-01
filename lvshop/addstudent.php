<!DOCTYPE html>
<html>

<style>
    input[type=text],
    [type=date],
    [type=file],
    [type="number"],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        width: 300px;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        margin: auto;
    }

    #picture {
        width: 12rem;
    }
</style>

<script type="text/javascript">
    function showimg() {
        //Display Image 
        var input = document.getElementById("myfile");
        var fReader = new FileReader();
        fReader.readAsDataURL(input.files[0]);
        fReader.onloadend = function(event) {
            var img = document.getElementById("picture");
            img.src = event.target.result;
        }
    }
</script>

<body>

    <div>
        <h2>AddNew Student</h2>

        <form method="post" enctype="multipart/form-data">
            <label for="productname">Product Name</label>
            <input type="text" id="name" name="productname">
            <label for="detail">Detail</label>
            <input type="text" id="dob" name="detail">
            <label for="price">Price</label>
            <input type="number" id="dob" name="price">
            <label for="qty">Quantity</label>
            <input type="number" id="dob" name="qty">
            <label for="picture">Picture</label>
            <img src="" id="picture" name="picture" width="80px" height="80px">
            <input type="file" id="myfile" name="myfile" onchange="showimg()">
            <input type="submit" name="btnsubmit" value="Save">
        </form>

    </div>

    <?php
    if (isset($_POST['btnsubmit'])) {
        require("db.php");
        $name = $_POST["productname"];
        $detail = $_POST["detail"];
        $price = $_POST["price"];
        $qty = $_POST["qty"];
        $sql = "INSERT INTO tblproduct(productname,detail,price,quantity) VALUES(?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $name, $detail, $price, $qty);
        if ($stmt->execute() == true) {
            $last_id = $conn->insert_id;
            $extension = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
            $picture = $last_id . "." . $extension;
            move_uploaded_file($_FILES['myfile']['tmp_name'], "Images/$picture");
            $conn->query("update tblproduct set picture='$picture' where productsid=$last_id");
            header("Location:student.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

</body>

</html>