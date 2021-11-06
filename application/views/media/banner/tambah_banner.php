<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row justify-content-around">
        <h3 class="modal-title" id="myModalLabel" style="font-weight: bold;"><?= $title; ?></h3>
    </div>
    <div class="row justify-content-around">
        <div class="col-lg-8">
                <?= form_open_multipart('media/tambah_data_banner'); ?>
                <div class="modal-body">
                    <div class="form-group">
                    <label style="font-weight: bold;">Judul</label>
                    <textarea class="form-control ckeditor" id="judul" name="judul" rows="5" placeholder="Judul..."></textarea>
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Text</label>
                    <textarea class="form-control ckeditor" id="text" name="text" rows="5" placeholder="Text..."></textarea>
                    </div>
                
                    <div class="form-group">
                    <label style="font-weight: bold;">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
            
            </div>
            
            <div class="form-group row col-md-8">
                <div class="col-md-10">
                    <button type="submit" class="btn btn-success "> Tambah</button>
                    <a href="<?= site_url('media/banner') ?>" class="btn btn-secondary btn-flat">
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