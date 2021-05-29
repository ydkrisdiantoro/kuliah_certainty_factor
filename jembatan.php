<?php
$nama = $_POST["nama"];
$gejala = array();
for ($i = 1; $i <= 3; $i++) {
    $gejala[] = $_POST["gejala" . $i];
}
$semua_gejala = implode("_", $gejala);
echo $nama, $semua_gejala;
header("Location: index.php?nama=" . $nama . "&gejala=" . $semua_gejala);
