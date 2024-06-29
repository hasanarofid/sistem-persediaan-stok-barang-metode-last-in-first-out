<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load More Example</title>
    <style>
        /* Your CSS styles */
        .card {
            transition: transform 0.2s;
            margin-bottom: 20px;
            border: none;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            background-color: #ffffff;
            padding: 20px;
            border-top: 1px solid #f1f1f1;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-text {
            margin-bottom: 15px;
            color: #777;
        }
        .btn {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row" id="card-container">
        <?php
        include '../koneksi.php';

        $batas = 8;
        $query = "SELECT * FROM tb_barang LIMIT $batas";
        $result = mysqli_query($koneksi, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-3">';
            echo '  <div class="card mb-3 shadow-sm">';
            echo '      <img class="card-img-top" src="../images/admin/' . $row['foto'] . '" alt="' . $row['nama_brg'] . '">';
            echo '      <div class="card-body">';
            echo '          <h5 class="card-title">' . $row['nama_brg'] . '</h5>';
            echo '          <p class="card-text">';
            echo '              Kode Barang: ' . $row['kode_brg'] . '<br>';
            echo '              Warna: ' . $row['warna'] . '<br>';
            echo '              Size: ' . $row['size'] . '<br>';
            echo '              Stok: ' . $row['stok'] . '<br>';
            echo '              Rak: ' . $row['rak'] . '<br>';
            echo '              Supplier: ' . $row['supplier'];
            echo '          </p>';
            echo '          <a href="index.php?m=barang&s=hapus&kode_brg=' . $row['kode_brg'] . '" onclick="return confirm(\'Yakin Akan dihapus?\')" class="btn btn-danger">Hapus</a>';
            echo '          <a href="index.php?m=barang&s=ubah&kode_brg=' . $row['kode_brg'] . '" class="btn btn-primary">Ubah</a>';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }
        ?>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <button id="load-more" class="btn btn-primary">Load More</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let offset = 8;
        const loadMoreBtn = document.getElementById('load-more');
        loadMoreBtn.addEventListener('click', function() {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '?m=barang&s=load_more', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    const container = document.getElementById('card-container');
                    data.forEach(row => {
                        const card = document.createElement('div');
                        card.className = 'col-md-3';
                        card.innerHTML = `
                            <div class="card mb-3 shadow-sm">
                                <img class="card-img-top" src="../images/admin/${row.foto}" alt="${row.nama_brg}">
                                <div class="card-body">
                                    <h5 class="card-title">${row.nama_brg}</h5>
                                    <p class="card-text">
                                        Kode Barang: ${row.kode_brg}<br>
                                        Warna: ${row.warna}<br>
                                        Size: ${row.size}<br>
                                        Stok: ${row.stok}<br>
                                        Rak: ${row.rak}<br>
                                        Supplier: ${row.supplier}
                                    </p>
                                    <a href="index.php?m=barang&s=hapus&kode_brg=${row.kode_brg}" onclick="return confirm('Yakin Akan dihapus?')" class="btn btn-danger">Hapus</a>
                                    <a href="index.php?m=barang&s=ubah&kode_brg=${row.kode_brg}" class="btn btn-primary">Ubah</a>
                                </div>
                            </div>`;
                        container.appendChild(card);
                    });
                    offset += 4;
                }
            };
            xhr.send('offset=' + offset);
        });
    });
</script>
</body>
</html>
