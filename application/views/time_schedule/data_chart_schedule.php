<style>
    /* Variables & Mixings */
    .clearfix,
    .clearfix:before,
    .clearfix:after {
        display: block;
        content: " ";
        clear: both;
        zoom: 1;
    }

    /* Resets */
    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .wrap {
        /* margin: 0 auto;
        padding: 50px;
        max-width: 1200px; */
        padding: 0px 86px 0px 0px;
    }

    /* The Skills BarChart */
    .barGraph {
        position: relative;
        width: 100%;
        height: auto;
        margin-bottom: 50px;
    }

    .graph {
        position: relative;
        list-style-type: none;
        width: calc(100% - 4%);
        /* left: 4%; */
    }

    .graph-barBack {
        border-radius: 2px;
        background: #dae5eb;
        margin-bottom: 10px;
        display: block;
    }

    .graph-bar {
        background-color: #21b2f1;
        -webkit-transition: all 1.5s ease-out;
        -moz-transition: all 1.5s ease-out;
        -o-transition: all 1.5s ease-out;
        transition: all 1.5s ease-out;
        border-radius: 2px;
        cursor: pointer;
        margin-bottom: 10px;
        position: relative;
        z-index: 9999;
        display: block;
        height: 20px;
        width: 0%;
    }

    .graph-bar:hover {
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
        background: #dd8e14;
    }

    .graph-bar:last-child {
        margin-bottom: 0;
    }

    .graph-bar:after {
        position: absolute;
        content: attr(data-value) "%";
        font-size: 12px;
        border-radius: 5px;
        background: #f3c57d;
        color: white;
        line-height: 20px;
        height: 20px;
        padding: 0 10px;
        margin-left: 5px;
        left: 100%;
        top: 0;
    }

    .graph-bar:hover:after {
        background: #dd8e14;
    }

    .graph-legend {
        position: absolute;
        margin-right: 10px;
        left: -85px;
        z-index: 9999;
    }
</style>

<div class="wrap">
    <!-- <h2>Skills BarChart</h2> -->
    <div class="barGraph">
        <div class="graph">
            <div class="graph-barBack">
                <?php
                foreach ($data_chart as $data) :
                ?>
                    <div class="graph-bar" data-value="<?php echo $data->jumlah_bobot; ?>"></div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#status-schedule').val('0');

        <?php
        foreach ($data_schedule as $data) {
        ?>
            $('#status-schedule').val('1')
        <?php
        }
        ?>
        if ($('#status-schedule').val() == '0') {
            // $('#jumlah-bobot-' + id_project).text('100')
            $('.graph-bar').attr('data-value', '100');
        } else {
            // $('#jumlah-bobot-' + id_project).text()
        }
        $('.graph-bar').each(function() {
            var dataWidth = $(this).data('value');
            $(this).css("width", dataWidth + "%");
        });
    });
</script>