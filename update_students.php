

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
        $rollno = $_POST["srollno"];

        // Tạo kết nối tới cơ sở dữ liệu
        $conn = new mysqli($_servername, $_username, $_password, $_dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng students
        $updatesql = "UPDATE students SET name='$name', address='$address', email='$email'  WHERE rollno=$rollno";
        // echo $updatesql; exit;

        // Thực thi câu lệnh SQL
        if (mysqli_query($conn, $updatesql)) { 

            header("Location: display_students.php") ;   
        }

        // Đóng kết nối tới cơ sở dữ liệu
        $conn->close();
    }
?>

