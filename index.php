<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "store_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลสินค้าทั้งหมดจากฐานข้อมูล
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <div class='p-10'>
            <h1 class='text-indigo-500 text-center text-4xl drop-shadow-md'>Store <span class='text-orange-500'>Shop</span></h1>
            <div class='bg-orange-500 w-5 h-1 rounded-full'></div>
        </div>
    </div>

    <div class='flex justify-center gap-5 py-5'>
        <div>
            <a href="./add_product.php" class='bg-blue-200 text-blue-600 rounded-xl px-5 py-1 shadow-md'>
                Add Product
            </a>
        </div>
        <div>
            <a href="./view_products.php" class='bg-orange-200 text-orange-600 rounded-xl px-5 py-1 shadow-md'>
                Record
            </a>
        </div>
    </div>

    <div class='grid grid-cols-6 pt-10'>
    <?php
    // ตรวจสอบว่ามีสินค้าหรือไม่
   
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='flex justify-center pb-10'>";
            echo "<div class='border shadow-md p-2 rounded-xl'>";
            echo "<img class='w-40 h-40 object-cover rounded-xl shadow-md' src='" . $row["image_url"] . "' alt='Product Image'><br>";
            echo "<h3 class='text-zinc-800'>" . $row["name"] . "</h3>";
            echo "<p class='text-zinc-300 text-xs'>" . $row["description"] . "</p>";
            echo "<p class='text-blue-700 text-sm pt-3'>price : " . $row["price"] . " .-</p>";
            echo "<div class='pt-2 flex justify-center'>";
            echo "<a href='buy_product.php?id=" . $row["id"] . "' class='bg-green-200 text-green-600 py-1 px-16 rounded-md shadow-md text-xs'>Buy</a>";
            echo "</div>";
            echo "</div><hr>";
            echo "</div>";
        }
    } else {
        echo "<p>ไม่มีสินค้า</p>";
    }

    $conn->close();
    ?>
    </div>

    <footer>
        <h1 class='text-indigo-500 text-center'>
            NoMads <span class='text-orange-500'>Developer</span>
        </h1>
    </footer>
    
</body>
</html>