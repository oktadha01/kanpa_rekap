<div class="row">
    <div class="col-lg-6 col-12 mb-3">
        <div class="card">
            <div class="card-header p-0">
                <center>
                    <h6 class="mb-0" style="background: #3c5794;color: white;">Harian</h6>
                </center>
            </div>
            <div class="card-body p-0" style="overflow-x:auto;max-height: 23rem;">
                <table id="nilai-harian" class="table table-head-fixed text-nowrap table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th>HARI</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_rekap_gaji_tenaga as $data) {

                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data->nm_tenaga; ?></td>
                                <td><?php echo $data->hrg_tenaga; ?></td>
                                <td><?php echo $data->jmlh_h; ?></td>
                                <td><?php echo $data->total_gaji_h; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer p-0">
                <center>
                    <p class="mb-0">
                        <span>Total : Rp.</span>
                        <span id="subtotal-tenaga-h"></span>
                    </p>
                </center>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12 mb-3">
        <div class="card">
            <div class="card-header p-0">
                <center>
                    <h6 class="mb-0" style="background: #3c5794;color: white;">Lemburan</h6>
                </center>
            </div>
            <div class="card-body p-0" style="overflow-x:auto;max-height: 23rem;">
                <table id="nilai-lembur" class="table table-head-fixed text-nowrap table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th>JAM</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        foreach ($data_rekap_gaji_tenaga as $data) {

                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data->nm_tenaga; ?></td>
                                <td class="hrg-l-<?php echo $data->id_rekap_tenaga; ?>"><?php echo $data->hrg_tenaga_lembur; ?></td>
                                <td class="jam-l-<?php echo $data->id_rekap_tenaga; ?>"><?php echo $data->jmlh_j; ?></td>
                                <?php
                                if ($data->jmlh_j == '0') {
                                ?>
                                    <td class="total-lembur-text-<?php echo $data->id_rekap_tenaga; ?>" hidden>0</td>
                                <?php
                                } else {
                                ?>
                                    <td class="total-lembur-text-<?php echo $data->id_rekap_tenaga; ?>" hidden><?php echo $data->total_lembur; ?></td>
                                <?php
                                }
                                ?>
                                <td class="total-l-<?php echo $data->id_rekap_tenaga; ?>"><?php echo $data->total_lembur; ?></td>
                            </tr>
                            <script>
                                $('#total-l-<?php echo $data->id_rekap_tenaga; ?>').text(removeCommas($('.total-lembur-text-<?php echo $data->id_rekap_tenaga; ?>').text()))
                                new AutoNumeric('#total-l-<?php echo $data->id_rekap_tenaga; ?>', autoNumericOption);
                            </script>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer p-0">
                <center>
                    <p class="mb-0">
                        <span>Total : Rp.</span>
                        <span id="subtotal-tenaga-l"></span>
                    </p>
                </center>
            </div>
        </div>
    </div>
</div>
<script>
    total_gaji_harian();
    total_gaji_lemburan();
    function total_gaji_harian() {
        var table_h = document.getElementById("nilai-harian"),
            sumHsl_h = 0;
        for (var t = 1; t < table_h.rows.length; t++) {
            sumHsl_h = sumHsl_h + parseFloat(removeCommas(table_h.rows[t].cells[4].innerHTML));
        }
        $("#subtotal-tenaga-h").text(addCommas(sumHsl_h));;

    }
    function total_gaji_lemburan() {
        var table_l = document.getElementById("nilai-lembur"),
            sumHsl_l = 0;
        for (var t = 1; t < table_l.rows.length; t++) {
            sumHsl_l = sumHsl_l + parseFloat(removeCommas(table_l.rows[t].cells[4].innerHTML));
        }
        $("#subtotal-tenaga-l").text(addCommas(sumHsl_l));

    }
</script>