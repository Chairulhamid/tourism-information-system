
      <div class="container mt-5 mb-3">
      <h1 class="h3 mb-4 text-gray-800">Kategori :  <?= $title; ?></h1>
      </div>

      <section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
              <?php echo $this->session->flashdata('msg');?>
              <?php foreach ($data->result() as $row) : ?>
                <div class="blog-single-item">
                    <div class="blog-img_block">
                        <img src="<?php echo base_url().'assets/img/profile/'.$row->gambar;?>" width="800" class="img-fluid" alt="blog-img">
                      
                    </div>
                    <div class="blog-tiltle_block">
                        <h4><a href="<?php echo site_url('v_hotel/detail/'.$row->id);?>"><?php echo $row->nama_hotel;?></a></h4>
                         <div   class="mb-2" style=" font-size: 12px;">
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star "></span> <i class="fas fa-phone-alt"></i>
                          <span class="fa fa-star"></span>
                          <span class="fa fa-star"></span>
                          </div>
                        <h6> <a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i><span><?php echo $row->daerah;?></span> </a>  |   <a href="#"><i class="fa fa-tags" aria-hidden="true"></i><span><?php echo $row->lokasi;?></a>  |   <a href="#"><i class="fa fa-tags" aria-hidden="true"></i><span><?php echo $row->nohp;?></a></h6>
                        <h5 class="mt-4">Rp.<?= number_format($row->tarif, 2, ",", "."); ?></h5>
                        <?php echo limit_words($row->deskripsi,35).'...';?>
                        <div class="blog-icons">
                            <div class="blog-share_block">
                                <a href="<?php echo site_url('v_hotel/detail/'.$row->id);?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
              <?php endforeach;?>
            </div>
            
            <div class="col-md-4">
            <h4><b>Pencarian</b></h4>
                            <form action="<?php echo site_url('v_hotel/search');?>" method="get">
                    <input type="text" name="keyword" placeholder="Nama Penginapan.." class="blog-search" required>
                    <button type="submit" class="btn btn-warning btn-blogsearch">Telusuri</button>
                </form>
                <div class="blog-category_block">
                  <h3>Nama Kabupaten / Kota</h3>
                  <ul>
                    <?php foreach ($category->result() as $row) : ?>
                      <li><a href="<?php echo site_url('v_hotel/v_hotel/'.str_replace(" ","-",$row->namakabKota));?>"><?php echo $row->namakabKota;?><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                    <?php endforeach;?>
                  </ul>
                </div>

            </div>
        </div>
    </div>
</section>
<!--//END BLOG -->
