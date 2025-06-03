<?php
include 'config.php';

// Ambil kategori dari query string, default ke 'game_pc' jika tidak ada
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'game_pc';

// Mapping kategori ke tabel dan kolom yang sesuai
$mapping = [
    'game_pc' => [
        'table' => 'tb_gamepc',
        'id_col' => 'id_gamepc',
        'name_col' => 'gamepc',
        'desc_col' => 'deskripsi_gamepc',
        'img_col' => 'gambar_gamepc',
        'img_type' => 'blob' // tipe gambar BLOB
    ],
    'game_android' => [
        'table' => 'tb_gamehp',
        'id_col' => 'id_gamehp',
        'name_col' => 'gamehp',
        'desc_col' => 'deskripsi_gamehp',
        'img_col' => 'gambar_gamehp',
        'img_type' => 'blob' // tipe gambar BLOB
    ],
    'boardgame' => [
        'table' => 'tb_boardgame',
        'id_col' => 'id_boardgame',
        'name_col' => 'boardgame',
        'desc_col' => 'deskripsi_boardgame',
        'img_col' => 'gambar_boardgame',
        'img_type' => 'blob' 
    ]
];

// Validasi kategori, jika tidak valid pakai default 'game_pc'
if (!array_key_exists($kategori, $mapping)) {
    $kategori = 'game_pc';
}

$table = $mapping[$kategori]['table'];
$id_col = $mapping[$kategori]['id_col'];
$name_col = $mapping[$kategori]['name_col'];
$desc_col = $mapping[$kategori]['desc_col'];
$img_col = $mapping[$kategori]['img_col'];
$img_type = $mapping[$kategori]['img_type'];

// Query data dari database
$sql = "SELECT $id_col, $name_col, $desc_col, $img_col FROM $table ORDER BY $id_col ASC";
$result = $config->query($sql);

if ($result === false) {
    echo "<p>Error query: " . htmlspecialchars($conn->error) . "</p>";
    exit;
}

if ($result->num_rows > 0) {
    echo '<table class="min-w-full border border-gray-300 rounded-md overflow-hidden">';
    echo '<thead class="bg-blue-200">';
    echo '<tr>';
    echo '<th class="border border-gray-300 px-4 py-2 text-left">No</th>';
    echo '<th class="border border-gray-300 px-4 py-2 text-left">Nama</th>';
    echo '<th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>';
    echo '<th class="border border-gray-300 px-4 py-2 text-left">Gambar</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $no = 1;
    while ($row = $result->fetch_assoc()) {
        $name = htmlspecialchars($row[$name_col]);
        $desc = nl2br(htmlspecialchars($row[$desc_col]));

        // Penanganan gambar
        if ($img_type === 'blob' && !empty($row[$img_col])) {
            $img_data = base64_encode($row[$img_col]);
            $img_src = "data:image/png;base64,$img_data";
        } elseif ($img_type === 'url' && !empty($row[$img_col])) {
            $img_src = htmlspecialchars($row[$img_col]);
        } else {
            $img_src = "placeholder.png"; // Ganti dengan path placeholder Anda
        }

        echo '<tr>';
        echo '<td class="border border-gray-300 px-4 py-2 align-top">' . $no++ . '</td>';
        echo '<td class="border border-gray-300 px-4 py-2 align-top">' . $name . '</td>';
        echo '<td class="border border-gray-300 px-4 py-2 align-top">' . $desc . '</td>';
        echo '<td class="border border-gray-300 px-4 py-2 align-top">';
        echo '<img src="' . $img_src . '" alt="' . $name . '" class="max-w-[150px] max-h-[100px] object-contain rounded" />';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "<p>Data tidak ditemukan untuk kategori <strong>" . htmlspecialchars($kategori) . "</strong>.</p>";
}

$config->close();
?>
