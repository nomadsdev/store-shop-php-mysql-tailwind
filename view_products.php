<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "store_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลสินค้าทั้งหมดจากฐานข้อมูล
$sql = "SELECT * FROM purchases";
$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>

    <div class='flex justify-center'>
        <div class='p-10'>
            <h1 class='text-center text-blue-500 text-3xl'>
                Record <span class='text-orange-500'>Store</span>
            </h1>
            <div class='w-5 h-1 bg-orange-500 rounded-full'></div>
        </div>
    </div>

    <div class='grid grid-cols-6 py-10'>

    <?php

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='flex justify-center pb-10'>";
                echo "<div class='border p-2 rounded-xl shadow-md'>";
                echo "<div class='flex gap-2'>";
                echo "<p class='text-orange-500'>ID : " . $row["id"] . "</p>";
                echo "<p class='text-blue-500'>" . $row["product_name"] . "</p>";
                echo "</div>";
                echo "<p class='text-zinc-300 text-xs pb-2'>" . $row["purchase_time"] . "</p>";
                echo "<img class='w-40 h-40 object-cover rounded-xl shadow-md' src='" . $row["product_image_url"] . "' alt='Product Image'>";
                echo "<div class='flex justify-center pt-4'>";
                echo "<a href='delete_product.php?id=" . $row["id"] . "' class='bg-rose-200 text-rose-500 px-8 py-1 rounded-md text-xs'>delete product</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-rose-500 text-center'>There are no products.</p>";
        }
        
    ?>
    </div>

    <div class='flex justify-center'>
        <a href="index.php" class='bg-rose-200 text-rose-500 px-10 py-1 rounded-xl'>
            Back to Home
        </a>
    </div>

        <footer class='py-10'>
        <h1 class='text-indigo-500 text-center'>
            NoMads <span class='text-orange-500'>Developer</span>
        </h1>
        </footer>
    
</body>
</html>