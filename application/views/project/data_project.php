<div class="faq">
    <div class="" data-aos="fade-up">
        <div class="accordion accordion-flush" id="faqlist">
            <?php
            $no = 1;
            foreach ($data_project as $data) :
            ?>
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed project" type="button" data-id-project="<?php echo $data->id_project; ?>" data-project-progres="<?php echo $data->project_progres; ?>" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $data->id_project; ?>">
                            <i class="bi bi-question-circle question-icon"></i>
                            <?php echo $data->nm_project; ?>
                        </button>
                    </h3>
                    <div id="faq-content-<?php echo $data->id_project; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body" style="padding: 0px 20px 25px 20px;">
                            <hr class="">
                            <!-- <h6>REKAP</h6> -->
                            <div id="data-rekap-weekly-<?php echo $data->id_project; ?>" class="rekap-weekly"></div>
                            <section id="form-data-rekap-<?php echo $data->id_project; ?>" class="form-rekap p-0">
                                <div class="" data-aos="fade-up">
                                    <div class="row p-2">
                                        <div class="tabs">
                                            <ul class="tabs--list">
                                                <li>
                                                    <a href="javascript:;" title="MATERIAL" data-content="material" id="" class="swipe-material btn-data-rekap actived">MATERIAL</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" title="TENAGA" data-content="tenaga" id="" class="swipe-tenaga btn-data-rekap ">TENAGA</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" title="LAIN LAIN" data-content="lainnya" id="" class="swipe-lainnya btn-data-rekap ">LAIN-LAIN</a>
                                                </li>
                                                <li class="moving-tab moving-tab--interaction"></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                    <div id="data-rekap-material-tenaga-<?php echo $data->id_project; ?>" class="rekap-material-tenaga"></div>
                                    <ul>
                                        <li class="border-total-rekap mb-1">
                                            <h6 class="m-0">Material : Rp.</h6>
                                            <h6 class=" m-0 subtotal-material" id="subtotal-material-<?php echo $data->id_project; ?>"></h6>
                                        </li>
                                        <li class="border-total-rekap mb-1">
                                            <h6 class="m-0">Tenaga : Rp.</h6>
                                            <h6 class=" m-0 subtotal-tenaga" id="subtotal-tenaga-<?php echo $data->id_project; ?>"></h6>
                                        </li>
                                        <li class="border-total-rekap mb-1">
                                            <h6 class="m-0">Lain - Lain : Rp.</h6>
                                            <h6 class=" m-0 subtotal-lainnya" id="subtotal-lainnya-<?php echo $data->id_project; ?>"></h6>
                                        </li>
                                        <li class="border-total-rekap mb-1">
                                            <h6 class="m-0">total : Rp.</h6>
                                            <h6 class=" m-0 subtotal" id="subtotal-<?php echo $data->id_project; ?>"></h6>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="row">
                                        <center>
                                            <h6 class="border-total-rekap mb-1">Rekap biaya : Rp.<span id="subtotal-project-<?php echo $data->id_project; ?>"><?php echo $data->total_biaya; ?></span> </h6>
                                        </center>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <input type="text" id="swipe-rekap" value="" hidden>
        <input type="text" id="material-status" value="" hidden>
        <input type="text" id="action-btn-simpan-rekap-tenaga" value="" hidden>
        <input type="text" id="total-gaji-tenaga" value="0"  hidden>

    </div>
</div>
<script>
    // var id_project = $('#id-project').val();
    $('.project').click(function(e) {
        default_swipe_rekap();
        var id_project = $(this).data('id-project')
        $('#id-project').val($(this).data('id-project'));
        $('#project-progres').val($(this).data('project-progres'));
        // alert($(this).data('project-progres'));
        let formData = new FormData();
        formData.append('id-project', $(this).data('id-project'));
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('project/data_rekap_project/weekly'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.rekap-weekly').html('');
                $('#data-rekap-weekly-' + id_project).html(data);
                $('.form-rekap').attr('hidden', true);
                if ($('#project-progres').val() == '0') {

                } else {
                    $('#form-data-rekap-' + id_project).removeAttr('hidden', true);
                    load_data_rekap_material();
                }


            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });

    });

    $('.btn-data-rekap').click(function(e) {
        // if ($('#action-btn-simpan-rekap-tenaga').val() == 'show') {
            // alert('Silahkan Simpan data gaji tenaga');
        // } else {

            $("#swipe-rekap").val($(this).data('content'));
            if ($(this).data('content') == 'material') {
                $("#material-status").val('');
                load_data_rekap_material();
            } else if ($(this).data('content') == 'tenaga') {
                $("#material-status").val('');
                load_data_rekap_tenaga();
            } else if ($(this).data('content') == 'lainnya') {
                $("#material-status").val('lainnya');
                load_data_rekap_material();
            } else {
                $("#material-status").val('');
            }
        // }

    });

    function load_data_rekap_material() {
        var id_project = $('#id-project').val();
        let formData = new FormData();
        formData.append('id-project', $('#id-project').val());
        formData.append('project-progres', $('#project-progres').val());
        formData.append('status-material', $('#material-status').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('project/data_rekap_project/material'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.rekap-material-tenaga').html('');
                $('#data-rekap-material-tenaga-' + id_project).html(data);
                $('#swipe-rekap').val('material');

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function load_data_rekap_tenaga() {
        var id_project = $('#id-project').val();
        let formData = new FormData();
        formData.append('id-project', $('#id-project').val());
        formData.append('project-progres', $('#project-progres').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('project/data_rekap_project/tenaga'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.rekap-material-tenaga').html('');
                $('#data-rekap-material-tenaga-' + id_project).html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
</script>
<script>
    function default_swipe_rekap() {
        $("#material-status").val('');
        $('.swipe-tenaga, .swipe-lainnya').removeClass('actived');
        $('.swipe-material').addClass('actived');
        $(".moving-tab").css({
            left: "0%"
        });
    }
    $(document).ready(function() {


        $('.item').magnificPopup({
            delegate: 'a',
        });
        var tabs = $('.tabs'),
            tabsLists = $('.tabs ul.tabs--list li');
        tabs.each(function() {
            var tab = $(this),
                tabItems = tab.find('ul.tabs--list'),
                tabContentWrapper = tab.children('ul.tabs--content');

            tabItems.on('click', 'a', function(event) {
                event.preventDefault();
                var activedItem = $(this);
                if (!activedItem.hasClass('actived')) {
                    var activedTab = activedItem.data('content'),
                        activedContent = tabContentWrapper.find('li[data-content="' + activedTab + '"]');

                    tabItems.find('a.actived').removeClass('actived');
                    activedItem.addClass('actived');
                    activedContent.addClass('actived').siblings('li').removeClass('actived');
                }
            });
        });

        tabsLists.click(function(e) {
            // if ($(this).hasClass('moving-tab')) {
            // return;
            // }
            var whatTab = $(this).index();
            var howFar = 33 * whatTab;
            $(".moving-tab").css({
                left: howFar + "%"
            });
        });
    })
</script>