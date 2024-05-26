
    

<br><br><br>
<br><br><br>
<div class="container">
    

            <div class="card mb-2 p-0">
                <div class="card-body ">
                    <h4 class="p-0 m-0 ">Assigned Articles</h4 >
                </div>
            </div>
            <div class="card">
                <div class="card-body">

            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                       
                        <th scope="col">Submission ID</th>
                        <th scope="col">Title</th>
                       
                        
                      
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
                                    
                                    <?php echo $article['complete_name']; ?>
                                </td>
                                <td>
                                    <?php echo $article['submission_id']; ?>
                                </td>
                                <td>
                                    <?php echo $article['title']; ?>
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
