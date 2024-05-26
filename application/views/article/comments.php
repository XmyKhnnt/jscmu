
    

<br><br><br>
<br><br><br>
<div class="container">
    

<div class="card mb-2 p-0">
    <div class="card-body ">
        <h4 class="p-0 m-0 ">Comments</h4 >
    </div>
</div>
        <div class="card">
        <div class="card-header">
            <p>Assigned: <?php echo $comments[0]['complete_name']  ?></p>
            <p>Title: <?php echo $comments[0]['title']  ?></p>
        </div>
        
        </div>

        <table class="table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Comments </th>
                    <th>Reviewer</th>
                   
                </tr>
            </thead>
            <tbody>
                    <?php 
                    
                    foreach ($comments as $comment) {
                    ?> 
                    
                        <tr>
                            
                            <td>
                                <?php echo $comment['comment_id']; ?> 
                               
                            </td>
                            <td>
                                
                                <?php echo $comment['comments']; ?>
                            </td>
                            <td>
                               <?php echo $comment['complete_name'] ?>
                            </td>
                           
                            
                        </tr>
                    <?php
                    }
                    ?>
            </tbody>

        </table>
        
          

</div>
