<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
 <div class="row justify-content-around">
        <h3 class="modal-title" id="myModalLabel" style="font-weight: bold;"><?= $title; ?></h3><br>
         <a href="<?= site_url('pariwisata/kuliner') ?>" class="btn btn-secondary ">
                        Kembali
                    </a>
    </div>
<div class="row justify-content-around">
        <div class="col-lg-8">
               <form>
                <div class="modal-body">
                    <div class="form-group">
                    <label style="font-weight: bold;">Nama Objek Wisata</label>
                    <input type="text" class="form-control" id="objek_wisata" name="objek_wisata" value="<?= $detail['objek_wisata']; ?>" readonly>
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Daerah Objek Wisata</label>
                    <input type="text" class="form-control" id="daerah" name="daerah" value="<?= $detail['daerah']; ?>" readonly>
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Lokasi Objek Wisata</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $detail['lokasi']; ?>" readonly>
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Jarak Tempuh Dari Kab/Kota (KM)</label>
                    <input type="text" class="form-control" id="jarak_tempuh" name="jarak_tempuh" value="<?= $detail['jarak_tempuh']; ?>" readonly>
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Deskripsi</label>
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