<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        input[type=text],
        [type=date],
        [type=file],
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
            background-color: black;
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
</head>

<body>

    <div>
        <h1>PHP Upload File</h1>
        <form method="post" action="upload.php" enctype="multipart/form-data">
            <label for="picture">Picture</label>
            <img src="" id="picture" name="picture" width="120px" height="180px">
            <input type="file" id="myfile" name="myfile" onchange="showimg()">

            <input type="submit" name="btnsubmit" value="Upload">
        </form>
    </div>
</body>

</html>