<div class="container">

    <br><br><br>
    <div class="card ">
        <div class="card-header">
        <h1><?php echo $volume['vol_name'] ?></h1> 
           
        <hr>
        </div>
        <div class="card-body">
           <p> <b>Published Date:</b>  <?php echo $volume['date_at'] ?></p>
           <p><b>Description</b></p>
        
           <div class="card-header">
           <?php echo $volume['description'] ?>    
        <hr>
        </div>
    </div>
    <?php include APPPATH.'views/components/articles/auth_art.php'; ?>
</div>