<div class="row">
    <div class="col">
        <div id="add-material" class="row" hidden>
            <div class="col-lg-3 col-md-3 col-8">
                <label for="nm-material">Nama item</label>
                <div class="form-group">
                    <input type="text" id="nm-material" class="form-control" placeholder="Nama ..." autocomplete="off" required="true">
                </div>
            </div>
            <div class="col-lg-1 col-md-2 col-4">
                <label for="qty">Quantity</label>
                <div class="form-group">
                    <input type="number" id="qty" class="form-control" placeholder="Quantity ..." autocomplete="off" required="true">
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-6">
                <label for="satuan">Satuan</label>
                <div class="form-group">
                    <input type="text" id="satuan" class="form-control" placeholder="Satuan ..." autocomplete="off" required="true">
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-6">
                <label for="hrg-satuan">Hrg Satuan</label>
                <div class="form-group">
                    <input type="text" id="hrg-satuan" class="form-control" placeholder="Hrg Satuan ..." autocomplete="off" required="true">
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <label for="total-material">Total Harga</label>
                <div class="form-group">
                    <input type="text" id="total-material" class="form-control" placeholder="Total ..." autocomplete="off" required="true">
                    <input type="text" id="hrg-material" class="form-control" value="0" hidden>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <button type="button" class="btn-batal-material btn btn-sm btn-outline-danger" hidden><i class="fa-regular fa-pen-to-square"></i> Tutup / Batal</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn-save-material btn btn-sm float-right btn-outline-success" value="simpan" hidden><i class="fa-solid fa-cloud-arrow-up"></i> Simpan material</button>
                <button type="button" class="btn-add-material btn btn-sm float-right btn-outline-info"><i class="fa-solid fa-plus"></i> Tambah material</button>
            </div>
        </div>
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
                                <th>ACTION</th>
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
                                    <td>
                                        <button type="button" class="btn-edit-material btn btn-sm btn-outline-warning" data-id-material="<?php echo $data->id_material; ?>" data-nm-material="<?php echo $data->nm_material; ?>" data-total-material="<?php echo $data->total_material; ?>"><i class="fa-regular fa-pen-to-square"></i></button>
                                        <button type="button" class="btn-delete-material btn btn-sm btn-outline-danger" data-id-material="<?php echo $data->id_material; ?>" data-total-material="<?php echo $data->total_material; ?>"><i class="fa-solid fa-delete-left"></i></button>
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
    var id_project = $('#id-project').val();
    var table = document.getElementById("nilai"),
        sumHsl = 0;
    for (var t = 1; t < table.rows.length; t++) {
        sumHsl = sumHsl + parseFloat(removeCommas(table.rows[t].cells[5].innerHTML));
    }
    if ($('#material-status').val() == '') {
        $("#subtotal-material-" + id_project).text(addCommas(sumHsl));
        $("#label-material-lain-lain").text('Material');
    } else if ($('#material-status').val() == 'lainnya') {
        $("#subtotal-lainnya-" + id_project).text(addCommas(sumHsl));
        $("#label-material-lain-lain").text('Lain Lain');
    }

    $('#add-material').removeAttr('hidden', true).hide();
    $('.btn-batal-material,.btn-save-material').removeAttr('hidden', true).hide();

    update_total_rekap();
    subtotal_weekly();
    $('.btn-add-material').click(function(e) {
        add_material();
    });

    $('.btn-batal-material').click(function(e) {
        cencel_add_material();
        form_default();
    });

    $('.btn-edit-material').click(function(e) {
        add_material();
        $('.btn-save-material').val('edit');

        $('#id-material').val($(this).data('id-material'))
        $('#nm-material').val($(this).data('nm-material'))
        $('#total-material').val(removeCommas($(this).data('total-material')))
        $('#hrg-material').val(removeCommas($(this).data('total-material')))
    });

    $(document).on("input", "#qty,#hrg-satuan", function(e) {

        var subtotal = parseFloat(removeCommas($('#hrg-satuan').val())) * parseFloat($('#qty').val())
        $('#total-material').val(subtotal);
    });
    $(document).on("input", "#qty,#total-material", function(e) {

        var subtotal = parseFloat(removeCommas($('#total-material').val())) / parseFloat($('#qty').val())
        $('#hrg-satuan').val(subtotal);
    });
    $('.btn-save-material').click(function(e) {
        if ($('#total-material').val() == '') {
            $('#total-material').val('0')
        } else {
            $('#total-material').val()
        }
        if ($('#subtotal-project-' + id_project).text() == '') {
            $('#subtotal-project-' + id_project).text('0')
        } else {
            $('#subtotal-project-' + id_project).text()
        }
        var subtotal = parseFloat(removeCommas($('#total-material').val())) + parseFloat(removeCommas($('#subtotal-project-' + id_project).text())) - parseFloat($('#hrg-material').val());
        $('#subtotal-project-' + id_project).text(addCommas(subtotal));
        var action = $('.btn-save-material').val();
        let formData = new FormData();
        formData.append('id-material', $('#id-material').val());
        formData.append('id-material-project', $('#id-project').val());
        formData.append('id-material-weekly', $('#project-progres').val());
        formData.append('nm-material', $('#nm-material').val());
        formData.append('qty', $('#qty').val());
        formData.append('satuan', $('#satuan').val());
        formData.append('hrg-satuan', $('#hrg-satuan').val());
        formData.append('total-material', $('#total-material').val());
        formData.append('status-material', $('#material-status').val());
        formData.append('total-biaya', $('#subtotal-project-' + id_project).text());
        if (action == 'simpan') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('project/simpan_data_material'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert('berhasil');
                    form_default();
                    load_data_rekap_material();
                },
                error: function() {
                    alert("Data Gagal Diuploadzzzzz");
                }
            });
        } else if (action == 'edit') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('project/edit_data_material'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert('berhasil');
                    form_default();
                    load_data_rekap_material();

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });
    add_material();

    $('.btn-delete-material').click(function(e) {
        var el = this;

        // Delete id
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            var subtotal = parseFloat(removeCommas($('#subtotal-project-' + id_project).text()) - parseFloat(removeCommas($(this).data('total-material'))));
            $('#subtotal-project-' + id_project).text(addCommas(subtotal));
            let formData = new FormData();
            formData.append('id-material', $(this).data('id-material'));
            formData.append('total-material', $(this).data('total-material'));
            formData.append('id-project', $('#id-project').val());
            formData.append('total-biaya', $('#subtotal-project-' + id_project).text());

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('project/delete_data_material') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(300, function() {
                        $(this).remove();
                        load_data_rekap_material();

                    });
                }
            });
        }
    });



    function add_material() {
        $('#add-material').show();
        $('.btn-save-material').show();
        $('.btn-add-material').hide();
        $('.btn-batal-material,.btn-save-material').show();
    }

    function cencel_add_material() {
        $('#add-material').hide();
        $('.btn-save-material').hide();
        $('.btn-add-material').show();
        $('.btn-batal-material,.btn-save-material').hide();
    }

    function form_default() {
        $('.btn-save-material').val('simpan');
        $('#id-material#nm-material,#total-material').val('');
    }
    new AutoNumeric('#total-material', autoNumericOption);
    new AutoNumeric('#hrg-satuan', autoNumericOption);
</script>