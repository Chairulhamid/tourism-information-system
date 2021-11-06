<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row justify-content-around">
        <h3 class="modal-title" id="myModalLabel" style="font-weight: bold;"><?= $title; ?></h3>
           <a href="<?= site_url('media/about') ?>" class="btn btn-secondary ">
                        Kembali
                    </a>
    </div>
    <div class="row justify-content-around">
        <div class="col-lg-8">
                <?= form_open_multipart('media/tambah_data_about'); ?>
                <div class="modal-body">
                    <div class="form-group">
                    <label style="font-weight: bold;">Judul</label>
                    <textarea class="form-control" id="judul" name="judul" rows="5"  readonly><?= $detail['judul']; ?></textarea>
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Text</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" readonly><?= $detail['deskripsi']; ?></textarea>
                    </div>
                
                    <div class="form-group">
                    <label style="font-weight: bold;">Gambar</label>
                    <img src="<?= base_url('assets/img/profile/') . $detail['gambar']; ?>" class="card-img"  height="300">
                    </div>
            
            </div>
            
            
            
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 