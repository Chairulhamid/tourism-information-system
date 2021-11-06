<div class="container mt-5 mb-3">
      <h1 class="h3 mb-4 text-gray-800">Kategori :  <?= $title; ?></h1>
      </div>

 <section class="mb-5">
    <div class="container">
        <div class="row justify-content-around text-center">
            <div class="col-md-12">
                <div class="blog-single-item">
                    <div class="blog-img_block">
                        <img src="<?= base_url('assets/img/profile/') . $detail['gambar']; ?>" width="800" class="img-fluid" alt="blog-img">
                    </div>
                    <div class="blog-tiltle_block">
                        <h2 class="mb-4"><?= $detail['nama_event']; ?></h2>
                        <h6> <a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i><span><?= $detail['daerah']; ?></span> </a>  |   <a href="#"><i class="fa fa-tags" aria-hidden="true"></i><span><?= $detail['lokasi']; ?></span></a></h6>
                       <?= $detail['deskripsi']; ?>
                       
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</section>