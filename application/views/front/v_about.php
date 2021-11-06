

 <section class="clearfix about about-style2" style="background-color: #f0ad4e;">
    <div class="container">
     <div class="mb-5 row justify-content-around">
        <h2  style="font-weight: bold;">About</h2>
        </div>
         <?php foreach($about as $a) : ?>
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') .$a['gambar']; ?>" class="img-fluid about-img" alt="#">

            </div>
            <div class="col-md-8">
               <h2 style="font-weight: bold;"><?= $a['judul']; ?></h2>
               <p><?= $a['deskripsi']; ?></p>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</section>