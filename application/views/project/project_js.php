<script>
    var id_project = $('#id-project').val();

    load_data_rekap_project();
    $('#add-project').removeAttr('hidden', true).hide();
    $('.btn-batal-project,.btn-save-project').removeAttr('hidden', true).hide();
    $('.btn-add-project').click(function(e) {
        add_project();
    });
    $('.btn-batal-project').click(function(e) {
        cencel_add_project();
    });
    $('.btn-save-project').click(function(e) {
        var action = $('.btn-save-project').val();
        let formData = new FormData();
        formData.append('id-project', $('#id-project').val());
        formData.append('nm-project', $('#nm-project').val());
        formData.append('rab', $('#rab').val());
        formData.append('rap', $('#rap').val());
        if (action == 'simpan') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('project/simpan_data_project'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert('berhasil');
                    form_default();
                    load_data_rekap_project();
                },
                error: function() {
                    alert("Data Gagal Diuploadzzzzz");
                }
            });
        } else if (action == 'edit') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('project/edit_data_project'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // form_default();
                    // load_data_tenaga()

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });

    $(document).on("input", ".jmlh-h, .total-lembur", function(e) {
        // alert('ya')
        // $('#total-gaji-tenaga').val('0')
        $('#tr-gaji-h-' + $(this).data('id-tenaga')).addClass('bg-tr-gaji-blm-disimpan');
        $('#tr-gaji-l-' + $(this).data('id-tenaga')).addClass('bg-tr-gaji-blm-disimpan');
        $('#action-input-h').val($(this).data('action'));
        var action = $(this).data('insert');
        // alert($(this).data('insert'))
        if (action == 'hari') {
            var hasil_gaji_h = parseFloat(removeCommas($('.hrg-h-' + $(this).data('id-tenaga')).text())) * parseInt($('#jmlh-h-' + $(this).data('id-tenaga')).val())
            $('.total-h-' + $(this).data('id-tenaga')).text(addCommas(hasil_gaji_h));

            if ($('#jmlh-h-' + $(this).data('id-tenaga')).val() == '') {
                $('.total-h-' + $(this).data('id-tenaga')).text('0');
            } else {
                $('.total-h-' + $(this).data('id-tenaga')).text();

            }
            total_gaji_harian();
        } else {

            $('.total-lembur-text-' + $(this).data('id-tenaga')).text($('#total-l-' + $(this).data('id-tenaga')).val());
            var hasil_lembur_j = parseFloat(removeCommas($('#total-l-' + $(this).data('id-tenaga')).val()) / removeCommas($('.hrg-l-' + $(this).data('id-tenaga')).text()))
            $('.jam-l-' + $(this).data('id-tenaga')).text(hasil_lembur_j);
            total_gaji_lemburan();
            // $('#total-gaji-tenaga').val($("#subtotal-tenaga-" + id_project).text())



            // $('.btn-simpan-rekap-tenaga').click();
        }

        let formData = new FormData();
        formData.append('action', $(this).data('action'));
        formData.append('id-rekap-tenaga', $(this).data('id-tenaga'));
        formData.append('id-tenaga', $(this).data('id-tenaga'));
        formData.append('id-project', $('#id-project').val());
        formData.append('project-progres', $('#project-progres').val());
        formData.append('jmlh-h', $('#jmlh-h-' + $(this).data('id-tenaga')).val());
        formData.append('total-gaji-h', $('.total-h-' + $(this).data('id-tenaga')).text());
        formData.append('jmlh-j', $('.jam-l-' + $(this).data('id-tenaga')).text());
        formData.append('total-lembur', $('#total-l-' + $(this).data('id-tenaga')).val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('project/add_gaji_tenaga'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if ($('#action-input-h').val() == 'update') {
                    total_gaji_harian();
                } else {
                    load_data_rekap_tenaga();
                }

                $('#action-btn-simpan-rekap-tenaga').val('show');
                $('.btn-simpan-rekap-tenaga').show();
                subtotal_weekly()
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
        // $('#jmlh-h-' + $(this).data('id-tenaga')).attr('data-action','yaaaa')
    });


    function add_project() {
        $('#add-project').show();
        $('.btn-save-project').show();
        $('.btn-add-project').hide();
        $('.btn-batal-project,.btn-save-project').show();
    }

    function cencel_add_project() {
        $('#add-project').hide();
        $('.btn-save-project').hide();
        $('.btn-add-project').show();
        $('.btn-batal-project,.btn-save-project').hide();
    }

    function form_default() {
        $('#id-project#nm-project,#rab,#rap').val('');
    }

    function load_data_rekap_project() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('project/data_rekap_project/project'); ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-project').html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function update_total_rekap_tenaga() {
        let formData = new FormData();
        formData.append('id-project', $('#id-project').val());
        formData.append('weekly', $('#project-progres').val());
        formData.append('total-tenaga-wekkly', $('#subtotal-tenaga-' + id_project).text());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('project/update_total_rekap_tenaga'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {},
            error: function() {
                alert("Data Gagal Diuploadzzzzz");
            }
        });
    }

    function update_total_rekap() {
        let formData = new FormData();
        formData.append('id-project', $('#id-project').val());
        formData.append('weekly', $('#project-progres').val());
        formData.append('total-progres-material', $('#subtotal-material-' + id_project).text());
        formData.append('total-progres-tenaga', $('#subtotal-tenaga-' + id_project).text());
        formData.append('total-progres-lainnya', $('#subtotal-lainnya-' + id_project).text());
        formData.append('total-progres-lainnya', $('#subtotal-lainnya-' + id_project).text());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('project/update_total_rekap'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {},
            error: function() {
                alert("Data Gagal Diuploadzzzzz");
            }
        });
    }

    function subtotal_weekly() {
        var id_project = $('#id-project').val();

        var subtotal = parseFloat(removeCommas($('#subtotal-material-' + id_project).text())) + parseFloat(removeCommas($('#subtotal-tenaga-' + id_project).text())) + parseFloat(removeCommas($('#subtotal-lainnya-' + id_project).text()))
        $("#subtotal-" + id_project).text(addCommas(subtotal));

    }
    const autoNumericOption = {
        digitGroupSeparator: '.',
        decimalCharacter: ',',
        decimalCharacterAlternative: '.',
        decimalPlaces: 0,
        watchExternalChanges: true //!!!        
    };


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

    function removeCommas(nStr) {

        return nStr.split('.').join("");
    }

    // $(document).on("keypress", function(e) {
    //     var key = e.which
    //     if (key == 13) {
    //         $('.btn-save-materia').click();
    //     }
    // });
</script>