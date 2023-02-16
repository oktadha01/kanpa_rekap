<div class="row mt-2">
    <div class="card">
        <div class="card-header p-0">
            <center>
                <h6 id="label-material-lain-lain" class="mb-0" style="background: #3c5794;color: white;"></h6>
            </center>
        </div>
        <div class="card-body p-0" style="overflow-x:auto;max-height: 23rem;">
            <table id="nilai" class="table table-head-fixed text-nowrap table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NAMA</th>
                        <th>QTY</th>
                        <th>Satuan</th>
                        <th>Hrg Satuan</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_material as $data) :

                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data->nm_material; ?></td>
                            <td><?php echo $data->qty; ?></td>
                            <td><?php echo $data->satuan; ?></td>
                            <td><?php echo $data->hrg_satuan; ?></td>
                            <td><?php echo $data->total_material; ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>