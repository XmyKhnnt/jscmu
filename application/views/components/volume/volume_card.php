



<div class="card">
    <div class="card-header">Volume</div>
    <div class="card-body">
        <?php 
        foreach ($volumes as $volume) {
            ?> 
            <p><a href="<?php echo base_url('volumes') ?>/<?php echo $volume['volumeid']; ?>"><?php echo $volume['vol_name']; ?></a></p>
            
        <?php
        }       
        ?>
        
    </div>

</div>