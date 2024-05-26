<br><br><br><br>


<div class="container">

<div class="card" >
   
        <div class="card-body">
            <div class="d-flex justify-content-end"> 
           
                <a href="<?php echo site_url('articles/edit_art/'.   $articles[0]['article_id'])  ?>" class="btn btn-primary">Edit</a>
            </div>
            <h1 class="font-weight-bold"><?php echo $articles[0]['title']; ?></h1>
            <p class="card-text"><b>Authors:</b><?php echo $articles[0]['authors']; ?></p>
            <p class="card-text"><b>DOI:</b><?php echo $articles[0]['doi']; ?></p>
            <p class="card-text"><b>Volume:</b><?php echo $articles[0]['vol_name']; ?></p>
            <p class="card-text"><?php echo $articles[0]['abstract'];  ?>  </p>
            <br>
            
          
        </div>
    </div>



</div>

