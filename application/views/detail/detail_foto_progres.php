<style>
    .p-absolute {
        position: absolute !important;
    }
</style>
<section id="portfolio" class="portfolio" style="overflow: inherit;">
    <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
        <div class="row g-0 portfolio-container">
            <?php
            foreach ($data_foto as $data) :
            ?>
                <div class="col-xl-3 col-lg-4 col-md-4 col-6 portfolio-item filter-app" style="max-height: 13rem;">
                    <img src="<?php echo base_url('upload/schedule'); ?>/<?php echo $data->file_foto; ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <a href="<?php echo base_url('upload/schedule'); ?>/<?php echo $data->file_foto; ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</section>
<script>
    
    var lightbox = GLightbox({
        // height: '100vh',
        // width: 'auto',
        loop: true
    });
</script>