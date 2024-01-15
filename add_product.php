<?php
// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "store_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่ามีการส่งข้อมูลมาจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image_url = $_POST["image_url"];

    // เพิ่มสินค้าลงในฐานข้อมูล
    $sql = "INSERT INTO products (name, description, price, image_url) VALUES ('$name', '$description', $price, '$image_url')";
    $result = $conn->query($sql);

    if ($result) {
        echo "<div class='flex justify-center pt-5'>";
        echo "<p class='text-center p-5 text-green-500 bg-green-200 rounded-full px-20 py-1'>Product added successfully</p>";
        echo "</div>";
    } else {
        echo "An error occurred.: " . $conn->error;
    }
}

$conn->close();
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
        <div class=' p-5'>
            <h2 class='text-indigo-500 text-center text-4xl'>Add <span class='text-orange-500'>Product</span></h2>
            <div class='bg-orange-500 w-6 h-1 rounded-full'></div>
        </div>
        </div>
        <form method="post" action="">
            <div class='py-10'>
                <div class='flex gap-1 justify-center'>
                    <span class='text-orange-600'>Name Product :</span> <input type="text" name="name" required class='border border-orange-600 rounded-md pl-2'><br>
                </div>
                <br>
                <br>
                <div class='flex gap-1 justify-center'>
                    <span class='text-green-600'>Description :</span> <textarea name="description" class='border border-green-600 rounded-md pl-2'></textarea><br>
                </div>
                <br>
                <br>
                <div class='flex gap-1 justify-center'>
                    <span class='text-blue-600'>Price :</span> <input type="number" name="price" step="0.01" required class='border border-blue-600 rounded-md pl-2'><br>
                </div>
                <br>
                <br>
                <div class='flex gap-1 justify-center'>
                    <span class='text-rose-600'>URL Image :</span> <input type="text" name="image_url" class='border border-rose-600 rounded-md pl-2'><br>
                </div>
            </div>
            <div class='flex justify-center'>
                <input type="submit" value="Add Product" class='text-green-600 bg-green-200 px-10 py-1 rounded-xl shadow-md'>
            </div>
        </form>

        <div class='flex justify-center py-10'>
            <a href="index.php" class='text-rose-600 bg-rose-200 rounded-xl px-10 py-1'>
                Back to Home
            </a>
        </div>
    
</body>
</html>