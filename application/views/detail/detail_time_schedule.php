<style>
    .bg-pekerjaan-selesai {
        background: aliceblue;
    }

    .bg-pekerjaan-progres {
        background: beige;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        font-size: 10px;
        padding: 5px !important;
    }
</style>

<?php
// $no = 1;
foreach ($data_kategori_schedule as $kategori) :
    $kategori_pekerjaan = $kategori->kategori_pekerjaan;
?>
    <div class="card-header p-0">
        <center>
            <h6 class="mb-0" style="background: #255392cc;color: white;"><?php echo $kategori->kategori_pekerjaan; ?></h6>
        </center>
    </div>
    <div class="card-body p-0" style="overflow-x:auto;">
        <table id="nilai" class="table table-head-fixed text-nowrap table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>PEKERJAAN</th>
                    <th>BOBOT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_schedule as $data) :
                    if ($data->kategori_pekerjaan == $kategori_pekerjaan) {
                ?>
                        <tr id="status-schedule-<?php echo $data->id_schedule; ?>" class="">
                            <td><?php echo $no++; ?></td>
                            <td class="add-foto" data-toggle="modal" data-target="#exampleModal" data-id-schedule="<?php echo $data->id_schedule; ?>"><?php echo $data->pekerjaan; ?></td>
                            <td class="bobot-<?php echo $data->id_schedule; ?>"><?php echo $data->bobot; ?></td>
                            <td hidden class="tahapan-<?php echo $data->id_schedule; ?>"><?php echo $data->tahapan; ?></td>
                            <td hidden class="tahapan-selesai-<?php echo $data->id_schedule; ?>"><?php echo $data->tahapan_selesai; ?></td>
                            <td hidden class="tahapan-pekerjaan-<?php echo $data->id_schedule; ?>"><?php echo $data->tahapan_pekerjaan; ?></td>
                            <td hidden class="status-<?php echo $data->id_schedule; ?>"><?php echo $data->status_schedule; ?></td>
                        </tr>
                        <script>
                            if ($('.status-<?php echo $data->id_schedule; ?>').text() == 'selesai') {
                                $('#status-schedule-<?php echo $data->id_schedule; ?>').addClass('bg-pekerjaan-selesai')
                            } else {

                            }
                            if ($('.tahapan-<?php echo $data->id_schedule; ?>').text() == $('.tahapan-selesai-<?php echo $data->id_schedule; ?>').text()) {

                            } else if ($('.tahapan-selesai-<?php echo $data->id_schedule; ?>').text() == '0') {

                            } else {
                                $('#status-schedule-<?php echo $data->id_schedule; ?>').addClass('bg-pekerjaan-progres')
                            }
                        </script>
                <?php
                    } else {
                    }

                endforeach;
                ?>
            </tbody>
        </table>
    </div>
<?php
endforeach;
?>
<script>
    $('.add-foto').click(function() {
        // alert($(this).text());
        $('#exampleModalLabel').text($(this).text());
        $('#id-schedule').val($(this).data('id-schedule'));
        let formData = new FormData();
        formData.append('id-progres-schedule', $(this).data('id-schedule'));
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Detail/detail_foto_progres'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert('ya')
                $('.foto_progres').html('');
                $('#data_foto_progres').html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
</script>