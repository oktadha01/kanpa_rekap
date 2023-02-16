<style>
    .p-absolute {
        position: absolute !important;
    }
</style>
<section id="portfolio" class="portfolio" style="overflow: inherit;">
    <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
        <div class="row g-0 portfolio-container">
            <?php
            // $no = 1;
            foreach ($data_foto as $data) :
            ?>
                <div class="col-xl-3 col-lg-4 col-md-4 col-6 portfolio-item filter-app" style="max-height: 13rem;">
                    <img src="<?php echo base_url('upload/schedule'); ?>/<?php echo $data->file_foto; ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <a href="<?php echo base_url('upload/schedule'); ?>/<?php echo $data->file_foto; ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="#" title="More Details" class="details-link delete-foto" data-id-foto="<?php echo $data->id_foto; ?>" data-foto="<?php echo $data->file_foto; ?>"><i class="fa-regular fa-trash-can"></i></a>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</section>
<script>
    $('.delete-foto').click(function(e) {
        // Delete id
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-foto', $(this).data('id-foto'));
            formData.append('foto', $(this).data('foto'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('time_schedule/delete_foto'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_data_foto();

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });
    var lightbox = GLightbox({
        // height: '100vh',
        // width: 'auto',
        loop: true
    });
</script>