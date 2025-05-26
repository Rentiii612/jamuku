<?php
require 'src/fungsi.php';
$total = totalHarga();
session_destroy();
?>
<link rel="stylesheet" href="style.css">
<div class="container">
<h2>Terima kasih!</h2>
<p>Total pembayaran: <strong>Rp<?= number_format($total,0,',','.') ?></strong></p>
<a href="index.php" class="button">Pesan Lagi</a>
</div>

