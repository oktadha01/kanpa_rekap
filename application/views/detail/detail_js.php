<script>
    var project_progres = $('#project-progres').val();
    $('.weekly-' + project_progres).addClass('figure-active').click();
    $(document).ready(function() {
        $('.figure-active').trigger('click');

    });
    load_data_rekap_material();
    $('.btn-weekly').click(function() {
        var id_project = $('#id-project').val();
        $('#project-progres').val($(this).data('weekly'));
        $('#subtotal-material').text($(this).data('total-progres-material'));
        $('#subtotal-tenaga').text($(this).data('total-progres-tenaga'));
        $('#subtotal-lainnya').text($(this).data('total-progres-lainnya'));
        // load_data_rekap_material();
        // $(".subtotal-tenaga").text('Tenaga = 0');
        load_data_rekap();

    });
    $('.btn-data-rekap').click(function(e) {
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
    });
    

    function load_data_rekap() {

        if ($("#swipe-rekap").val() == 'material') {
            load_data_rekap_material();

        } else if ($("#swipe-rekap").val() == 'tenaga') {

            load_data_rekap_tenaga();
        }
    }
    load_data_schedule();

    function load_data_schedule() {
        // var id_project = $('#id-project').val();
        let formData = new FormData();
        formData.append('id-project', $('#id-project').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('detail/data_rekap_project/schedule'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-schedule').html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function load_data_rekap_material() {
        var id_project = $('#id-project').val();
        let formData = new FormData();
        formData.append('id-project', $('#id-project').val());
        formData.append('project-progres', $('#project-progres').val());
        formData.append('status-material', $('#material-status').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('detail/data_rekap_project/material'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.rekap-material-tenaga').html('');
                $('#data-rekap-material-tenaga').html(data);
                $('#swipe-rekap').val('material');
                subtotal_weekly();


            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function load_data_rekap_tenaga() {
        let formData = new FormData();
        formData.append('id-project', $('#id-project').val());
        formData.append('project-progres', $('#project-progres').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('detail/data_rekap_project/tenaga'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.rekap-material-tenaga').html('');
                $('#data-rekap-material-tenaga').html(data);
                subtotal_weekly();


            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function subtotal_weekly() {
        var subtotal = parseFloat(removeCommas($('#subtotal-material').text())) + parseFloat(removeCommas($('#subtotal-tenaga').text())) + parseFloat(removeCommas($('#subtotal-lainnya').text()));
        $("#subtotal").text(addCommas(subtotal));
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
        $('.graph-bar').each(function() {
            var dataWidth = $(this).data('value');
            $(this).css("width", dataWidth + "%");
        });


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
    var header = document.getElementById("filter-weekly");
    var btns = header.getElementsByClassName("btn-weekly");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("figure-active");
            current[0].className = current[0].className.replace(" figure-active", "");
            this.className += " figure-active";
            // default_swipe_rekap();
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

    function removeCommas(nStr) {

        return nStr.split('.').join("");
    }
</script>