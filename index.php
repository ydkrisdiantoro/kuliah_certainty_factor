<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../framework/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background: #efefef;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <?php
        $nama = "Tanti (dari Soal UTS Sistem Pakar)";
        if (isset($_GET["nama"])) {
            $nama = $_GET["nama"];
        }
        $gejala = array(
            'Cepat Lelah',
            'Wajah Pucat',
            'Sakit Kepala'
        );
        // Tabel Nilai CF Pakar
        $cfpakar = array(0.8, 1, 0.4);
        echo "<h2 class='display-4 text-center'>Diagnosa Penyakit Anemia</h2>";
        echo "<p class='lead font-weight-300 text-center mb-5 mx-md-5 px-md-5'><small>Yayan Dwi Krisdiantoro (4611417077) - UTS Sistem Pakar - Prosentase Menderita Anemia<br>Data Tanti di bawah adalah soal UTS. Kamu bisa cek sendiri dengan memasukkan data gejala yang kamu rasakan di kolom yang disediakan.</small></p>";
        ?>
        <div class="row">

            <!-- Tabel Informasi Nilai CFpakar dan CFuser -->
            <div class="col-12 col-md-6 mb-4">
                <div id="accordion">
                    <div class="card mb-2">
                        <div class="card-header bg-primary" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <b class="text-white">Daftar Nilai CFpakar (+)</b>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <?php
                                echo "<table class='table table-striped'>";
                                for ($i = 0; $i < count($gejala); $i++) {
                                    $g = $i + 1;
                                    echo "<tr>
                                    <td>G" . $g . ". </td>
                                    <td>" . $gejala[$i] . "</td>
                                    <td> = " . $cfpakar[$i] . "</td>
                                    </tr>";
                                }
                                echo '</table>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion2">
                    <div class="card">
                        <div class="card-header bg-primary" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <b class="text-white">Tabel Nilai User (+)</b>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion2">
                            <div class="card-body">
                                <?php
                                // Tabel Nilai User
                                $nilai_user = array(
                                    array('Tidak', 0),
                                    array('Tidak Tahu', 0.2),
                                    array('Sedikit Yakin', 0.4),
                                    array('Cukup Yakin', 0.6),
                                    array('Yakin', 0.8),
                                    array('Sangat Yakin', 1)
                                );
                                echo "<table class='table table-striped'>";
                                for ($i = 0; $i < count($nilai_user); $i++) {
                                    echo "<tr>
                                    <td>" . $nilai_user[$i][0] . "</td>
                                    <td> = " . $nilai_user[$i][1] . "</td>
                                    </tr>";
                                }
                                echo '</table>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Tabel Informasi CFpakar dan CFuser -->

            <!-- User Input -->
            <div class="col-12 col-md-6">
                <p class="display-4 text-primary text-center" style="font-size: 24pt;">Ayo Cek Prosentase Kamu Terkena Penyakit Anemia</p>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="lead font-weight-300">Gejala yang Dirasakan:</p>
                        <p>Silahkan masukkan nilai keyakinan untuk masing-masing gejala yang dirasakan.</p>
                        <form action="jembatan.php" method="post">
                            <input type="text" name="nama" placeholder="Tulis Nama Kamu" class="form-control mb-2">
                            <?php
                            echo "<table class='table table-striped'>";
                            for ($i = 0; $i < count($gejala); $i++) {
                                $g = $i + 1;
                                echo "<tr>
                                <td>" . $gejala[$i] . "</td>
                                <td>";
                                echo "<select class='form-control' name='gejala" . $g . "'>";
                                for ($j = 0; $j < count($nilai_user); $j++) {
                                    echo "<option value='" . $nilai_user[$j][0] . "'>" . $nilai_user[$j][0] . "</option>";
                                }
                                echo "</select>";
                                echo "</td>
                                </tr>";
                            }
                            echo '</table>';
                            ?>
                            <button type="submit" class="btn btn-primary form-control">Cek Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of User Input -->

        </div>

        <div class="row">
            <div class="col-12">
                <p class="display-4 text-primary text-center" style="font-size: 24pt;">Hasil Analisis Gejala</p>
                <div class="px-0 px-md-5 text-center">
                    <p class="mx-5">Berikut adalah proses analisis dengan metode certainty factor terhadap gejala yang dirasakan <?php echo "<b>" . $nama . "</b>"; ?> dan nilai CF pakar terhadap gejala tersebut.</p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <?php
                        echo "<h4 class='font-weight-300'>Nama: " . $nama . "</h4>";

                        // Inputan User
                        $input = array(
                            'Cukup Yakin',
                            'Sedikit Yakin',
                            'Yakin'
                        );
                        if (isset($_GET["gejala"])) {
                            $semua_gejala = $_GET["gejala"];
                            $input = explode("_", $semua_gejala);
                        }

                        echo "<table class='table table-striped mt-2'>";
                        echo "<tr>";
                        echo "<td>Gejala</td>";
                        for ($i = 1; $i <= count($input); $i++) {
                            echo "<td>G" . $i . "</td>";
                        }
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Data Inputan " . $nama . "</td>";
                        for ($i = 0; $i < count($input); $i++) {
                            echo "<td>" . $input[$i] . "</td>";
                        }
                        echo "</tr>";
                        // CF User
                        $cfuser = array();
                        echo "<tr>";
                        echo "<td>Nilai CF " . $nama . "</td>";
                        for ($i = 0; $i < count($input); $i++) {
                            echo "<td class='text-primary'>";
                            for ($j = 0; $j < count($nilai_user); $j++) {
                                if ($input[$i] == $nilai_user[$j][0]) {
                                    echo "<b>" . $nilai_user[$j][1] . "</b>";
                                    $cfuser[] = $nilai_user[$j][1];
                                }
                            }
                            echo "</td>";
                        }
                        echo '</tr>';
                        // CF Pakar
                        echo '<tr>';
                        echo "<td>Nilai CF Pakar</td>";
                        for ($i = 0; $i < count($gejala); $i++) {
                            $g = $i + 1;
                            echo "<td><b>" . $cfpakar[$i] . "</b></td>";
                        }
                        echo '</tr>';
                        // Nilai CFpakar * CFuser
                        $CFHEi = array();
                        echo '<tr>';
                        echo "<td>CF[H,E]i = CF Pakar * CF Tanti</td>";
                        for ($i = 0; $i < count($input); $i++) {
                            echo "<td class='text-danger'>";
                            $CFHE = $cfpakar[$i] * $cfuser[$i];
                            $CFHEi[] = $CFHE;
                            echo "<b>" . $CFHE . "</b>";
                            echo "</td>";
                        }
                        echo '</tr>';
                        // CF COmbine
                        $CFcombine_old = 0;
                        $CFcombine_now = 0;
                        // var_dump($CFHEi);
                        for ($i = 0; $i < count($CFHEi); $i++) {
                            echo '<tr>';
                            $t = $i + 1;
                            if ($t == count($CFHEi)) {
                            } else {
                                echo "<td>CF Combine " . $t . "</td>";
                            }
                            echo "<td colspan=3>";
                            if ($i + 2 <= count($CFHEi)) {
                                if ($i == 0) {
                                    echo 'CF[HE]1,2 = ' . $CFHEi[$i] . ' + (' . $CFHEi[$i + 1] . ' * (1 - ' . $CFHEi[$i] . ')) = ';
                                    $CFcombine_initial = $CFHEi[$i] + ($CFHEi[$i + 1] * (1 - $CFHEi[$i]));
                                    $CFcombine_now = round($CFcombine_initial, 2);
                                    $CFcombine_old = $CFcombine_now;
                                } else {
                                    echo 'CF[HE]old,' . ($i + 1) . ' = ' . $CFcombine_old . ' + (' . $CFHEi[$i + 1] . ' * (1 - ' . $CFcombine_old . ')) = ';
                                    $CFcombine_now = round($CFcombine_old + ($CFHEi[$i + 1] * (1 - $CFcombine_old)), 2);
                                    $CFcombine_old = $CFcombine_now;
                                }
                                echo "<span class='text-warning'><b>" . $CFcombine_now . "</b></span>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo '<b>Kesimpulan Akhir</b>';
                        $prosentase = $CFcombine_now * 100;
                        echo '<p class="font-weight-300 mb-0" style="font-size:2rem;">Prosentase = 100% * <b><span class="text-warning">' . $CFcombine_now . '</span> = <span class="text-success">' . $prosentase . '%</span></b></p>';
                        echo 'Hasil diagnosa: <b> ';
                        if ($prosentase <= 50) {
                            echo "Sedikit kemungkinan atau kemungkinan kecil";
                        } elseif ($prosentase >= 51 && $prosentase <= 79) {
                            echo "Pasti";
                        } elseif ($prosentase >= 80 && $prosentase <= 99) {
                            echo "Kemungkinan besar";
                        } elseif ($prosentase == 100) {
                            echo "Sangat yakin";
                        }
                        echo '</b> ' . $nama . ' mengidap penyakit Anemia';
                        ?>
                        <p class="mt-4"><b>Nilai Kepercayaan dalam Prosentase</b></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 29%" aria-valuenow="79" aria-valuemin="0" aria-valuemax="100">79%</div>
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 19%" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100">99%</div>
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 2%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Rentang</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>&gt;50%</td>
                                    <td>Sedikit kemungkinan atau kemungkinan kecil</td>
                                </tr>
                                <tr>
                                    <td>50% - 79%</td>
                                    <td>Pasti</td>
                                </tr>
                                <tr>
                                    <td>80% - 99%</td>
                                    <td>Kemungkinan Besar</td>
                                </tr>
                                <tr>
                                    <td>100%</td>
                                    <td>Sangat Yakin</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <p class="text-warning" style="font-size:2rem;">(!)</p>
                            <p class="font-weight-300 mb-0" style="font-size:1.2rem;">Hasil di atas hanya perhitungan cepat dengan 3 gejala saja. Silahkan hubungi dokter untuk diagnosa yang lebih akurat.</p>
                            <hr>
                            <small>Selalu jaga kesehatan dengan berolahraga dan makan makanan bergizi serta bahagia.</small>
                        </div>
                    </div>
                </div>
                <div id="footer" class="mt-4 text-center">
                    <small>Developed by Yayan Dwi Krisdiantoro</small>
                </div>

            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../framework/bootstrap-4.3.1/js/jquery.min.js"></script>
    <script src="../../framework/bootstrap-4.3.1/js/popper.min.js"></script>
    <script src="../../framework/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script>
        $('#collapseOne').collapse({
            toggle: false
        })
    </script>
</body>

</html>