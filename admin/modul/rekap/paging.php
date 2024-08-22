<?php 
include '../koneksi.php'; // Ensure database connection

// Fetch item names and initial stock from tb_barang
$barang_query = "SELECT * FROM tb_barang";
$barang_result = mysqli_query($koneksi, $barang_query);

// Prepare an array to hold stock data
$barang_data = [];
while ($barang = mysqli_fetch_assoc($barang_result)) {
    $barang_data[$barang['kode_brg']] = [
        'nama_brg' => $barang['nama_brg'],
        'stok' => $barang['stok'],
        'total_in' => 0,
        'total_out' => 0
    ];
}

// Fetch data from tb_barang_in and update the total_in for each item
$data_in = mysqli_query($koneksi, "SELECT * FROM tb_barang_in");
while ($row = mysqli_fetch_assoc($data_in)) {
    if (isset($barang_data[$row['kode_brg']])) {
        $barang_data[$row['kode_brg']]['total_in'] += $row['jml_masuk'];
    }
}

// Fetch data from tb_barang_out and update the total_out for each item
$data_out = mysqli_query($koneksi, "SELECT * FROM tb_barang_out");
while ($row = mysqli_fetch_assoc($data_out)) {
    if (isset($barang_data[$row['kode_brg']])) {
        $barang_data[$row['kode_brg']]['total_out'] += $row['jml_keluar'];
    }
}
?>

<?php foreach ($barang_data as $kode_brg => $data) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($data['nama_brg']); ?></td>
                                <td><?php echo number_format($data['total_in'], 0, ',', '.'); ?></td>
                                <td><?php echo number_format($data['total_out'], 0, ',', '.'); ?></td>
                                <td><?php echo number_format($data['stok'] + $data['total_in'] - $data['total_out'], 0, ',', '.'); ?></td>
                            </tr>
                        <?php } ?>