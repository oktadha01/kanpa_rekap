<table class="table table-head-fixed text-nowrap table-hover mt-3">
    <thead>
        <tr>
            <th>No.</th>
            <th>NAMA</th>
            <th>PRIVILAGE</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data_user as $data) :
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data->nm_user; ?></td>
                <td><?php echo $data->id_privilage_user; ?></td>
                <td>
                    <button type="button" class="btn-edit-user btn btn-sm btn-outline-warning" data-id-user="<?php echo $data->id_user; ?>" data-nm-user="<?php echo $data->nm_user; ?>" data-id-privilage-user="<?php echo $data->id_privilage_user; ?>"><i class="fa-regular fa-pen-to-square"></i></button>
                    <button type="button" class="btn-delete-user btn btn-sm btn-outline-danger" data-id-user="<?php echo $data->id_user; ?>"><i class="fa-solid fa-delete-left"></i></button>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>
<script>
    $('.btn-edit-user').click(function(e) {
        form_add_user();
        $('#btn-save-user').val('edit');
        $('#input-pass').hide();
        $('#ceklis-pass').show();
        $('#id-user').val($(this).data('id-user'));
        $('#nm-user').val($(this).data('nm-user'));
        $('#select-privilage').val($(this).data('id-privilage-user'));
        $('#select-privilage').select2().trigger('change');
    });
    $('.btn-delete-user').click(function(e) {
        var el = this;

        // Delete id
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-user', $(this).data('id-user'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('user/delete_data_user') ?>",
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
</script>