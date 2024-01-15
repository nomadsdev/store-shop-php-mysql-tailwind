<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "store_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับ ID สินค้าจาก URL
$product_id = $_GET["id"];

// ดึงข้อมูลสินค้าจากฐานข้อมูล
$sql_product = "SELECT * FROM products WHERE id = $product_id";
$result_product = $conn->query($sql_product);

if ($result_product->num_rows > 0) {
    $row_product = $result_product->fetch_assoc();

    // เพิ่มการซื้อลงในฐานข้อมูล
    $sql_purchase = "INSERT INTO purchases (product_id, product_name, product_image_url) VALUES ($product_id, '" . $row_product["name"] . "', '" . $row_product["image_url"] . "')";
    $result_purchase = $conn->query($sql_purchase);

    if ($result_purchase) {
        echo "<h2 class='text-center text-green-500 text-5xl p-10'>Purchase the product successfully!</h2>";
    } else {
        echo "There was an error in purchasing.: " . $conn->error;
    }
} else {
    echo "The product you want to buy was not found.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>successfully</title>
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
    <a href="index.php" class='bg-rose-200 text-rose-500 px-10 py-1 rounded-xl'>
        Back to home
    </a>
</div>

        <footer class='py-10'>
        <h1 class='text-indigo-500 text-center'>
            NoMads <span class='text-orange-500'>Developer</span>
        </h1>
        </footer>
    
</body>
</html>