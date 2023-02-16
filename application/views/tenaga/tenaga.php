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
<main id="main" class="pt-5rem">
    <div class="m-3 mt-4">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <label for="nm-tenaga">Nama</label>
                <div class="form-group">
                    <input type="text" id="nm-tenaga" class="form-control" placeholder="Nama ..." autocomplete="off" required="true">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <label for="hrg-tenaga">Harga (H)</label>
                <div class="form-group">
                    <input type="text" id="hrg-tenaga" class="form-control" placeholder="Harga Tenaga Harian ..." autocomplete="off" required="true">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <label for="hrg-tenaga-lembur">Harga (L)</label>
                <div class="form-group">
                    <input type="text" id="hrg-tenaga-lembur" class="form-control" placeholder="Harga Tenaga Lembur ..." autocomplete="off" required="true">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <!-- <a id="herf-batal" href="#main" hidden> -->
                <button type="button" class="btn-batal-tenaga btn btn-sm btn-outline-danger"><i class="fa-regular fa-pen-to-square"></i> Batal</button>
                <!-- </a> -->
            </div>
            <div class="col-6">
                <!-- <a id="herf-simpan" href="#main"> -->
                <button type="button" class="btn-simpan-tenaga btn btn-sm float-right btn-outline-success" value="simpan"><i class="fa-regular fa-pen-to-square"></i> Simpan data tenaga</button>
                <!-- </a> -->
            </div>
        </div>
        <div id="data-tenaga" class="row mt-3">

        </div>
    </div>
    <input type="text" id="id-tenaga" value="">
</main>