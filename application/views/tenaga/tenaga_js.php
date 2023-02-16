<script>
    load_data_tenaga();
    $('.btn-simpan-tenaga').click(function(e) {
        var action = $('.btn-simpan-tenaga').val();
        let formData = new FormData();
        formData.append('id-tenaga', $('#id-tenaga').val());
        formData.append('nm-tenaga', $('#nm-tenaga').val());
        formData.append('hrg-tenaga', $('#hrg-tenaga').val());
        formData.append('hrg-tenaga-lembur', $('#hrg-tenaga-lembur').val());
        if (action == 'simpan') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('tenaga/simpan_data_tenaga'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert('berhasil');
                    form_default();
                    load_data_tenaga();
                },
                error: function() {
                    alert("Data Gagal Diuploadzzzzz");
                }
            });
        } else if (action == 'edit') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('tenaga/edit_data_tenaga'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    form_default();
                    load_data_tenaga()

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });
    $('.btn-batal-tenaga').click(function() {
        form_default();
    });

    function form_default() {
        $('.btn-simpan-tenaga').val('simpan');
        $('#id-tenaga,#nm-tenaga,#hrg-tenaga,#hrg-tenaga-lembur').val('');
    }

    function load_data_tenaga() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('tenaga/data_tenaga'); ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-tenaga').html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
    const autoNumericOption = {
        digitGroupSeparator: '.',
        decimalCharacter: ',',
        decimalCharacterAlternative: '.',
        decimalPlaces: 0,
        watchExternalChanges: true //!!!        
    };
    new AutoNumeric('#hrg-tenaga', autoNumericOption);
    new AutoNumeric('#hrg-tenaga-lembur', autoNumericOption);

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
    //         // $('.btn-simpan-tenaga').click();
    //     }
    // });
</script>