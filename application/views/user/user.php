<?php if (!$this->session->userdata('is_login')) : ?>
<?php else : ?>
    <?php if ($this->session->userdata("privilage") == 'Staf IT') { ?>
    <?php
    } else {
        redirect(base_url('Login'));
    }
    ?>
<?php endif ?>
<style>
    .select2-container {
        width: -webkit-fill-available !important;
    }
</style>

<section id="main" class="pt-5rem">
    <div class="m-3 mt-4">
        <div id="form-add-user" class="row" hidden>
            <div class="col-lg-4 col-md-4 col-12">
                <label for="nm-user">Nama</label>
                <div class="form-group">
                    <input type="text" id="nm-user" class="form-control" placeholder="Nama ..." autocomplete="off" required="true">
                    <input type="text" id="id-user">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <label for="password">Password</label>
                <div id="input-pass" class="form-group">
                    <input type="text" id="password" class="form-control" placeholder="Password ..." autocomplete="off" required="true">
                </div>

                <div id="ceklis-pass" class="form-group">
                    <input class="custom-control-input ceklis-tahapan" type="checkbox" id="ceklis-ubah-pass" value="" style="width: 15px;height: 15px; margin-right: 1rem;">
                    <label for="ceklis-ubah-pass" class="custom-control-label">ceklis ubah password</label>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <label for="select-privilage">Password</label>
                <div class="form-group">
                    <select id="select-privilage" class="js-states form-control col-12">
                        <option value=""></option>
                        <?php
                        // $no = 1;
                        foreach ($data_privilage as $data) :
                        ?>
                            <option value="<?php echo $data->status_privilage; ?>"><?php echo $data->status_privilage; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <button type="button" id="btn-batal-user" class="btn btn-sm btn-outline-danger" hidden><i class="fa-regular fa-pen-to-square"></i> Batal</button>
            </div>
            <div class="col-6">
                <button type="button" id="btn-save-user" class=" btn btn-sm float-right btn-outline-success" value="simpan" hidden><i class="fa-solid fa-cloud-arrow-up"></i> Simpan data user</button>
                <button type="button" id="btn-add-user" class="btn btn-sm float-right btn-outline-info"><i class="fa-solid fa-plus"></i> Tambah data user</button>
            </div>
        </div>
        <div id="data-user"></div>

    </div>
</section>