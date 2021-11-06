<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row justify-content-around">
        <h3 class="modal-title" id="myModalLabel" style="font-weight: bold;"><?= $title; ?></h3>
    </div>
    <div class="row justify-content-around">
        <div class="col-lg-8">
                <?= form_open_multipart('event/tambah_data_event'); ?>
                <div class="modal-body">
                    <div class="form-group">
                    <label style="font-weight: bold;">Nama Event</label>
                    <input type="text" class="form-control" id="nama_event" name="nama_event" placeholder="Nama Event...">
                    </div>
                   <div class="form-group">
                     <label style="font-weight: bold;">Nama Daerah</label>
                        <select name="daerah" id="daerah" class="form-control">
                            <option value="">Pilih Daerah</option>
                            <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['namakabKota']; ?>"><?= $k['namakabKota']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Lokasi Event</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Event...">
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Event...">
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Deskripsi</label>
                    <textarea class="form-control ckeditor" id="deskripsi" name="deskripsi" rows="5" placeholder="Deskripsi..."></textarea>
                    </div>
                
                    <div class="form-group">
                    <label style="font-weight: bold;">Foto</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
            
            </div>
            
            <div class="form-group row col-md-8">
                <div class="col-md-10">
                    <button type="submit" class="btn btn-success "> Tambah</button>
                    <a href="<?= site_url('event') ?>" class="btn btn-secondary btn-flat">
                        Kembali
                    </a>
                </div>
            </div>
            
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 