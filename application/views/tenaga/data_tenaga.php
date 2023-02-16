<div class="col">
    <div class="card">
        <div class="card-body p-0" style="overflow-x:auto;height: 28rem;">
            <table class="table table-head-fixed text-nowrap table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NAMA</th>
                        <th>HARGA (H)</th>
                        <th>HARGA (L)</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_tenaga as $data) :
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data->nm_tenaga; ?> </td>
                            <td><?php echo $data->hrg_tenaga; ?></td>
                            <td><?php echo $data->hrg_tenaga_lembur; ?></td>
                            <td><?php echo $data->status_tenaga; ?></td>
                            <td>
                                <button type="button" class="btn-edit-tenaga btn btn-sm btn-outline-warning" data-id-tenaga="<?php echo $data->id_tenaga; ?>" data-nm-tenaga="<?php echo $data->nm_tenaga; ?>" data-hrg-tenaga="<?php echo $data->hrg_tenaga; ?>" data-hrg-tenaga-lembur="<?php echo $data->hrg_tenaga_lembur; ?>"><i class="fa-regular fa-pen-to-square"></i></button>
                                <button type="button" class="btn-delete-tenaga btn btn-sm btn-outline-danger" data-id-tenaga="<?php echo $data->id_tenaga; ?>"><i class="fa-solid fa-delete-left"></i></button>
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
<script>
    $('.btn-edit-tenaga').click(function(e) {
        $('.btn-simpan-tenaga').val('edit');
        $('#id-tenaga').val($(this).data('id-tenaga'));
        $('#nm-tenaga').val($(this).data('nm-tenaga'));
        $('#hrg-tenaga').val(removeCommas($(this).data('hrg-tenaga')));
        $('#hrg-tenaga-lembur').val(removeCommas($(this).data('hrg-tenaga-lembur')));
    });

    $('.btn-delete-tenaga').click(function(e) {
        var el = this;

        // Delete id
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-tenaga', $(this).data('id-tenaga'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('tenaga/delete_data_tenaga') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(300, function() {
                        $(this).remove();
                    });
                }
            });
        }
    });

    function addCommas(nStr) {
        nStr += '';
        var x = nStr.split(',');
        var x1 = x[0];
        var x2 = x.length > 1 ? ',' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }
</script>