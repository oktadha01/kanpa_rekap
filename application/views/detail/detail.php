<style>
    #scroling {
        width: 100%;
        direction: rtl
    }

    .outer-wrapper {
        max-width: 100vw;
        overflow-y: scroll;
        position: relative;
        scrollbar-color: #d5ac68 #f1db9d;
        scrollbar-width: thin;
        -ms-overflow-style: none;
    }

    .pseduo-track {
        background-color: #212529;
        height: 2px;
        width: 100%;
        position: relative;
        top: -3px;
        z-index: -10;
    }

    /* @media (any-hover: none) {
        .pseduo-track {
            display: none;
        }
    } */
    .pseduo-track {
        display: none;
    }

    .outer-wrapper::-webkit-scrollbar {
        height: 5px;
    }

    /* .outer-wrapper::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 0px rgba(0, 0, 0, 0);
    } */

    .outer-wrapper::-webkit-scrollbar-thumb {
        height: 5px;
        background-color: #05488a;
    }

    .outer-wrapper::-webkit-scrollbar-thumb:hover {
        background-color: #05488a;
    }

    .outer-wrapper::-webkit-scrollbar:vertical {
        display: none;
    }

    .inner-wrapper {
        display: flex;
        padding-bottom: 10px;
        justify-content: start;
    }

    .pseudo-item {
        margin-right: 5px;
        flex-shrink: 0;
    }

    .figure {
        padding: 5px;
        border-radius: 8px;
        cursor: pointer;
        border: 4px solid #3c5794;
    }

    .figure:hover,
    .figure-active {
        background: #3c5794;
        color: white;

    }

    .btn-add-week {
        padding: 13px 21px;
        border: 1px solid #00caff;
        border-radius: 8px;
        color: grey;
        font-size: 22px;
    }

    @media only screen and (max-width: 480px) {
        .figure {
            /* background: aqua; */
            padding: 9px 7px;
            border-radius: 8px;
            cursor: pointer;
            font-size: smaller;
            height: 56px;
        }

        .btn-add-week {
            padding: 14px 18px;
            border: 1px solid #00caff;
            border-radius: 8px;
            color: grey;
            font-size: 17px;
        }
    }

    @media (max-width: 992px) {

        th,
        td {
            text-align: left;
            padding: 8px;
            font-size: 10px;
            padding: 5px !important;
        }
    }

    @media (max-width: 992px) {
        .form-control {
            font-size: 10px;
        }
    }

    @media (max-width: 992px) {
        label {
            font-size: 10px;
        }
    }

    @media (max-width: 992px) {
        .btn {
            font-size: 10px;
            margin-right: 3px;
        }
    }

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
        /* margin-bottom: 50px; */
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
<section id="main" class="pt-5rem">
    <div class="mt-3">
        <hr>
        <?php
        foreach ($data_project as $project) :
        ?>
            <div class="row">
                <center>
                    <h4 style="background: aliceblue;font-size: 2rem;font-family: fantasy;"><?php echo $project->nm_project; ?></h4>
                </center>
            </div>
            <div id="scroling" class="row p-0">
                <div class="outer-wrapper">
                    <div id="filter-weekly" class="inner-wrapper pb-0">
                        <?php
                        $no = 1;
                        foreach ($data_progres as $data) :
                            $weekly = $data->weekly;
                        ?>
                            <div id="weekly-<?php echo $data->id_progres; ?>" class="btn-weekly weekly-<?php echo $data->weekly; ?> figure pseudo-item aos-init aos-animate" data-weekly="<?php echo $data->weekly; ?>" data-total-progres-material="<?php echo $data->total_progres_material; ?>" data-total-progres-tenaga="<?php echo $data->total_progres_tenaga; ?>" data-total-progres-lainnya="<?php echo $data->total_progres_lainnya; ?>" data-aos="zoom-in" data-aos-delay="200">
                                <center>
                                    <span>Minggu</span>
                                    <br>
                                    <span><?php echo $data->weekly; ?></span>
                                </center>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="pseduo-track"></div>
            </div>
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

            <div id="data-rekap-material-tenaga" class="rekap-material-tenaga"></div>
            <div class="row">
                <ul>
                    <li class="border-total-rekap mb-1">
                        <h6 class="m-0">Material : Rp.</h6>
                        <h6 class=" m-0 subtotal-material" id="subtotal-material"></h6>
                    </li>
                    <li class="border-total-rekap mb-1">
                        <h6 class="m-0">Tenaga : Rp.</h6>
                        <h6 class=" m-0 subtotal-tenaga" id="subtotal-tenaga"></h6>
                    </li>
                    <li class="border-total-rekap mb-1">
                        <h6 class="m-0">Lain - Lain : Rp.</h6>
                        <h6 class=" m-0 subtotal-lainnya" id="subtotal-lainnya"></h6>
                    </li>
                    <li class="border-total-rekap mb-1">
                        <h6 class="m-0">total : Rp.</h6>
                        <h6 class=" m-0 subtotal" id="subtotal"></h6>
                    </li>
                </ul>
            </div>
            <hr>
            <div class="row">
                <center>
                    <h6 class="border-total-rekap mb-1">Rekap biaya : Rp.<span id="subtotal-project"><?php echo $project->total_biaya; ?></span> </h6>
                </center>
            </div>
            <input type="text" id="id-project" value="<?php echo $project->id_project; ?>" hidden>
            <input type="text" id="project-progres" value="<?php echo $project->project_progres; ?>" hidden>
            <input type="text" id="material-status" value="" hidden>
            <input type="text" id="swipe-rekap" value="" hidden>
            <hr>
            <div class="card">
                <div class="card-header p-0">
                    <center>
                        <h4>Time Schedule</h4>
                    </center>
                </div>
                <div id="data-schedule" style="max-height: 20rem;overflow: overlay;"></div>
                <div class="wrap">
                    <div class="barGraph">
                        <div class="graph">
                            <div class="graph-barBack">
                                <div class="graph-bar" data-value="<?php echo $project->jumlah_bobot; ?>"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="data_foto_progres" class="row foto_progres"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
</section>