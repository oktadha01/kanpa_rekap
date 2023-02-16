<style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        display: flex;
        justify-content: center;
        height: 100vh;
        /* background: #0d0c2d; */
    }

    .chart-border {
        /* display: grid;
        /* grid-template-columns: repeat(1, 160px); */
        grid-gap: 80px;
        margin: auto 0;
        display: grid;
        /* grid-template-columns: repeat(2, 154px); */
        grid-gap: 41px;
        margin: auto 0;
    }

    @media (min-width: 420px) and (max-width: 659px) {
        /* .chart-border {
            grid-template-columns: repeat(2, 160px);
        } */

        /* .chart-border  {
            margin: 0px !important;
        } */

    }

    @media (min-width: 660px) and (max-width: 899px) {
        /* .chart-border {
            grid-template-columns: repeat(3, 160px);
        } */

        /* .chart-border  {
            margin: 0px !important;
        } */

    }

    @media (min-width: 900px) {
        /* .chart-border {
            grid-template-columns: repeat(4, 160px);
        } */

        /* .chart-border  {
            margin: 0px !important;
        } */

    }


    .chart-border .box {
        width: 100%;
        border: 3px solid #0000002b;
        border-radius: 15px;
    }

    .chart-border .box h2 {
        display: block;
        text-align: center;
        color: #000;
    }

    .chart-border .box .chart {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        font-size: 17px;
        line-height: 160px;
        height: 160px;
        color: #000;
        margin: 3px;
    }

    @media (max-width: 992px) {
        .chart-border .box .chart {
            font-size: 10px;
            margin: 0px !important;
        }
    }

    @media (max-width: 375px) {}

    .chart-border .box canvas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        width: 100%;
    }

    .ml-r-3 {
        margin: 0px 3px;

    }

    .box-shadow {
        box-shadow: 11px 11px 16px 0px rgb(0 0 0 / 13%);

    }

    .max-height-foto {
        max-height: 7rem;
        width: 100%;
        overflow: hidden;
    }
</style>


<!-- <link rel="stylesheet" type="text/css" href="/path/to/jquery.easy-pie-chart.css"> -->
<section id="main" class="pt-5rem">
    <hr>
    <div class="chart-border mt-3 p-3">
        <div class="row ">

            <?php
            foreach ($data_project as $data) :
                $nm_project = $data->nm_project;
                $tittle = preg_replace("![^a-z0-9]+!i", "-", $nm_project);
                $id_project = $data->id_project;
            ?>
                <div class="col-xxl-3 col-lg-3 col-md-4 col-6 p-2">
                    <a href="<?php echo base_url('Detail'); ?>/project/<?php echo $tittle; ?>">
                        <div class="box box-shadow">
                            <div class="max-height-foto">
                                <?php
                                foreach ($data_foto as $foto) :
                                    if ($foto->id_foto_project == $id_project) {

                                ?>
                                        <img src="<?php echo base_url('upload/schedule'); ?>/<?php echo $foto->file_foto; ?>" class="img-fluid glightbox preview-link" alt=""data-gallery="portfolio-gallery" style="border-top-right-radius: 13px;border-top-left-radius: 13px;">
                                <?php
                                    }
                                endforeach;
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-5 col-12">
                                    <center>

                                        <?php
                                        if ($data->status_project == 'selesai') {
                                        ?>
                                            <div class="chart" data-percent="100">100%</div>
                                        <?php
                                        } else { ?>
                                            <div class="chart m-0" data-percent="<?php echo $data->jumlah_bobot; ?>"><?php echo $data->jumlah_bobot; ?>%</div>
                                        <?php
                                        }
                                        ?>
                                    </center>
                                </div>
                                <div class="col-lg-6 col-md-7 col-12" style="position: relative;top: 12px;">
                                    <center>
                                        <h6 class="ml-r-3" style="background: steelblue;border-radius: 4px;color: white;font-weight: bold;">Minggu : <?php echo $data->project_progres; ?></h6>
                                    </center>
                                    <h6 class="ml-r-3" style="min-height: 40px;">Total Pengeluaran : Rp.<?php echo $data->total_biaya; ?></h6>
                                </div>
                            </div>
                            <hr class="mb-0">
                            <div class="row">
                                <center>
                                    <h4 class="mb-0" style="font-family: 'Poppins';"><?php echo $data->nm_project; ?></h4>
                                </center>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>


</section>