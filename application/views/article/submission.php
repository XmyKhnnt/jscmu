
    

<br><br><br>
<br><br><br>
<div class="container">
    

            <div class="card mb-2 p-0">
                <div class="card-body ">
                    <h4 class="p-0 m-0 ">Submission</h4 >
                </div>
            </div>
            <div class="card">
                <div class="card-body">

            <div class="table-responsive">

            <table class="table ">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Filename</th>
                        <th>Published</th>
                        <th>Submission</th>
                        <th>Payment</th>
                        <th>Review</th>
                        <th style="width: 200px;">Date Forwarded Review</th>
                        <th>Approved</th>
                        <th style="width: 200px;">Date Approved</th>
                        <th>Layout</th>
                        <th style="width: 200px;">Date Forwarded</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        
                        foreach ($articles as $article) {
                        ?> 
                        
                            <tr>
                                
                                <td>
                                    <?php echo $article['submission_id']; ?> 
                                  
                                </td>
                                <td>
                                    <a href="
                                    <?php echo base_url('comment')  ?>/<?php echo $article['submission_id']; ?>">
                                    <?php echo $article['title']; ?>
                                    </a>
                                </td>
                                <td>
                                   <?php echo $article['filename'] ?>
                                </td>
                               
                                <td>
                                    <?php 
                                    if ($article['published'] == 'Yes') {
                                        echo "Published";
                                    } else {
                                        echo "Not Published";
                                    }
                                    ?> <br>
                                    <?php echo $article['date_published']; ?>
                                </td>
                                <td>
                                    <?php echo $article['submission']; ?>  
                                </td>
                                <td>
                                    <?php 
                                    if ($article['payment'] == 'Yes') {
                                        echo "Paid";
                                    } else {
                                        echo "Not Paid";
                                    }
                                   ?>
                                </td>
                                <td>
                                    <?php 
                                    if ($article['review'] == 1) {
                                        echo "Reviewed";
                                    } else {
                                        echo "Not Reviewed";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $article['date_forwarded_review']; ?>
                                </td>
                                <td>
                                    <?php 
                                    if ($article['approved'] == 1) {
                                        echo "Approved";
                                    } else {
                                        echo "Not Approved";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $article['date_approved']; ?>
                                </td>
                                <td>
                                    <?php 
                                    if ($article['layout'] == 1) {
                                        echo "Layout Done";
                                    } else {
                                        echo "Layout Not Done";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $article['date_forwarded']; ?>
                                </td>
                            </tr>
                            


                        <?php
                        }
                        ?>
                        </div>
                    </div>
              </tbody>
        </table>
        </div>
           
        
    </div>
</div>
