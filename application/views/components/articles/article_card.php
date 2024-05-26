<?php 

    foreach ($articles as $article) {
    ?> 

    <div class="card" data-aos="fade-up">
        <div class="card-body">
            <h1 class="font-weight-bold"><?php echo $article['title']; ?></h1>
            <p class="card-text"><b>Authors:</b><?php echo $article['authors']; ?></p>
            <p class="card-text"><?php echo  word_limiter($article['abstract'],150);  ?>  </p>
            <a href="<?php echo base_url('articles/view/'.$article['article_id']) ?>" class="btn btn-primary">Read More</a>
        </div>
    </div>

    <?php
    }
?>