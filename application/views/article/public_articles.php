<br><br><br>
<br>


<div class="container">
    <div class="card mb-2">
        <div class="card-body">
            <h5>Articles</h5>
        </div>
    </div>

    <?php 
                        
    foreach ($articles as $article) {
    ?> 
    
    <!-- Start Cards -->
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title"><?php echo $article['title']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
               <i>Date Published:</i>   <?php echo $article['date_published']; ?>   
                <i>DOI:</i> <?php echo $article['doi']; ?>
            </h6>
            <h6 class="card-subtitle mb-2 text-muted">
                <i>Keywords</i>        <?php echo $article['keywords']; ?>
            </h6>
            <p class='m-0'    ><i>Abstract</i></p>
            <p class="card-text text-muted">
            <?php echo $article['abstract']; ?>
            </p>
            <span class="card-link">Author: <?php echo $article['name']; ?> </span>
            <!-- <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a> -->
        </div>
    </div>
    <!-- End Cards -->
    <?php
        }
    ?>


</div>