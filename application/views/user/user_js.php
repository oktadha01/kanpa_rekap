<script>
    $(document).ready(function() {
        $('#form-add-user,#btn-batal-user,#btn-save-user').hide().removeAttr('hidden', true);
        load_data_user();
    })
    $('#btn-add-user').click(function(e) {
        form_add_user();
        $('#input-pass').show();
        $('#ceklis-pass').hide();
    });
    $('#btn-batal-user').click(function(e) {
        close_form_user();
        $('#input-pass').hide();
        $('#ceklis-pass').hide();
    });
    $('#btn-save-user').click(function(e) {
        action = $(this).val();
        if ($(this).val() == 'edit-pass') {
            if ($('#password').val() == '') {
                alert('Password tidak boleh kosong !!');
            } else {
                simpan_data_user();
            }
        } else {
            simpan_data_user();
        }

        function simpan_data_user() {
            let formData = new FormData();
            formData.append('id-user', $('#id-user').val());
            formData.append('nm-user', $('#nm-user').val());
            formData.append('password', $('#password').val());
            formData.append('privilage', $("#select-privilage").find(':selected').text());
            formData.append('action', action);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('user/simpan_data_user'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert(data)
                    alert('berhasil');
                    close_form_user();
                    load_data_user();
                },
                error: function() {
                    alert("Data Gagal Diuploadzzzzz");
                }
            });
        }
    });

    $('#ceklis-ubah-pass').click(function(e) {
        if ($(this).is(":checked")) {
            $('#input-pass').show();
            $('#btn-save-user').val('edit-pass');

        } else {
            $('#btn-save-user').val('edit');
            $('#input-pass').hide();
        }
    });

    function form_add_user() {
        $('#btn-add-user').hide();
        $('#form-add-user,#btn-batal-user,#btn-save-user').show();
    }

    function close_form_user() {
        $('#btn-save-user').val('simpan');
        $('#btn-add-user').show();
        $('#form-add-user,#btn-batal-user,#btn-save-user').hide();
        $('#nm-user').val('');
        $('#password').val('');
        $("#ceklis-ubah-pass").prop("checked", false);
    }

    function load_data_user() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('user/data_user'); ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-user').html(data);
            },
            error: function() {
                alert("Data Gagal Diuploadzzzzz");
            }
        });
    }
    $("#select-privilage").select2({
        placeholder: "Tambah privilage",
        allowClear: true
    });
</script>