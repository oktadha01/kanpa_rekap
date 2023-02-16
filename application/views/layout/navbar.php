<header id="header" class="header fixed-top" data-scrollto-offset="0" style="max-height: 67px !important;">
   <div id="navbar-top" class="container-fluid d-flex align-items-center justify-content-between pr-var">

      <a href="https://www.instagram.com/pt.kanpa/?hl=en" class="logo d-flex align-items-center scrollto me-auto mr-0">
         <!-- <i class="fa-brands fa-instagram" style="color: #00000085;font-size: 35px;"></i> -->
         <img src="<?php echo base_url('assets'); ?>/img/Logo PT Fix Bingit.png" class="" alt="" style="max-height: 30px;">
      </a>
      <a href="<?php echo base_url(); ?>#home" class="logo d-flex align-items-center scrollto me-auto mr-0">
         <!-- Uncomment the line below if you also wish to use an image logo -->
         <!-- <img src="assets/img/logo.png" alt=""> -->
         <h1 class="mb-0 font-size-nav-baro text-kanzu-header">KANZU PERMAI ABADI</h1>
      </a>

      <!-- <nav id="navbar" class="navbar">
         <ul>
            <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>#home">Home</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>#about">About</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url('Produk'); ?>#produk">Product</a></li>
            <li><a id="btn-menu-news" class="nav-link scrollto" href="<?php echo base_url('News'); ?>#berita">News</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url('Estimasi_harga'); ?>#estimasi-hrg">Estimasi Harga</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url('More_info'); ?>#more-info">Contact</a></li>
         </ul>
         <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav> -->

   </div>

   <aside class="sidebar mt-15px">
      <nav id="navbar">
         <ul class="sidebar__nav">
            <li>
               <a href="<?php echo base_url('Dashboard'); ?>" class="sidebar__nav__link">
                  <i class="side-icon-side fa-solid fa-house"></i>
                  <span class="sidebar__nav__text">Dashboard</span>
               </a>
            </li>
            <?php if (!$this->session->userdata('is_login')) : ?>
            <?php else : ?>
               <?php if ($this->session->userdata("privilage") == 'Staf IT') { ?>
                  <li>
                     <a href="<?php echo base_url('Tenaga'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-users"></i>
                        <span class="sidebar__nav__text">Tenaga</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Project'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-building-shield"></i>
                        <span class="sidebar__nav__text">Project</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Time_schedule'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-regular fa-calendar-check"></i>
                        <span class="sidebar__nav__text">Time Schedule</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('User'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-user-gear"></i>
                        <span class="sidebar__nav__text">User</span>
                     </a>
                  </li>
               <?php
               } else if ($this->session->userdata("privilage") == 'Admin Kantor') {
               ?>
                  <li>
                     <a href="<?php echo base_url('Tenaga'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-users"></i>
                        <span class="sidebar__nav__text">Tenaga</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('Project'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-building-shield"></i>
                        <span class="sidebar__nav__text">Project</span>
                     </a>
                  </li>
               <?php
               } else if ($this->session->userdata("privilage") == 'Admin Kurva S') { ?>
                  <li>
                     <a href="<?php echo base_url('Time_schedule'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-regular fa-calendar-check"></i>
                        <span class="sidebar__nav__text">Time Schedule</span>
                     </a>
                  </li>

               <?php
               }
               ?>
            <?php endif ?>
            <li>
               <a href="<?php echo base_url('logout'); ?>" class="sidebar__nav__link">
                  <i class="side-icon-side fa-solid fa-right-from-bracket"></i>
                  <span class="sidebar__nav__text">Logout || <?= $this->session->userdata("privilage"); ?></span>
               </a>
            </li>
         </ul>
      </nav>
   </aside>
</header><!-- End Header -->