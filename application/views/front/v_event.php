

<section class="clearfix about about-style2"style="background-color: #ede5e5;" >
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="  h3 mb-4 text-gray-800">Kategori :  <?= $title; ?></h1>

            </div>
            <div class="col-md-4">
                            <form action="<?php echo site_url('v_event/search');?>" method="get">
                    <input type="text" name="keyword" placeholder="Nama Event.." class="blog-search" required>
                    <button type="submit" class="btn btn-warning btn-blogsearch">Telusuri</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="event">
    <div class="container">
        <div class="container" >
        
                    <div class="col">
                        <?php foreach($data->result() as $row):?>
                        <div class="event_date">
                            <div class="event-date-wrap">
                                <p><?php echo date("d", strtotime($row->tanggal));?></p>
                                <span><?php echo date("M Y", strtotime($row->tanggal));?></span>
                            </div>
                            <span class="event-time"><?php echo $row->daerah;?></span>
                        </div>
                        <div class="date-description">
                            <h3><a href="<?php echo site_url('v_event/detail/'.$row->id);?>"><?php echo $row->nama_event;?></a></h3>
                            <p><?php echo limit_words($row->deskripsi,35).'...';?></p>
                            <hr class="event_line">
                        </div>
                        <?php endforeach;?>

                 
        </div>
    </div>
</section>
    
