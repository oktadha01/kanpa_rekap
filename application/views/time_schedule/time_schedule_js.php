<script>
    $('.project').click(function(e) {
        var id_project = $(this).data('id-project')
        $('#id-project').val(id_project);
        let formData = new FormData();
        formData.append('id-project', $(this).data('id-project'));
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('time_schedule/data_schedule'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert('ya')
                $('.schedule').html('');
                $('#data-schedule-' + id_project).html(data);
                // $('#weekly-' + $('#project-progres').val()).click();

                // load_data_rekap_material()

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
    $('#file-foto-progres').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-foto-progres").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-progres").src = e.target.result;

        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $('#btn-save-foto').click(function(e) {
        $('#btn-save-foto').attr('disabled', true).addClass('bg-btn-save-disabled');
        const foto_progres = $('#file-foto-progres').prop('files')[0];
        let formData = new FormData();
        formData.append('file-foto-progres', foto_progres);
        formData.append('id-progres-schedule', $('#id-schedule').val());
        formData.append('id-project', $('#id-project').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Time_schedule/add_foto_progres'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // load_foto_tipe();
                // alert('berhasil')
                load_data_foto();
                form_defauld();
                $('#btn-save-foto').removeAttr('disabled', true).removeClass('bg-btn-save-disabled');
            },
            error: function(msg) {
                alert("Data Gagal Diupload");
            }
        });
    });

    function form_defauld() {
        $('#file-foto-progres,#nm-foto-progres').val('');
        $('#preview-foto-progres').attr({
            src: ''
        });
    }

    function load_data_foto() {
        let formData = new FormData();
        formData.append('id-progres-schedule', $('#id-schedule').val());
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
    }

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