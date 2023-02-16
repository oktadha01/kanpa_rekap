<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title>Rumah Murah di Semarang di Bawah Rp 200 Jt Terlengkap | Kanpa.co.id</title> -->
    <title>

        <?php
        if (isset($_title)) {
            echo $_title;
        } else {
            echo 'Rumah Murah di Semarang di Bawah Rp 200 Jt Terlengkap | Kanpa.co.id';
        }
        ?>
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="Da0TUaYScK7AIiQsOyTgtDTpMIBgIFtz3Gb7zkltBB4" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <!-- Meta untuk SEO -->
    <meta name="description" content="Cari Rumah di Semarang di Bawah Rp 200 Jt. Rumah minimalis terjangkau, termurah di semarang Bisa KPR Harga paling murah Lokasi strategis Proses mudah & cepat">
    <meta name="keywords" content="PT Kanpa, rumah murah di semarang, jual rumah semarang, jual rumah ungaran, jual rumah, jual rumah gunung pati, perumahan ungaran, rumah murah ungaran,perumahan murah semarang, perumahan bukit permai ungaran, perumahan murah subsidi, kpr, griya kautsar ungaran, bukit permai 2 ungaran ">
    <meta name="robots" content="INDEX,FOLLOW">


    <style>
        .opacity-body {
            margin-top: 0;
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 999;
            background: #0000008c;
        }
    </style>
    <!-- Favicons -->
    <link href="<?php echo base_url('assets'); ?>/img/logokanpatitle.jpeg" rel="icon">

    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Chathura" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- Daterangepicker -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('assets'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="<?php echo base_url('assets'); ?>/css/variables.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('assets'); ?>/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/css/custom.css" rel="stylesheet">

</head>


<body>
    <?php $this->load->view('layout/alert/_alert') ?>
    <?php
    if (isset($_view_login) && !empty($_view_login)) {
        $this->load->view($_view_login);
    } else {

    ?>
        <?php
        include_once 'navbar.php';
        ?>
        <main id="page" class="ml-page">
            <?php if (!$this->session->userdata('is_login')) : ?>
               <?php redirect(base_url('Login'));?>
            <?php else : ?>
                <?php
                if (isset($_view) && !empty($_view)) {
                    $this->load->view($_view);
                }
                ?>

                <?php
                ?>
            <?php endif ?>


        </main>
    <?php
    }
    ?>

    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/popper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js'></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/html2pdf.js/0.9.1/html2pdf.bundle.js"></script> -->
    <!-- Daterangepicker -->
    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script> -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.bootcss.com/html2pdf.js/0.9.1/html2pdf.bundle.js"></script>
    <!-- canva -->
    <script src="<?php echo base_url('assets'); ?>/vendor/jquery-autonumeric/autoNumeric.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/jquery-autonumeric/autonumeric-4.1.0.js"></script>

    <script src="<?php echo base_url('assets'); ?>/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/daterangepicker/daterangepicker.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>

    <script src="<?php echo base_url('assets'); ?>/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- <script src="<?php echo base_url('assets'); ?>/vendor/php-email-form/validate.js"></script> -->
    <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets'); ?>/js/main.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        // Swiper Configuration
        var swiper = new Swiper(".swiper-container-bs", {
            slidesPerView: 1.5,
            spaceBetween: 10,
            centeredSlides: true,
            freeMode: true,
            grabCursor: true,
            loop: true,
            pagination: {
                el: ".swiper-pagination-bullet-bs",
                clickable: true
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next-bs",
                prevEl: ".swiper-button-prev-bs"
            },
            breakpoints: {
                500: {
                    slidesPerView: 2
                },
                700: {
                    slidesPerView: 2.3
                }
            }
        });
    </script>
    <?php
    if (isset($_script) && !empty($_script)) {
        $this->load->view($_script);
    } ?>
    <!-- <?php if (!$this->session->userdata('is_login')) : ?>
        <script>
            // alert('ya');
            $('#page').removeClass('ml-page');
        </script>
    <?php endif ?> -->

    <script>
        $(document).on("click", ".pilih-foto-progres", function() {
            var file = $(this).parents().find(".foto-progres");
            file.trigger("click");
        });

        function footerToggle(footerBtn) {
            $(footerBtn).toggleClass("btnActive");
            $(footerBtn).next().toggleClass("active");
        }

        $(".sidebar").hover(function() {
            // alert('ya'); 
            openNav();
        }, function() {
            closeNav();
        });

        function openNav() {
            document.getElementById("page").style.marginLeft = "226px";
        }

        function closeNav() {
            document.getElementById("page").style.marginLeft = "74px";
        }
        $(function() {
            var url = window.location.href;

            // passes on every "a" tag
            $("#navbar a").each(function() {
                // checks if its the same on the address bar
                if (url == (this.href)) {
                    $(this).closest(".sidebar__nav__link").addClass("sidebar-active");
                }
            });
            // this will get the full URL at the address bar
        });
    </script>

</body>

</html>