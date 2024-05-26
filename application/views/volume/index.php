
    

<br><br><br>
<br><br>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Volume: <?php echo $volume[0]['vol_name']   ?></h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-sm-8">
            <?php include APPPATH.'views/components/articles/article_card.php'; ?>
        </div>

        <div class="col-sm-4">
            <?php include APPPATH.'views/components/volume/volume_card.php'; ?>
        </div>

    </div>
                 
   
</div>
