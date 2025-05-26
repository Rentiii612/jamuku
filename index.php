<?php
require 'src/fungsi.php';
if (isset($_GET['hapus'])) {
    hapusDariKeranjang($_GET['hapus']);
    header("Location: keranjang.php");
    exit;
}
if (isset($_GET['hapus_semua'])) {
    hapusSemuaKeranjang();
    header("Location: keranjang.php");
    exit;
}
?>
<link rel="stylesheet" href="style.css">
<div class="container">
<h2>Keranjang Belanja</h2>
<?php if (empty($_SESSION['keranjang'])): ?>
<p>Keranjang kosong.</p>
<a href="index.php" class="button">Kembali ke Pilih Bahan</a>
<?php else: ?>
<table>
<thead><tr><th>Nama</th><th>Deskripsi</th><th>Porsi</th><th>Harga</th><th>Subtotal</th><th>Aksi</th></tr></thead>
<tbody>
<?php foreach ($_SESSION['keranjang'] as $id => $item): ?>
<tr>
<td><strong><?= $item['nama'] ?></strong></td>
<td><small><?= $item['deskripsi'] ?></small></td>
<td><?= $item['porsi'] ?></td>
<td><?= number_format($item['harga'],0,',','.') ?></td>
<td><?= number_format($item['harga'] * $item['porsi'],0,',','.') ?></td>
<td><a href="?hapus=<?= $id ?>" class="aksi-link">Hapus</a></td>
</tr>
<?php endforeach; ?>
</tbody></table>
<p style="margin-top: 15px; font-weight: 700; font-size: 18px; color: #6a1b9a;">Total: Rp<?= number_format(totalHarga(),0,',','.') ?></p>
<div class="flex-row">
<a href="?hapus_semua=1" class="button" style="background: #f06292;">Hapus Semua</a>
<a href="bayar.php" class="button" style="background: #ba68c8;">Check Out</a>
<a href="index.php" class="button">Kembali Pilih Bahan</a>
</div>
<?php endif; ?>
</div>

