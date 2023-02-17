<div id="scroling" class="p-0 aos-init aos-animate" data-aos="fade-up">
    <div class="outer-wrapper">
        <div id="filter-weekly" class="inner-wrapper pb-0">
            <div class="btn-add-week pseudo-item aos-init aos-animate" data-aos="zoom-in" data-aos-delay="1000">
                <center>
                    <i class="fa-solid fa-plus"></i>
                </center>
            </div>
            <?php
            $no = 1;
            foreach ($data_weekly as $data) :
                $weekly = $data->weekly;
            ?>
                <div id="weekly-<?php echo $data->id_progres; ?>" class="btn-weekly weekly-<?php echo $data->weekly; ?> figure pseudo-item aos-init aos-animate" data-weekly="<?php echo $data->weekly; ?>" data-total-progres-material="<?php echo $data->total_progres_material; ?>" data-total-progres-tenaga="<?php echo $data->total_progres_tenaga; ?>" data-total-progres-lainnya="<?php echo $data->total_progres_lainnya; ?>" data-total-tenaga-weekly="<?php echo $data->total_tenaga_weekly; ?>" data-aos="zoom-in" data-aos-delay="200">
                    <center>
                        <span>Minggu</span>
                        <br>
                        <span><?php echo $data->weekly; ?></span>
                    </center>
                </div>
                <script>
                    if ($('#project-progres').val() == '<?php echo $data->weekly; ?>') {
                        $('#weekly-<?php echo $data->id_progres; ?>').addClass('figure-active');
                    }
                </script>
            <?php
            endforeach;
            ?>
        </div>
    </div>
    <div class="pseduo-track"></div>
</div>

<script>
    $(document).ready(function() {
        $('.subtotal-material').text('0');
        $('.subtotal-tenaga').text('0');
        $('.subtotal-lainnya').text('0');
        $('.figure-active').click();
    });

    $('.btn-add-week').click(function(e) {
        if ($('#action-btn-simpan-rekap-tenaga').val() == 'show') {
            alert('silahkan simapn rekap gaji tenaga dahulu'); 
        } else {

            let formData = new FormData();
            formData.append('id-project', $('#id-project').val());
            formData.append('add-weekly', $('#project-progres').val());
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('project/add_weekly_project'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_data_rekap_weely();
                    load_data_rekap_material();

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });

        }
    });

    $('.btn-weekly').click(function() {
        var id_project = $('#id-project').val();
        if ($('#action-btn-simpan-rekap-tenaga').val() == 'show') {
            alert('silahkan simapn rekap gaji tenaga dahulu');
        } else {
            $('#project-progres').val($(this).data('weekly'));
            $('#subtotal-material-' + id_project).text($(this).data('total-progres-material'));
            $('#subtotal-tenaga-' + id_project).text($(this).data('total-progres-tenaga'));
            $('#subtotal-lainnya-' + id_project).text($(this).data('total-progres-lainnya'));
            $('#total-gaji-tenaga').val($(this).data('total-tenaga-weekly'))
            load_data_rekap();

        }


        // load_data_rekap_material();
        // $(".subtotal-tenaga").text('Tenaga = 0');

    });
    btn_active_weekly();

    function load_data_rekap() {

        if ($("#swipe-rekap").val() == 'material') {
            load_data_rekap_material();

        } else if ($("#swipe-rekap").val() == 'tenaga') {

            load_data_rekap_tenaga();
        }
    }

    function load_data_rekap_weely() {
        var progres = $('#project-progres').val(parseFloat($('#project-progres').val()) + 1)
        var id_project = $('#id-project').val()
        let formData = new FormData();
        formData.append('id-project', $('#id-project').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('project/data_rekap_project/weekly'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-rekap-weekly-' + id_project).html(data);
                $('#form-data-rekap-' + id_project).removeAttr('hidden', true);
                $('#project-progres').val(progres)
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function btn_active_weekly() {

        var header = document.getElementById("filter-weekly");
        var btns = header.getElementsByClassName("btn-weekly");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                if ($('#action-btn-simpan-rekap-tenaga').val() == 'show') {} else {
                    var current = document.getElementsByClassName("figure-active");
                    current[0].className = current[0].className.replace(" figure-active", "");
                    this.className += " figure-active";
                    // default_swipe_rekap();
                }

            });

        }
    }
</script>