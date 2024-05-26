<br><br><br><br>

<div class="container">

<div class="row">
    <div class="col-sm-8">
                <div class="card">
                <div class="card-header">
                    <h4><?php echo $article['title']; ?></h4>
                    <p><b>Author: <?php echo $article['authors'] ?>  </b>  </p>
                </div>
                <div class="card-body pt-0">
                    <p><?php echo $article['abstract']; ?></p>

                    <br>
                    <span class="badge bg-secondary"><?php echo $article['keywords']  ?></span>
                    <p><b>DOI:<?php echo $article['doi']  ?></b></p>
                
                </div>
            </div>
    </div>

    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">Volume</div>
            <div class="card-body">
                <p><a href=""><?php echo $article['vol_name']; ?></a></p>
                
            </div>
        </div>
    </div>

</div>

</div>
