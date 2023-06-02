<!DOCTYPE html>
<html>
    <head>
        <title>Pendaftaran Rute Penerbangan</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    <body>
        <!-- Navbar dan Logo -->
        <nav class="navbar navbar-light bg-dark">
            <a class="navbar-brand text-white" href="#">
                <img src="img/github-mark-white.png" width="35" height="auto" class="d-inline-block align-top" alt="">
                GitHub Registration Airlines
            </a>
        </nav>
        <!--Form untuk memasukkan data tiket yang dibeli-->
        <div class="container bg-light mt-5 py-2 rounded-lg border border-dark">
            <h3 class="text-center mt-3 mb-3">Pendaftaran Rute Penerbangan</h3>
                <table class="table table-borderless">
                    <form action="index.php" method="post" id="formItem" >
                        <tr>
                            <!--Masukkan Nama Maskapai-->
                            <td><label for="maskapai">Maskapai </label></td>
                            <td><input class="form-control form-control-sm" required type="text" id="maskapai" name="maskapai" placeholder="Nama Maskapai"></td>
                        </tr>
                        <tr>
                            <!--Masukkan Bandara Asal-->
                            <td><label for="bandaraAsal">Bandara Asal </label></td>
                            <td>
                                <select class="form-control" name="bandaraAsal">
                                    <option value="Soekarno-Hatta">Soekarno-Hatta (CGK)</option>
                                    <option value="Husein Sastranegara">Husein Sastranegara (BDO)</option>
                                    <option value="Abdul Rachman Saleh">Abdul Rachman Saleh (MLG)</option>
                                    <option value="Juanda">Juanda (SUB)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <!--Masukkan Bandara Tujuan-->
                            <td><label for="bandaraTujuan">Bandara Tujuan </label></td>
                            <td>
                                <select class="form-control" required name="bandaraTujuan">
                                    <option value="Sultan Iskandarmuda">Sultan Iskandarmuda (BTJ)</option>
                                    <option value="Ngurah Rai">Ngurah Rai (DPS)</option>
                                    <option value="Hasanuddin">Hasanuddin (UPG)</option>
                                    <option value="Inanwatan">Inanwatan (INX)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <!--Harga Tiket-->
                            <td><label for="hargaTiket">Harga Tiket </label></td>
                            <td><input class="form-control" type="number" id="hargaTiket" name="hargaTiket" placeholder="Harga Tiket"></td>
                        </tr>
                        <tr>
                            <!--Tombol Kirim-->
                            <td></td>
                            <td><button type="submit" class="btn btn-secondary btn-lg btn-block" form="formItem" value="Submit" name="btnSubmit" id="btnSubmit">Submit</button></td>
                            <td></td>
                        </tr>
                    </form>
                </table>
        </div>
        <?php
            $bandaraAsal = ["Soekarno-Hatta", "Husein Sastranegara", "Abdul Rachman Saleh", "Juanda"];
            sort($bandaraAsal); 
            $bandaraTujuan = ["Ngurah Rai", "Hasanuddin", "Inanwatan", "Sultan Iskandarmuda"];
            sort($bandaraTujuan);


            $fileJson = 'data/data.json';
            $dataPenerbangan = array();

            //membaca file Json
            $dataJson = file_get_contents($fileJson);
            $dataPenerbangan = json_decode($dataJson, true);

            // Detail Pajak
            $cgk = 50000;
            $bdo = 30000;
            $mlg = 40000;
            $sub = 40000;
            $dps = 80000;
            $upg = 70000;
            $inx = 90000;
            $btj = 70000;

            if (isset($_POST['btnSubmit'])) {
                // mengambil data dari form
                $maskapai = $_POST['maskapai'];
                $bandaraAsal = $_POST['bandaraAsal'];
                $bandaraTujuan = $_POST['bandaraTujuan'];
                $hargaTiket = $_POST['hargaTiket'];

                if ($bandaraAsal = "Soekarno-Hatta") {
                    if ($bandaraTujuan == "Ngurah Rai") {
                        $totalPajak = $cgk + $dps;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    } else if ($bandaraTujuan == "Hasasnuddin") {
                        $totalPajak = $cgk + $upg;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    } else if ($bandaraTujuan == "Inanwatan") {
                        $totalPajak = $cgk + $inx;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    } else if ($bandaraTujuan == "Sultan Iskandarmuda") {
                        $totalPajak = $cgk + $btj;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    }
                }

                if ($bandaraAsal = "Husein Sastranegara") {
                    if ($bandaraTujuan == "Ngurah Rai") {
                        $totalPajak = $bdo + $dps;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    } else if ($bandaraTujuan == "Hasasnuddin") {
                        $totalPajak = $bdo + $upg;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    } else if ($bandaraTujuan == "Inanwatan") {
                        $totalPajak = $bdo + $inx;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    } else if ($bandaraTujuan == "Sultan Iskandarmuda") {
                        $totalPajak = $bdo + $btj;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    }
                }

                if ($bandaraAsal = "Abdul Rachman Saleh") {
                    if ($bandaraTujuan == "Ngurah Rai") {
                        $totalPajak = $mlg + $dps;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    } else if ($bandaraTujuan == "Hasasnuddin") {
                        $totalPajak = $mlg + $upg;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    } else if ($bandaraTujuan == "Inanwatan") {
                        $totalPajak = $mlg + $inx;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    } else if ($bandaraTujuan == "Sultan Iskandarmuda") {
                        $totalPajak = $mlg + $btj;
                        $totalHarga = $hargaTiket + $totalPajak;

                        $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $totalPajak, $totalHarga];
                    }
                }


                // Section membuat data array baru
                // $dataBaru = [$maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket,];
                array_push($dataPenerbangan, $dataBaru);
                $dataToJson = json_encode($dataPenerbangan, JSON_PRETTY_PRINT);
                file_put_contents("data/data.json", $dataToJson);

            }

        ?>
        <p><br></p>
        <!-- Tabel untuk menampilkan data Penerbangan. -->
        <table class="table table-striped table-dark">
            <h3 class="text-center text-white bg-dark py-2">Daftar Rute Tersedia</h3>
            <thead>
                <tr>
                <!-- Header tabel data Penerbangan. -->
                    <th scope="col">Maskapai</th>
                    <th scope="col">Asal Penerbangan</th>
                    <th scope="col">Tujuan Penerbangan</th>
                    <th scope="col">Harga Tiket</th>
                    <th scope="col">Pajak</th>
                    <th scope="col">Total Harga Tiket</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    for ($i=0; $i < count($dataPenerbangan); $i++){
                                         
                        $maskapai = $dataPenerbangan[$i][0];
                        $bandaraAsal = $dataPenerbangan[$i][1];
                        $bandaraTujuan = $dataPenerbangan[$i][2];
                        $hargaTiket = $dataPenerbangan[$i][3];
                        $totalPajak = $dataPenerbangan[$i][4];
                        $totalHarga = $dataPenerbangan [$i][5];


                        echo "<tr>
                            <td>".$maskapai."</td><!--Data nama maskapai-->
                            <td>".$bandaraAsal."</td><!--Data bandara asal penerbangan-->
                            <td>".$bandaraTujuan."</td><!--Data bandara tujuan penerbangan-->
                            <td>".$hargaTiket."</td><!--Data harga tiket-->
                            <td>".$totalPajak."</td><!--Data pajak-->
                            <td>".$totalHarga."</td><!--Data harga tiket dan pajak-->
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    </body>
</html>