<?php
$produk = [
    ["nama" => "Laptop Asus", "kategori" => "Laptop", "harga" => 5500000, "stok" => 2],
    ["nama" => "Mouse Logitech", "kategori" => "Aksesoris", "harga" => 150000, "stok" => 10],
    ["nama" => "Monitor Samsung", "kategori" => "Layar", "harga" => 1200000, "stok" => 0],
    ["nama" => "Keyboard Fantech", "kategori" => "Aksesoris", "harga" => 350000, "stok" => 5],
    ["nama" => "Headset Rexus", "kategori" => "Audio", "harga" => 250000, "stok" => 0],
    ["nama" => "Printer Epson", "kategori" => "Mesin", "harga" => 2100000, "stok" => 3]
];

$total_produk = count($produk);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    
    <style>
        /* CSS Dasar Saja */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Navbar & Footer */
        .navbar, .footer {
            background-color: #333;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
        }

        /* Hero Section */
        .hero {
            background-color: #ddd;
            text-align: center;
            padding: 50px 20px;
        }

        .katalog {
            padding: 30px;
        }
        
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }

        .coret { text-decoration: line-through; color: red; font-size: 14px; }
        .harga-akhir { font-size: 20px; font-weight: bold; }
        .stok-ada { color: green; font-weight: bold; }
        .stok-habis { color: red; font-weight: bold; }

        @media (max-width: 600px) {
            .grid-container {
                grid-template-columns: 1fr; 
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <h2>Cia Store</h2>
        <p>Home | Products | About</p>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Selamat Datang di Cia Store</h1>
        <p>Toko teknologi sederhana yang memenuhi kebutuhanmu.</p>
    </div>

    <!-- Bagian Katalog -->
    <div class="katalog">
        <h2>Katalog Produk</h2>
        <p><strong>Total Produk: <?php echo $total_produk; ?></strong></p> <!-- Tampil jumlah produk -->

        <!-- Susunan Card Grid -->
        <div class="grid-container">
            <?php 
            foreach ($produk as $item) { 
                
                
                $harga_asli = $item['harga'];
                $stok = $item['stok'];
            ?>
            
                <div class="card">
                    <p style="color: gray; margin: 0;"><?php echo $item['kategori']; ?></p>
                    <h3><?php echo $item['nama']; ?></h3>

                    <?php
                    
                    if ($harga_asli >= 1000000) {
                        $diskon = $harga_asli * 0.10; // Diskon 10%
                        $harga_baru = $harga_asli - $diskon;

                        echo "<p class='coret'>Rp " . number_format($harga_asli, 0, ',', '.') . "</p>";
                        echo "<p style='color: orange; margin:0;'>Diskon 10%</p>";
                        echo "<p class='harga-akhir'>Rp " . number_format($harga_baru, 0, ',', '.') . "</p>";
                    } else {
                        
                        echo "<p class='harga-akhir'>Rp " . number_format($harga_asli, 0, ',', '.') . "</p>";
                    }
                    ?>

                    <hr>

                    <?php
                    
                    if ($stok > 0) {
                        echo "<p class='stok-ada'>Tersedia (Stok: $stok)</p>";
                        echo "<button style='padding: 10px; background: blue; color: white; border: none;'>Beli Sekarang</button>";
                    } else {
                        echo "<p class='stok-habis'>Stok Habis</p>";
                        echo "<button disabled style='padding: 10px; background: gray; color: white; border: none;'>Habis</button>";
                    }
                    ?>
                </div>

            <?php } // Akhir dari foreach ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </div>

</body>
</html>