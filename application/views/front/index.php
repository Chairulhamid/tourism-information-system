
<section>
<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php $no = 0;?>
		<?php foreach($banners as $b) : ?>
			<?php $no++;  ?>
			<div class="carousel-item <?php if($no <= 1) { echo "active"; } ?>">
				<img style="filter: brightness(50%);" src="<?= base_url('assets/img/profile/') .$b['gambar']; ?>" class="d-block w-100">
				<div style="font-family: sans-serif; font-weight:bold;" class="carousel-caption d-none d-md-block">
                    <h1  style="font-weight: bold;"><?=$b['judul']; ?></h1>
					<h4><?=$b['text']; ?></h4>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<!--//END HEADER -->
<section class="clearfix about about-style2" style="background-color: #f0ad4e;">
    <div class="container">
     <div class="mb-3 row justify-content-around">
        <h2  style="font-weight: bold;">Welcome</h2>
        </div>
         <?php foreach($about as $a) : ?>
        <div class="row">
            <div class="col-md-8">
               <h3 style="font-weight: bold;"><?= $a['judul']; ?></h3>
               <p><?= $a['deskripsi']; ?></p>

            </div>
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') .$a['gambar']; ?>" class="img-fluid about-img" alt="#">
            </div>
        </div>
        <?php endforeach;?>
    </div>
</section>
<!--============================= WISATA ALAM =============================-->

<section class="our_courses" >
    <div class="container">
        <div class="row justify-content-around">
        <h2  style="font-weight: bold;">Wisata Alam</h2>
        </div> 
        <div class="mb-3 row justify-content-around">
        <p>Berikut ini adalah daftar objek Wisata Alam yang terdapat di provinsi Sumatera Barat.</p>
        </div>
        <div class="row mb-5" >
        <?php foreach($alam as $a) : ?>
         <div class="card mb-3 float-left mr-5 m-auto" style="max-width: 500px;">
  <img src="<?= base_url('assets/img/profile/') .$a['foto']; ?>" class="card-img-top" alt="...">
          
  <div class="card-body">
  <a href="<?= base_url('v_alam/detail/') .$a['id']; ?>" class="course-box-content">
  <div class="container">
    </div>
    <h3 class="card-title font-weight-bold"><?=$a['objek_wisata']; ?></h3>
    <p class="card-text"><?= limit_words($a['deskripsi'],10).'...'; ?></p>
    <p class="card-text"><small class="text-muted"><?= $a['daerah']; ?>, <?=$a['lokasi']; ?></small></p>
  </a>
  </div>
        <div   class="container ml-2 mb-2" style="margin-top: -20px;font-size: 12px;">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            </div>
</div>
        <?php endforeach;?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo site_url('v_alam/v_alam');?>" class="btn btn-default btn-courses">View More</a>
            </div>
        </div>
    </div>

</section>
<!--//END WISATA ALAM -->
<!--============================= WISATA BAHARI =============================-->
<section class="our_courses" style="background-color: #ede5e5;">
    <div class="container">
        <div class="row justify-content-around">
        <h2  style="font-weight: bold;">Wisata Bahari</h2>
        </div>
        <div class="mb-3 row justify-content-around">
        <p>Berikut ini adalah daftar objek Wisata Bahari yang terdapat di provinsi Sumatera Barat.</p>
        </div>
        <div class="row mb-5">
        <?php foreach($bahari as $b) : ?>
         <div class="card bg-secondary mb-3 float-left mr-5 m-auto" style="max-width: 500px;">
  <img src="<?= base_url('assets/img/profile/') .$b['gambar']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
  <a href="<?= base_url('v_bahari/detail/') .$b['id']; ?>" class="course-box-content">
    <h3 class="card-title font-weight-bold"><?=$b['objek_wisata']; ?></h3>
    <p class="card-text "><?= limit_words($b['deskripsi'],10).'...'; ?></p>
    <p class="card-text"><small class="text-muted"><?= $b['daerah']; ?>, <?=$b['lokasi']; ?></small></p>
  </a>
  </div>
     <div   class="container ml-2 mb-2" style="margin-top: -20px;font-size: 12px;">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star"></span>
            </div>
</div>
        <?php endforeach;?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo site_url('v_bahari/v_bahari');?>" class="btn btn-default btn-courses">View More</a>
            </div>
        </div>
    </div>

</section>
<!--//END WISATA BAHARI -->

<!--============================= WISATA KULINER =============================-->
<section class="our_courses" >
    <div class="container">
        <div class="row justify-content-around">
        <h2  style="font-weight: bold;">Wisata Kuliner</h2>
        </div>
        <div class="mb-3 row justify-content-around">
        <p>Berikut ini adalah daftar objek Wisata Kuliner yang terdapat di provinsi Sumatera Barat.</p>
        </div>
        <div class="row mb-5">
        <?php foreach($kuliner as $k) : ?>
         <div class="card bg-secondary mb-3 float-left mr-5 m-auto" style="max-width: 500px;">
  <img src="<?= base_url('assets/img/profile/') .$k['gambar']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
  <a href="<?= base_url('v_kuliner/detail/') .$k['id']; ?>" class="course-box-content">
    <h3 class="card-title font-weight-bold"><?=$k['objek_wisata']; ?></h3>
    <p class="card-text "><?= limit_words($k['deskripsi'],10).'...'; ?></p>
    <p class="card-text"><small class="text-muted"><?= $k['daerah']; ?>, <?=$k['lokasi']; ?></small></p>
  </a>
  </div>
     <div   class="container ml-2 mb-2" style="margin-top: -20px;font-size: 12px;">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            </div>
</div>
        <?php endforeach;?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo site_url('v_kuliner/v_kuliner');?>" class="btn btn-default btn-courses">View More</a>
            </div>
        </div>
    </div>

</section>
<!--//END WISATA KULINER -->
<!--============================= WISATA EDUKASI =============================-->
<section class="our_courses" style="background-color: #ede5e5;">
    <div class="container">
        <div class="row justify-content-around">
        <h2  style="font-weight: bold;">Wisata Edukasi</h2>
        </div>
        <div class=" mb-3 row justify-content-around">
        <p>Berikut ini adalah daftar objek Wisata Edukasi yang terdapat di provinsi Sumatera Barat.</p>
        </div>
        <div class="row mb-5">
        <?php foreach($edukasi as $bdy) : ?>
         <div class="card bg-secondary mb-3 float-left mr-5 m-auto" style="max-width: 500px;">
  <img src="<?= base_url('assets/img/profile/') .$bdy['gambar']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
  <a href="<?= base_url('v_edukasi/detail/') .$bdy['id']; ?>" class="course-box-content">
    <h3 class="card-title font-weight-bold"><?=$bdy['objek_wisata']; ?></h3>
    <p class="card-text "><?= limit_words($bdy['deskripsi'],10).'...'; ?></p>
    <p class="card-text"> <small class="text-muted">  <?= $bdy['daerah']; ?>, <?=$bdy['lokasi']; ?></small></p>
  </a>
  </div>
    <div   class="container ml-2 mb-2" style="margin-top: -20px;font-size: 12px;">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            </div>
</div>
        <?php endforeach;?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo site_url('v_edukasi/v_edukasi');?>" class="btn btn-default btn-courses">View More</a>
            </div>
        </div>
    </div>

</section>
<!--//END WISATA EDUKASI -->
<!--============================= WISATA BUDAYA =============================-->
<section class="our_courses" style="background-color: #cee5f1;">
    <div class="container">
        <div class="row justify-content-around">
        <h2  style="font-weight: bold;">Wisata Budaya</h2>
        </div>
        <div class=" mb-3 row justify-content-around">
        <p>Berikut ini adalah daftar objek Wisata Budaya yang terdapat di provinsi Sumatera Barat.</p>
        </div>
        <div class="row mb-5">
        <?php foreach($budaya as $bdy) : ?>
         <div class="card bg-secondary mb-3 float-left mr-5 m-auto" style="max-width: 500px;">
  <img src="<?= base_url('assets/img/profile/') .$bdy['gambar']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
  <a href="<?= base_url('v_budaya/detail/') .$bdy['id']; ?>" class="course-box-content">
    <h3 class="card-title font-weight-bold"><?=$bdy['objek_wisata']; ?></h3>
    <p class="card-text "><?= limit_words($bdy['deskripsi'],10).'...'; ?></p>
    <p class="card-text"> <small class="text-muted">  <?= $bdy['daerah']; ?>, <?=$bdy['lokasi']; ?></small></p>
  </a>
  </div>
     <div   class="container ml-2 mb-2" style="margin-top: -20px;font-size: 12px;">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            </div>
</div>
        <?php endforeach;?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo site_url('v_budaya/v_budaya');?>" class="btn btn-default btn-courses">View More</a>
            </div>
        </div>
    </div>

</section>
<!--//END WISATA BUDAYA -->

<!--============================= PENGINAPAN =============================-->

<section class="our_courses" style="background-color: #1781c5;" >
    <div class="container" >
         <div class="row justify-content-around">
        <h2  style="font-weight: bold;">Hotel dan Penginapan</h2>
        </div>
        <div class=" mb-3 row justify-content-around">
        <p>Berikut ini adalah daftar Hotel dan Penginapan yang terdapat di provinsi Sumatera Barat.</p>
        </div>
        <div class="row ">
         <?php foreach($hotel as $h) : ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 ">
                <div class="courses_box mb-4  ">
                    <div class="course-img-wrap  ">
                        <img src="<?= base_url('assets/img/profile/') .$h['gambar']; ?>" class=" img-fluid" alt="courses-img">
                    </div>
                    <!-- // end .course-img-wrap -->
                    <a href="<?= base_url('v_hotel/detail/') .$h['id']; ?>" class="course-box-content">
                        <h3 style="text-align:center;"><?=$h['nama_hotel']; ?></h3>
                        <p class="card-text"><small class="text-muted"><b>Rp.<?= number_format($h['tarif'], 2, ",", "."); ?></b></small></p>
                     <p class="card-text "><?= limit_words($h['deskripsi'],10).'...'; ?></p>
                     <p class="card-text"><small class="text-muted"> <i class="fa fa-paper-plane"></i> <?= $h['daerah']; ?>, <?=$h['lokasi']; ?></small></p>
                    </a>
                    
                </div>
            </div>
          <?php endforeach;?>
        </div> <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo site_url('v_hotel/v_hotel');?>" class="btn btn-default btn-courses">View More</a>
            </div>
        </div>
    </div>
</section>
<!--//END PENGINAPAN -->
<!--============================= EVENTS =============================-->
<section class="event">
    <div class="container">
        <div class="container" >
         <div class="row justify-content-around">
        <h2  style="font-weight: bold;">Event</h2>
        </div>
        <div class=" mb-3 row justify-content-around">
        <p>Berikut ini adalah daftar Event - Event yang terdapat di provinsi Sumatera Barat.</p>
        </div>
                    <div class="col">
                     <?php foreach($event as $e) : ?>
                        <div class="event_date">
                            <div class="event-date-wrap">
                                <p><?php echo date("d", strtotime($e['tanggal']));?></p>
                                <span><?php echo date("M. y", strtotime($e['tanggal']));?></span>
                            </div>
                        </div>
                        <div class="date-description">
                            <h3><a href="<?= base_url('v_event/detail/') .$e['id']; ?>"><?=$e['nama_event']; ?></a></h3>
                            <p><?= limit_words($e['deskripsi'],20).'...'; ?></p>
                            <hr class="event_line">
                        </div>
                        <?php endforeach;?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo site_url('v_event/v_event');?>" class="btn btn-default btn-courses">View More</a>
            </div>
        </div>
    </div>
</section>
<!--//END EVENTS -->
