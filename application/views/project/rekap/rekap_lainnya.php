<div class="row">
    <div class="col">
        <div id="add-material" class="row" hidden>
            <div class="col-lg-6 col-md-6 col-12">
                <label for="nm-material">Material</label>
                <div class="form-group">
                    <input type="text" id="nm-material" class="form-control" placeholder="Nama ..." autocomplete="off" required="true">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label for="total-material">Material</label>
                <div class="form-group">
                    <input type="text" id="total-material" class="form-control" placeholder="Total ..." autocomplete="off" required="true">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <!-- <a id="herf-batal" href="#main" hidden> -->
                <button type="button" class="btn-batal-material btn btn-sm btn-outline-danger" hidden><i class="fa-regular fa-pen-to-square"></i> Batal</button>
                <!-- </a> -->
            </div>
            <div class="col-6">
                <!-- <a id="herf-simpan" href="#main"> -->
                <button type="button" class="btn-save-material btn btn-sm float-right btn-outline-success" value="simpan" hidden><i class="fa-solid fa-cloud-arrow-up"></i> Simpan material</button>
                <button type="button" class="btn-add-material btn btn-sm float-right btn-outline-info"><i class="fa-solid fa-plus"></i> Tambah material</button>
                <!-- </a> -->
            </div>
        </div>
        <div class="row mt-2">
            <div class="card">
                <div class="card-header p-0">
                    <center>
                        <h6 class="mb-0" style="background: turquoise;">Material</h6>
                    </center>
                </div>
                <div class="card-body p-0" style="overflow-x:auto;max-height: 23rem;">
                    <table id="nilai" class="table table-head-fixed text-nowrap table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NAMA</th>
                                <th>TOTAL</th>
                                <th>ACTIONaaaaaaaaaaaaaaa</th>
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
                                    <td><?php echo $data->total_material; ?></td>
                                    <td>
                                        <button type="button" class="btn-edit-material btn btn-sm btn-outline-warning" data-id-material="<?php echo $data->id_material; ?>" data-nm-material="<?php echo $data->nm_material; ?>" data-total-material="<?php echo $data->total_material; ?>"><i class="fa-regular fa-pen-to-square"></i></button>
                                        <button type="button" class="btn-delete-material btn btn-sm btn-outline-danger" data-id-material="<?php echo $data->id_material; ?>"><i class="fa-solid fa-delete-left"></i></button>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- <br> -->
        <input type="text" id="id-material" value="" hidden>
    </div>
</div>

<script>
    // var id_project = $('#id-project').val();
    // var table = document.getElementById("nilai"),
    //     sumHsl = 0;
    // for (var t = 1; t < table.rows.length; t++) {
    //     sumHsl = sumHsl + parseFloat(removeCommas(table.rows[t].cells[2].innerHTML));
    // }
    // $("#subtotal-material-" + id_project).text(addCommas(sumHsl));

    // $('#add-material').removeAttr('hidden', true).hide();
    // $('.btn-batal-material,.btn-save-material').removeAttr('hidden', true).hide();

    // update_total_rekap();
    // subtotal_weekly();
    // $('.btn-add-material').click(function(e) {
    //     add_material();
    // });

    // $('.btn-batal-material').click(function(e) {
    //     cencel_add_material();
    //     form_default();
    // });

    // $('.btn-edit-material').click(function(e) {
    //     add_material();
    //     $('.btn-save-material').val('edit');

    //     $('#id-material').val($(this).data('id-material'))
    //     $('#nm-material').val($(this).data('nm-material'))
    //     $('#total-material').val(removeCommas($(this).data('total-material')))
    // });

    // $('.btn-save-material').click(function(e) {
    //     if ($('#total-material').val() == '') {
    //         $('#total-material').val('0')
    //     } else {
    //         $('#total-material').val()
    //     }
    //     var action = $('.btn-save-material').val();
    //     let formData = new FormData();
    //     formData.append('id-material', $('#id-material').val());
    //     formData.append('id-material-project', $('#id-project').val());
    //     formData.append('id-material-weekly', $('#project-progres').val());
    //     formData.append('nm-material', $('#nm-material').val());
    //     formData.append('total-material', $('#total-material').val());
    //     if (action == 'simpan') {
    //         $.ajax({
    //             type: 'POST',
    //             url: "<?php echo site_url('project/simpan_data_material'); ?>",
    //             data: formData,
    //             cache: false,
    //             processData: false,
    //             contentType: false,
    //             success: function(data) {
    //                 alert('berhasil');
    //                 form_default();
    //                 load_data_rekap_material();
    //                 alert($('#subtotal-material-' + id_project).text());
    //             },
    //             error: function() {
    //                 alert("Data Gagal Diuploadzzzzz");
    //             }
    //         });
    //     } else if (action == 'edit') {
    //         $.ajax({
    //             type: 'POST',
    //             url: "<?php echo site_url('project/edit_data_material'); ?>",
    //             data: formData,
    //             cache: false,
    //             processData: false,
    //             contentType: false,
    //             success: function(data) {
    //                 alert('berhasil');
    //                 form_default();
    //                 load_data_rekap_material();

    //             },
    //             error: function() {
    //                 alert("Data Gagal Diupload");
    //             }
    //         });
    //     }
    // });

    // $('.btn-delete-material').click(function(e) {
    //     var el = this;

    //     // Delete id
    //     var confirmalert = confirm("Are you sure?");
    //     if (confirmalert == true) {
    //         let formData = new FormData();
    //         formData.append('id-material', $(this).data('id-material'));
    //         $.ajax({
    //             type: 'POST',
    //             url: "<?php echo site_url('project/delete_data_material') ?>",
    //             data: formData,
    //             cache: false,
    //             processData: false,
    //             contentType: false,
    //             success: function(msg) {
    //                 $(el).closest('tr').css('background', 'tomato');
    //                 $(el).closest('tr').fadeOut(300, function() {
    //                     $(this).remove();
    //                 });
    //             }
    //         });
    //     }
    // });



    // function add_material() {
    //     $('#add-material').show();
    //     $('.btn-save-material').show();
    //     $('.btn-add-material').hide();
    //     $('.btn-batal-material,.btn-save-material').show();
    // }

    // function cencel_add_material() {
    //     $('#add-material').hide();
    //     $('.btn-save-material').hide();
    //     $('.btn-add-material').show();
    //     $('.btn-batal-material,.btn-save-material').hide();
    // }

    // function form_default() {
    //     $('.btn-save-material').val('simpan');
    //     $('#id-material#nm-material,#total-material').val('');
    // }
    // new AutoNumeric('#total-material', autoNumericOption);
</script>