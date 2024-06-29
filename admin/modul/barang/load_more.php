<?php
include '../koneksi.php';

$limit = 4;
$offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;

$query = "SELECT * FROM tb_barang LIMIT $limit OFFSET $offset";
$result = mysqli_query($koneksi, $query);

$data = array();
while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);
?>
