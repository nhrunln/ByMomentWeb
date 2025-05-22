<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root"; // Kullanıcı adı
$password = "";     // Şifre boş bırakıldı
$dbname = "restaurant_db"; // Veritabanı adı

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Form verilerini al
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];
$special_request = $_POST['special_request'];

// Verileri kaydet
$sql = "INSERT INTO reservations (name, phone, email, date, time, guests, special_request)
        VALUES ('$name', '$phone', '$email', '$date', '$time', $guests, '$special_request')";

if ($conn->query($sql) === TRUE) {
    echo "Rezervasyon başarıyla alındı.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

