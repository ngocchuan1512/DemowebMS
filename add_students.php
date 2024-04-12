<!DOCTYPE html>
<html>
<head>
    <title>Thêm Sinh Viên</title>
    <style>
        /* Styles cho form */
        form {
            margin: 20px auto;
            width: 300px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        input[type=text], input[type=email] {
            width: 100%;
            padding: 8px 12px;
            margin: 6px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 18px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
    // Biến chứa thông tin kết nối tới cơ sở dữ liệu
    $_servername = "localhost";
    $_username = "root";
    $_password = "";
    $_dbname = "btecs_database";
    $conn = new mysqli($_servername, $_username, $_password, $_dbname);

    // Kiểm tra nếu form đã được gửi đi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
       
        $name = $_POST["name"];
        $address = $_POST["address"];
        $email = $_POST["email"];

        // Tạo kết nối tới cơ sở dữ liệu
        $conn = new mysqli($_servername, $_username, $_password, $_dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng students
        $sql = "INSERT INTO students ( name, address, email) VALUES ('$name', '$address', '$email')";

        // Thực thi câu lệnh SQL
        if (mysqli_query($conn, $sql)) { 

            header("Location: display_students.php") ; 
        }

        // Đóng kết nối tới cơ sở dữ liệu
        $conn->close();
    }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <input type="submit" value="Thêm sinh viên">
</form>

</body>
</html>
