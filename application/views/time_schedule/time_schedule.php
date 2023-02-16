<?php if (!$this->session->userdata('is_login')) : ?>
<?php else : ?>
    <?php if ($this->session->userdata("privilage") == 'Staf IT') { ?>
    <?php } else if ($this->session->userdata("privilage") == 'Admin Kurva S') { ?>
    <?php
    } else {
        redirect(base_url('Login'));
    }
    ?>
<?php endif ?>
<style>
    th,
    td {
        text-align: left;
        padding: 8px;
        font-size: 10px;
        padding: 5px !important;
    }

    .bg-btn-save-disabled {
        background: #80808040 !important;
    }
</style>
<main id="main" class="pt-5rem">
    <div class="m-3 mt-4">
        <div class="faq">
            <div class="" data-aos="fade-up">
                <div class="accordion accordion-flush" id="faqlist">
                    <?php
                    // $no = 1;
                    foreach ($data_project as $data) :
                    ?>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed project" type="button" data-id-project="<?php echo $data->id_project; ?>" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $data->id_project; ?>">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    <?php echo $data->nm_project; ?>
                                </button>
                            </h3>
                            <div id="faq-content-<?php echo $data->id_project; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body" style="padding: 0px 20px 25px 20px;">
                                    <hr class="">
                                    <section class="p-0">
                                        <div class="" data-aos="fade-up" style="overflow-x:auto;max-height: 23rem;">

                                            <!-- <hr> -->
                                            <div id="data-schedule-<?php echo $data->id_project; ?>" class="schedule"></div>
                                        </div>
                                    </section>

                                    <span hidden id="jumlah-bobot-<?php echo $data->id_project; ?>"><?php echo $data->jumlah_bobot; ?></span>
                                    <br>
                                    <div id="data-chart-<?php echo $data->id_project; ?>" class="chart"></div>

                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                <input type="text" id="id-project" value="" hidden>
                <input type="text" id="status-schedule" value="0" hidden>

            </div>
        </div>
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
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="input-group">
                                <input type="text" id="id-schedule" value="">
                                <input type="file" id="file-foto-progres" class="foto-progres" value="" hidden>
                                <input type="text" class="form-control pilih-foto-progres " readonly placeholder="Upload Gambar" id="nm-foto-progres">
                                <div class="input-group-append">
                                    <button type="button" id="btn-pilih-foto-progres" class="pilih-foto-progres browse btn btn-dark">Pilih Foto</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <img id="preview-foto-progres" src="" class="img-thumbnail" style="max-height: 20rem;">

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="button" id="btn-save-foto" class="col-12 btn btn-sm btn-outline-success"><i class="fa-solid fa-cloud-arrow-up"></i> Simpan foto</button>
                        </div>
                    </div>
                    <div id="data_foto_progres" class="row foto_progres">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</main>
<script>

</script>