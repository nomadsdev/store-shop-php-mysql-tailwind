<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "store_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM purchases";
$result = $conn->query($sql);

// รับ ID สินค้าจาก URL
$product_id = $_GET["id"];

// ลบสินค้าจากตาราง purchases
$sql_delete_purchases = "DELETE FROM purchases WHERE id = $product_id";
$result_delete_purchases = $conn->query($sql_delete_purchases);

if ($result_delete_purchases) {
    echo "<h2 class='text-center text-rose-500 text-5xl p-10'>The product has been deleted!</h2>";
} else {
    echo "An error occurred." . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deleted product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>

        <div class='flex justify-center'>
            <a href="view_products.php" class='bg-rose-200 text-rose-500 px-10 py-1 rounded-xl'>
                Back to Record Store
            </a>
        </div>

        <footer class='py-10'>
        <h1 class='text-indigo-500 text-center'>
            NoMads <span class='text-orange-500'>Developer</span>
        </h1>
        </footer>
    
</body>
</html>