<style>
    .bg-pekerjaan-selesai {
        background: aliceblue;
    }

    .bg-pekerjaan-progres {
        background: beige;
    }

    .btn-add-foto {
        font-size: small;
        border: 2px solid;
        padding: 4px;
        border-radius: 5px;
        background: white;
    }
</style>

<div class="card">
    <?php
    // $no = 1;
    foreach ($data_kategori_schedule as $kategori) :
        $kategori_pekerjaan = $kategori->kategori_pekerjaan;
    ?>
        <!-- <div class="row"> -->
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
                        <th>CHEKLIST</th>
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
                                <td>
                                    <?php
                                    $tahap = 1;
                                    for ($i = 0; $i < $data->tahapan_selesai; $i++) {
                                        $thpn = $tahap++;
                                    ?>
                                        <input class="custom-control-input ceklis-tahapan" checked type="checkbox" id="ceklis-<?php echo $data->id_schedule; ?>" data-id-schedule="<?php echo $data->id_schedule; ?>" data-tahapan="<?php echo $data->tahapan; ?>" value="<?php echo $thpn; ?>" style="width: 15px;height: 15px; margin-right: 1rem;">
                                        <!-- <label for="ceklis-<?php echo $thpn; ?>" class="custom-control-label"><?php echo $thpn; ?></label> -->
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    $nilai = $data->tahapan -  $data->tahapan_selesai;
                                    for ($i = 0; $i < $nilai; $i++) {
                                        $thpn = $tahap++;
                                    ?>
                                        <input class="custom-control-input ceklis-tahapan" type="checkbox" id="ceklis-<?php echo $data->id_schedule; ?>" data-id-schedule="<?php echo $data->id_schedule; ?>" data-tahapan="<?php echo $data->tahapan; ?>" value="<?php echo $thpn; ?>" style="width: 15px;height: 15px; margin-right: 1rem;">
                                        <!-- <label for="ceklis-<?php echo $thpn; ?>" class="custom-control-label"><?php echo $thpn; ?></label> -->
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td hidden class="bagi-<?php echo $data->id_schedule; ?>"></td>
                                <td hidden class="status-<?php echo $data->id_schedule; ?>"><?php echo $data->status_schedule; ?></td>
                            </tr>
                            <script>
                                var bagi_tahapan = parseFloat($('.bobot-<?php echo $data->id_schedule; ?> ').text()) / parseInt(<?php echo $data->tahapan; ?>)
                                var bagi = (bagi_tahapan) / 100 * 100;
                                $('#ceklis-<?php echo $data->id_schedule; ?>').val(bagi.toFixed(5));
                                $('.bagi-<?php echo $data->id_schedule; ?>').text(bagi.toFixed(5));
                                if ($('.status-<?php echo $data->id_schedule; ?>').text() == 'selesai') {
                                    $('#status-schedule-<?php echo $data->id_schedule; ?>').addClass('bg-pekerjaan-selesai')
                                } else {

                                }
                                if ($('.tahapan-<?php echo $data->id_schedule; ?>').text() == $('.tahapan-selesai-<?php echo $data->id_schedule; ?>').text()) {

                                } else if ($('.tahapan-selesai-<?php echo $data->id_schedule; ?>').text() == '0') {

                                    // $('#status-schedule-<?php echo $data->id_schedule; ?>').addClass('bg-pekerjaan-progres')
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
</div>

<!-- Modal -->

<script>
    $('.add-foto').click(function() {
        $('#exampleModalLabel').text($(this).text());
        $('#id-schedule').val($(this).data('id-schedule'));
        let formData = new FormData();
        formData.append('id-progres-schedule', $(this).data('id-schedule'));
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('time_schedule/data_foto_progres'); ?>",
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
    var id_project = $('#id-project').val();
    load_chart();
    $('.ceklis-tahapan').click(function(e) {
        // $('.ceklis-label-foto').not(this).prop('checked', false);
        var id_project = $('#id-project').val();
        var id_schedule = $(this).data('id-schedule');
        if ($('.tahapan-pekerjaan-' + id_schedule).text() == '') {
            $('.tahapan-pekerjaan-' + id_schedule).text('0')
        } else {
            $('.tahapan-pekerjaan-' + id_schedule).text()
        }
        if ($(this).is(":checked")) {

            var tahapan = $('.tahapan-' + id_schedule).text();
            $('.tahapan-' + id_schedule).text($('.tahapan-' + id_schedule).text());
            var tahapan_selesai = parseInt($('.tahapan-selesai-' + id_schedule).text()) + parseInt(1);
            $('.tahapan-selesai-' + id_schedule).text(tahapan_selesai);
            var tahapan_pekerjaan = parseFloat($('.bagi-' + id_schedule).text()) * parseInt($('.tahapan-selesai-' + id_schedule).text());
            $('.tahapan-pekerjaan-' + id_schedule).text(tahapan_pekerjaan);
            var a = ($('.bagi-' + id_schedule).text() / 100) * 100;
            var b = ($('#jumlah-bobot-' + id_project).text() / 100) * 100;
            var jumlah_bobot = (+b + +a);
            hasil = jumlah_bobot;
            var total = (hasil / 100) * 100;
            $('#jumlah-bobot-' + id_project).text(total.toFixed(5));

        } else {
            var tahapan = $('.tahapan-' + id_schedule).text();
            var tahapan_selesai = parseInt($('.tahapan-selesai-' + id_schedule).text()) - parseInt(1)
            $('.tahapan-selesai-' + id_schedule).text(tahapan_selesai);
            var tahapan_pekerjaan = parseFloat($('.tahapan-pekerjaan-' + id_schedule).text() - $('.bagi-' + id_schedule).text())
            $('.tahapan-pekerjaan-' + id_schedule).text(tahapan_pekerjaan);
            var a = $('.bagi-' + id_schedule).text();
            var b = $('#jumlah-bobot-' + id_project).text();
            var jumlah_bobot = parseFloat(b) - parseFloat(a);
            hasil = jumlah_bobot;
            var total = (hasil / 100) * 100;
            $('#jumlah-bobot-' + id_project).text(total.toFixed(5));
            if ($('.tahapan-selesai-' + id_schedule).text() == '0') {
                $('.tahapan-pekerjaan-' + id_schedule).text('0')
                var tahapan_pekerjaan = '0'
            } else {
                $('#jumlah-bobot-' + id_project).text(jumlah_bobot);
                $('.tahapan-pekerjaan-' + id_schedule).text()
            }
        }
        if (tahapan == tahapan_selesai) {
            var status_schedule = 'selesai'
            $('#status-schedule-' + id_schedule).addClass('bg-pekerjaan-selesai');
            $('#status-schedule-' + id_schedule).removeClass('bg-pekerjaan-progres');
        } else if (tahapan_selesai == '0') {
            var status_schedule = ''
            $('#status-schedule-' + id_schedule).removeClass('bg-pekerjaan-selesai');
            $('#status-schedule-' + id_schedule).removeClass('bg-pekerjaan-progres');

        } else {
            var status_schedule = ''
            $('#status-schedule-' + id_schedule).addClass('bg-pekerjaan-progres');
            $('#status-schedule-' + id_schedule).removeClass('bg-pekerjaan-selesai');

        }

        let formData = new FormData();
        formData.append('id-schedule', id_schedule);
        formData.append('tahapan', tahapan);
        formData.append('tahapan-selesai', tahapan_selesai);
        formData.append('tahapan-pekerjaan', tahapan_pekerjaan);
        formData.append('status-schedule', status_schedule);
        formData.append('id-project', id_project);
        formData.append('jumlah-bobot', $('#jumlah-bobot-' + id_project).text());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('time_schedule/update_tahapan_schedule'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                load_chart();
                // alert('ya')
                // $('.schedule').html('');
                // $('#data-schedule-' + id_project).html(data);
                // $('#weekly-' + $('#project-progres').val()).click();

                // load_data_rekap_material()

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });

    function load_chart() {
        var id_project = $('#id-project').val();
        let formData = new FormData();
        formData.append('id-project', id_project);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('time_schedule/data_chart_schedule'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert('ya')
                $('.chart').html('');
                $('#data-chart-' + id_project).html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }


    function removeCommas(nStr) {

        return nStr.split('.').join(",");
    }
</script>