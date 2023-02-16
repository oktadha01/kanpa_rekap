<?php if (!$this->session->userdata('is_login')) : ?>
<?php else : ?>
    <?php if ($this->session->userdata("privilage") == 'Staf IT') { ?>
    <?php } else if ($this->session->userdata("privilage") == 'Admin Kantor') { ?>
    <?php
    } else {
        redirect(base_url('Login'));
    }
    ?>
<?php endif ?>
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

    .select2-container {
        box-sizing: border-box;
        display: inline-block;
        margin: 0;
        position: relative;
        vertical-align: middle;
        width: 100% !important;
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
</style>
<main id="main" class="pt-5rem">
    <div class="m-3 mt-4">
        <div id="add-project" hidden>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <label for="nm-project">Project</label>
                    <div class="form-group">
                        <input type="text" id="nm-project" class="form-control" placeholder="Project ..." autocomplete="off" required="true">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <label for="rab">R A B</label>
                    <div class="form-group">
                        <input type="text" id="rab" class="form-control" placeholder="R A B ..." autocomplete="off" required="true">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <label for="rap">R A P</label>
                    <div class="form-group">
                        <input type="text" id="rap" class="form-control" placeholder="R A P ..." autocomplete="off" required="true">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <!-- <a id="herf-batal" href="#main" hidden> -->
                <button type="button" class="btn-batal-project btn btn-sm btn-outline-danger" hidden><i class="fa-regular fa-pen-to-square"></i> Batal</button>
                <!-- </a> -->
            </div>
            <div class="col-6">
                <!-- <a id="herf-simpan" href="#main"> -->
                <button type="button" class="btn-save-project btn btn-sm float-right btn-outline-success" value="simpan" hidden><i class="fa-solid fa-cloud-arrow-up"></i> Simpan data project</button>
                <button type="button" class="btn-add-project btn btn-sm float-right btn-outline-info"><i class="fa-solid fa-plus"></i> Tambah data project</button>
                <!-- </a> -->
            </div>
        </div>
        <hr>
        <div id="data-project"></div>

    </div>
    <input type="text" id="id-project" value="" hidden>
    <input type="text" id="project-progres" value="" hidden>
</main>