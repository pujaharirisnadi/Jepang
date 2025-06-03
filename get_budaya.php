<?php
include 'config.php'; // koneksi database

$sql = "SELECT * FROM tb_budaya WHERE id_negara = 1"; // contoh filter budaya Jepang
$result = $config->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<section class="bg-white rounded-lg p-6 flex flex-col md:flex-row items-center gap-6 shadow-md">';
        
        if (!empty($row['gambar'])) {
            $img_data = base64_encode($row['gambar']);
            $img_src = 'data:image/jpeg;base64,' . $img_data; // atau image/png tergantung file
        } else {
            $img_src = 'placeholder.png'; // jika tidak ada gambar
        }

        echo '<img src="' . $img_src . '" alt="' . htmlspecialchars($row['budaya']) . '" class="md:w-2/5 rounded-xl object-cover max-h-48" />';
        echo '<div class="md:w-3/5 text-justify">';
        echo '<h2 class="font-bold text-lg mb-2">' . htmlspecialchars($row['budaya']) . '</h2>';
        echo '<p>' . nl2br(htmlspecialchars($row['deskripsi_budaya'])) . '</p>';
        echo '</div>';
        echo '</section>';
    }
} else {
    echo "<p>Data budaya tidak ditemukan.</p>";
}

$config->close();
?>
