<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
 <div class="row justify-content-around">
        <h3 class="modal-title" id="myModalLabel" style="font-weight: bold;"><?= $title; ?></h3><br>
         <a href="<?= site_url('pariwisata/hotel') ?>" class="btn btn-secondary ">
                        Kembali
                    </a>
    </div>
<div class="row justify-content-around">
        <div class="col-lg-8">
               <form>
                <div class="modal-body">
                    <div class="form-group">
                    <label style="font-weight: bold;">Nama Hotel</label>
                    <input type="text" class="form-control" id="objek_wisata" name="objek_wisata" value="<?= $detail['nama_hotel']; ?>" readonly>
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Daerah Hotel</label>
                    <input type="text" class="form-control" id="daerah" name="daerah" value="<?= $detail['daerah']; ?>" readonly>
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Lokasi Hotel</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $detail['lokasi']; ?>" readonly>
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Tarif Harga</label>
                    <input type="text" class="form-control" id="tarif" name="tarif" value="<?= $detail['tarif']; ?>" readonly>
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">No Telephon</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $detail['nohp']; ?>" readonly>
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