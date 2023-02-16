<style>
    .bg-tr-gaji-blm-disimpan {
        background: #35a4dc33 !important;
    }
</style>
<div id="add-tenaga" class="row mb-2">
    <div class="col-12">
        <select id="select-tenaga" class="js-states form-control col-12">
            <option value=""></option>
            <?php
            $no = 1;
            foreach ($data_tenaga as $data) :
            ?>
                <option id="tenaga-<?php echo $data->id_tenaga; ?>" value="<?php echo $data->id_tenaga; ?>"><?php echo $data->nm_tenaga; ?></option>

            <?php
            endforeach;
            ?>
        </select>
    </div>
</div>
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
                        foreach ($data_rekap_gaji_tenaga as $data) {

                        ?>
                            <tr id="tr-gaji-h-<?php echo $data->id_rekap_tenaga; ?>" class=" tr-gaji">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data->nm_tenaga; ?></td>
                                <td class="hrg-h-<?php echo $data->id_rekap_tenaga; ?>"><?php echo $data->hrg_tenaga; ?></td>

                                <td>
                                    <input type="text" id="jmlh-h-<?php echo $data->id_rekap_tenaga; ?>" class="jmlh-h form-control" data-insert="hari" data-action="update" data-id-tenaga="<?php echo $data->id_rekap_tenaga; ?>" value="<?php echo $data->jmlh_h; ?>">
                                </td>
                                <td class="total-h-<?php echo $data->id_rekap_tenaga; ?>"><?php echo $data->total_gaji_h; ?></td>
                                <td class="status-gaji-<?php echo $data->id_rekap_tenaga; ?>"><?php echo $data->status_gaji; ?></td>

                                <td>
                                    <button type="button" class="btn-delete-gaji-tenaga btn btn-sm btn-outline-danger" data-total-gaji="<?php echo $data->total_gaji_h; ?>" data-id-rekap-tenaga="<?php echo $data->id_rekap_tenaga; ?>" data-action="rows-update" data-id-tenaga="<?php echo $data->id_tenaga; ?>"><i class="fa-solid fa-delete-left"></i></button>
                                </td>
                                <script>
                                    if ($('.status-gaji-<?php echo $data->id_rekap_tenaga; ?>').text() == 'blm_disimpan') {
                                        $('#tr-gaji-h-<?php echo $data->id_rekap_tenaga; ?>').addClass('bg-tr-gaji-blm-disimpan');
                                        $('#tr-gaji-l-<?php echo $data->id_rekap_tenaga; ?>').addClass('bg-tr-gaji-blm-disimpan');
                                    }
                                </script>
                            </tr>
                        <?php
                        }
                        ?>
                        <?php
                        $no = 1;
                        foreach ($data_tenaga_project as $data) :
                            $id_tenaga = $data->id_tenaga;
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data->nm_tenaga; ?></td>
                                <td class="hrg-h-<?php echo $data->id_tenaga; ?>"><?php echo $data->hrg_tenaga; ?></td>
                                <td>
                                    <input type="text" id="jmlh-h-<?php echo $data->id_tenaga; ?>" class="jmlh-h form-control" data-insert="hari" data-action="insert" data-id-tenaga="<?php echo $data->id_tenaga; ?>" placeholder="Jumlah Hari ...">
                                </td>
                                <td class="total-h-<?php echo $data->id_tenaga; ?>">0</td>
                                <td>
                                    <button type="button" class="btn-delete-gaji-tenaga btn btn-sm btn-outline-danger" data-action="rows-insert" data-id-tenaga="<?php echo $data->id_tenaga; ?>"><i class="fa-solid fa-delete-left"></i></button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
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
                            <tr id="tr-gaji-l-<?php echo $data->id_rekap_tenaga; ?>" class=" tr-gaji">
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
                                <td>
                                    <input type="text" id="total-l-<?php echo $data->id_rekap_tenaga; ?>" class="total-lembur form-control" data-insert="lembur" data-action="update" data-id-tenaga="<?php echo $data->id_rekap_tenaga; ?>" value="">
                                </td>
                                <!-- <td hidden>0</td> -->
                            </tr>
                            <script>
                                $('#total-l-<?php echo $data->id_rekap_tenaga; ?>').val(removeCommas($('.total-lembur-text-<?php echo $data->id_rekap_tenaga; ?>').text()))
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
<div class="row">
    <div class="col-12">
        <button type="button" class="btn-simpan-rekap-tenaga btn btn-sm float- btn-outline-info col-12"><i class="fa-solid fa-cloud-arrow-up"></i> Simpan rekap gaji Tenaga</button>
    </div>
</div>

<?php
$no = 1;
foreach ($data_tenaga_blm_disimpan as $data) :
    // echo $data->id_rekap_tenaga;
?>
    <script>
        $('#action-btn-simpan-rekap-tenaga').val('show')
    </script>
<?php
endforeach;
?>

<input type="text" id="id-tenaga" value="" hidden>
<input type="text" id="id-rekap-tenaga" value="" hidden>
<input type="text" id="action-input-h" value="" hidden>

<script>
    // rekap_gaji_blm_disimpan();
    $('.btn-simpan-rekap-tenaga').hide();
    if ($('#action-btn-simpan-rekap-tenaga').val() == 'show') {

        $('.btn-simpan-rekap-tenaga').show();
    } else {
        $('.btn-simpan-rekap-tenaga').hide();
    }
    var id_project = $('#id-project').val();
    total_gaji_harian();
    total_gaji_lemburan();
    // $('.total-lembur').val(addCommas())

    var subtotal_tenaga = parseFloat(removeCommas($('#subtotal-tenaga-h').text())) + parseFloat(removeCommas($('#subtotal-tenaga-l').text()))
    $("#subtotal-tenaga-" + id_project).text(addCommas(subtotal_tenaga));
    update_total_rekap();
    subtotal_weekly();

    $('#add-gaji-tenaga, #add-lembur-tenaga').removeAttr('hidden', true).hide();
    $('#select-tenaga').change(function(e) {
        // alert($("#select-tenaga").find(':selected').val())
        let formData = new FormData();
        formData.append('id-project', $('#id-project').val());
        formData.append('project-progres', $('#project-progres').val());
        formData.append('id-tenaga', $("#select-tenaga").find(':selected').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('project/add_tenaga_project'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert('ya')
                load_data_rekap_tenaga();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
    $('.total-lembur').click(function(e) {

        if ($('#action-btn-simpan-rekap-tenaga').val() == 'show') {
            $('#total-gaji-tenaga').val()
        } else {
            $('#total-gaji-tenaga').val($("#subtotal-tenaga-" + id_project).text())
        }
    });
    $('.jmlh-h').click(function(e) {
        if ($('#action-btn-simpan-rekap-tenaga').val() == 'show') {
            $('#total-gaji-tenaga').val()
        } else {
            $('#total-gaji-tenaga').val($("#subtotal-tenaga-" + id_project).text())
        }
        // alert()
        // $('#total-gaji-tenaga').val($("#subtotal-tenaga-" + id_project).text())
    });
    $('.btn-simpan-rekap-tenaga').click(function(e) {
        // $('#total-gaji-tenaga').val($("#subtotal-tenaga-" + id_project).text())
        var subtotal = parseFloat(removeCommas($('#subtotal-project-' + id_project).text())) - parseFloat(removeCommas($('#total-gaji-tenaga').val())) + parseFloat(removeCommas($("#subtotal-tenaga-" + id_project).text()));
        $('#subtotal-project-' + id_project).text(addCommas(subtotal));
        $('#total-gaji-tenaga').val('0')
        let formData = new FormData();
        formData.append('id-project', id_project);
        formData.append('project-progres', $('#project-progres').val());

        // formData.append('id-project', $('#id-project').val());
        // formData.append('weekly', $('#project-progres').val());
        formData.append('total-tenaga-weekly', $('#subtotal-tenaga-' + id_project).text());


        formData.append('total-biaya', $('#subtotal-project-' + id_project).text());
        formData.append('total-biaya', $('#subtotal-project-' + id_project).text());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('project/update_total_biaya'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert('ya')
                $('.btn-simpan-rekap-tenaga').hide();
                $('#action-btn-simpan-rekap-tenaga').val('');
                $('.tr-gaji').removeClass('bg-tr-gaji-blm-disimpan');
                // update_total_rekap_tenaga();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
    $('.btn-edit-gaji-tenaga').click(function() {
        $('#add-gaji-tenaga').show();
        $('#add-tenaga').hide();
        $('#id-rekap-tenaga').val($(this).data('id-rekap-tenaga'));
        $('#jmlh-h').val($(this).data('jmlh-h'));
        $('#total-gaji-h').val($(this).data('total-gaji-h'));
        $('#id-tenaga').val($(this).data('id-tenaga'))
        $('#nm-tenaga').val($(this).data('nm-tenaga'))
        $('#hrg-tenaga').val($(this).data('hrg-tenaga'));
        $('#hrg-tenaga-lembur').val($(this).data('hrg-tenaga-lembur'))
        if ($('#jmlh-h').val() == '') {

            $('.btn-save-gaji-tenaga').val('insert');
        } else {
            $('.btn-save-gaji-tenaga').val('update');
        }
    });
    $('.btn-batal-gaji-tenaga').click(function() {
        $('#add-gaji-tenaga').hide();
        $('#add-tenaga').show();
    });
    $('#ceklis-lembur').click(function(e) {
        if ($(this).is(":checked")) {
            $('#add-lembur-tenaga').show()
        } else {
            $('#add-lembur-tenaga').hide()

        }
    });

    $('.btn-delete-gaji-tenaga').click(function() {
        var el = this;

        // Delete id
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            console.log($(this).data('id-rekap-tenaga'))
            if ($(this).data('action') == 'rows-update') {
                console.log($('.total-h-' + $(this).data('id-rekap-tenaga')).text())
                console.log($('#total-l-' + $(this).data('id-rekap-tenaga')).val())
                var x = parseFloat(removeCommas($('.total-h-' + $(this).data('id-rekap-tenaga')).text())) + parseFloat(removeCommas($('#total-l-' + $(this).data('id-rekap-tenaga')).val()));
                console.log(x);
                var subtotal = parseFloat(removeCommas($('#subtotal-project-' + id_project).text())) - parseFloat(x);
                $('#subtotal-project-' + id_project).text(addCommas(subtotal));
            }
            let formData = new FormData();
            formData.append('id-project', id_project);
            formData.append('id-tenaga', $(this).data('id-tenaga'));
            formData.append('action', $(this).data('action'));
            formData.append('id-rekap-tenaga', $(this).data('id-rekap-tenaga'));
            formData.append('total-biaya', $('#subtotal-project-' + id_project).text());
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('project/delete_tenaga_project') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(300, function() {
                        $(this).remove();
                        load_data_rekap_tenaga();
                        subtotal_weekly();
                    });
                }
            });
        }
    });
    new AutoNumeric('#total-lembur', autoNumericOption);

    function rekap_gaji_blm_disimpan() {

        var id_project = $('#id-project').val();
        var table = document.getElementById("gaji-blm-disimpan"),
            sumHsl_hh = 0;
        for (var t = 1; t < table.rows.length; t++) {
            // sumHsl_hh = sumHsl_hh + parseFloat(table.rows[t].cells[0].innerHTML);
            sumHsl_hh = sumHsl_hh + parseFloat(removeCommas(table.rows[t].cells[1].innerHTML));
            // sumHsll = sumHsll + parseFloat(removeCommas(table.rows[t].cells[2].innerHTML));
        }
    }


    function total_gaji_harian() {
        var table_h = document.getElementById("nilai-harian"),
            sumHsl_h = 0;
        for (var t = 1; t < table_h.rows.length; t++) {
            sumHsl_h = sumHsl_h + parseFloat(removeCommas(table_h.rows[t].cells[4].innerHTML));
        }
        $("#subtotal-tenaga-h").text(addCommas(sumHsl_h));
        total_gaji_tenaga();
        update_total_rekap();

    }

    function total_gaji_lemburan() {
        var table_l = document.getElementById("nilai-lembur"),
            sumHsl_l = 0;
        for (var t = 1; t < table_l.rows.length; t++) {
            sumHsl_l = sumHsl_l + parseFloat(removeCommas(table_l.rows[t].cells[4].innerHTML));
        }
        $("#subtotal-tenaga-l").text(addCommas(sumHsl_l));
        total_gaji_tenaga();
        update_total_rekap();

    }

    function total_gaji_tenaga() {
        var id_project = $('#id-project').val();

        var subtotal_tenaga = parseFloat(removeCommas($('#subtotal-tenaga-h').text())) + parseFloat(removeCommas($('#subtotal-tenaga-l').text()))
        $("#subtotal-tenaga-" + id_project).text(addCommas(subtotal_tenaga));


    }
    $("#select-tenaga").select2({
        placeholder: "Tambah tenaga",
        allowClear: true
    });
</script>