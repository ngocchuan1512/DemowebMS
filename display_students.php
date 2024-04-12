<!DOCTYPE html>
<html>
<head>
    <style>
        /* Table Styles */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr.rainbow-row {
            animation: rainbow 5s infinite;
        }
        tr:hover {
            background-color: #e5e5e5;
        }

        /* Heading Style */
        h2 {
            color: #333;
            background-color: #f2f2f2;
            padding: 10px;
            margin-bottom: 20px;
        }

        /* Rainbow Animation */
        @keyframes rainbow {
            0% { background-color: red; }
            14% { background-color: orange; }
            28% { background-color: yellow; }
            42% { background-color: green; }
            57% { background-color: blue; }
            71% { background-color: indigo; }
            85% { background-color: violet; }
            100% { background-color: red; }
        }
    </style>
</head>
<body>

<?php

$_servername = "localhost";
$_username = "root";
$_password = "";
$_dbname = "btecs_database";
$conn = new mysqli($_servername, $_username, $_password, $_dbname);

        // Create a connection
        

        // Check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Execute the SELECT query
        $query = "SELECT * FROM students";
        $result = mysqli_query($conn, $query);

        // Check if the query was successful
        if ($result) {
            // Fetch all rows as an associative array
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            echo "Error executing the query: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    ?>
    <h2>Students</h2>
    <table>
        <tr>
            <th>Roll No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>operation</th>
        </tr>
        <?php $index = 0; ?>
        <?php foreach ($rows as $row) { ?>
            <tr class="<?php echo ($index % 2 == 0) ? 'rainbow-row' : ''; ?>">
                <td><?php echo $row['rollno']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><a href="edit_students.php?srollno=<?php echo $row['rollno']; ?>">Edit</a>
                 <a onclick="return confirm('Are you sure to delete this student?');" href="delete_students.php?srollno=<?php echo $row['rollno']; ?>">Delete</a></td>
            </tr>
            <?php $index++; ?>
        <?php } ?>
    </table>
</body>
</html>