
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create New Article</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
        <form action="<?php echo site_url('articles'); ?>" method="post" enctype="multipart/form-data" >
     
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title"  required placeholder="Title" class="form-control">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Keywords</label>
                <input type="text" name="keywords" id="title" required placeholder="keywords," class="form-control">
            </div>

            <div class="mb-3">
                <label for="doi" class="form-label">DOI</label>
                <input type="text" name="doi" id="doi" placeholder="doi:" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="abstract" class="form-label">Abstract</label>
                <textarea name="abstract" id="abstract" required class="form-control" cols="30" rows="10"></textarea>
                <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'abstract' );
                </script>
            </div>
            <div class="mb-3">
                <label for="volume" class="form-label">Volume</label>
                <select class="form-select" name="volume" id="volume" required>
                    <option value="">Select Volume</option>
                    <?php foreach ($volumes as $volume) { ?>
                        <option value="<?php echo $volume['volumeid']; ?>"><?php echo $volume['vol_name']; ?></option>
                    <?php } ?>
                </select>
              
            </div>

            <div class="mb-3">
                <label for="volume" class="form-label">Authors</label>
                <select class="form-select" name="author" id="volume" required>
                    <option value="">Select Author</option>
                    <?php foreach ($authors as $volume) { ?>
                        <option value="<?php echo $volume['auid']; ?>"><?php echo $volume['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" name="file" id="file" accept="application/pdf"  required class="form-control">
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
    </form>

        </div>
        
        </div>
    </div>
    </div>
    <br><br><br>
    <div class="container">
        

            <div class="card mb-2 p-0">
                <div class="card-body d-flex justify-content-between  ">
                    <h4 class="p-0 m-0 ">Articles</h4 >
                    <form action="" method="get" >
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="search" name="q" placeholder="Enter search term">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                </form>
                    <a href="<?php echo site_url('article/add')  ?>" class="btn btn-primary" >Add Article</a>
                </div>
             

            </div>

            <div class="card">
                <div class="card-body">

            
            <table class="table">
                <thead>
                    <tr>
                     
                       
                        <th scope="col">Title</th>
                       
                        <th scope="col">Keywords</th>
                        <th scope="col">Volume</th>
                     
                        <th></th>
                        
                      
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        
                        foreach ($articles as $article) {
                        ?> 

                            
                            <tr>
                               
                               
                                <td>
                                     <b><?php echo $article['title']; ?></b> 
                                    <br>
                                    
                                    <small><b>Authors:</b> <?php echo $article['authors']; ?></small> <br>
                                    <small> 
                                      <b>DOI</b> : <?php echo $article['doi']; ?>
                                    </small>
                                </td>
                               
                                <td style="max-width: 300px;">
                                    <?php echo $article['keywords']; ?>
                                </td>
                                <td>
                                    <?php echo $article['vol_name']; ?>
                                </td>
                             
                                <td>
                                  
                                    <a href="<?php echo site_url('download/'.$article['filename'] )?>">   <?php echo $article['filename']; ?></a>
                                 
                                </td>
                                
                                <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                    <ul class="dropdown-menu">
                                        <li> 
                                            <a href="<?php echo site_url('articles/info/'.   $article['article_id'])  ?>"  class="dropdown-item" >View Details</a>
                                        </li>
                                        
                                        <li>
                                           
                                                <!-- <button  class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_art_<?php echo  $article['article_id']; ?>">Edit</button> -->
                                                <a href="<?php echo site_url('articles/edit_art/'.   $article['article_id'])  ?>"  class="dropdown-item" >Edit</a>
                                            
                                        </li>

                                    
                                        <li>
                                                <button  class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delemol<?php echo $article['article_id']; ?>mm">Delete</button>
                                                <!-- Modal -->
                                               
                                        </li>
                                    </ul>
                                </div>
                                </td>

                            </tr>
                            
                            

                            <!-- Delete -->
                                <div class="modal fade" id="delemol<?php echo   $article['article_id'] ?>mm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="text-center">You are about to delete Author: <?php echo  $article['article_id']; ?> </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a  href="<?php echo site_url('articles/delete/' . $article['article_id'] )?>" class="btn btn-danger">Delete</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>  
                                        
                            <!-- edit -->
                                <div class="modal fade" id="edit_art_<?php echo  $article['article_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                <form action="<?php echo site_url('articles/update/'. $article['article_id'] ); ?>" method="post" enctype="multipart/form-data" >
     
     <div class="mb-3">
         <label for="title" class="form-label">Title</label>
         <input type="text" name="title" id="title" value="<?php echo  $article['title']; ?>"  required placeholder="Title" class="form-control">
     </div>

     <div class="mb-3">
         <label for="title" class="form-label">Keywords</label>
         <input type="text" name="keywords" id="title"  value="<?php echo  $article['keywords']; ?>"   required placeholder="keywords," class="form-control">
     </div>

     <div class="mb-3">
         <label for="doi" class="form-label">DOI</label>
         <input type="text" name="doi" id="doi" placeholder="doi:"  value="<?php echo  $article['doi']; ?>"  required class="form-control">
     </div>
     <div class="mb-3">
         <label for="abstract" class="form-label">Abstract</label>
         <textarea name="abstract" id="abstract<?php echo $article['article_id'] ?>" required class="form-control" cols="30" rows="10"><?php echo  $article['abstract']; ?></textarea>
         <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'abstract<?php echo $article['article_id'] ?>' );
        </script>                   
     </div>
     <div class="mb-3">
         <label for="volume" class="form-label">Volume</label>
         <select class="form-select" name="volume" id="volume" required>
            <option value="">Select Volume</option>
            <?php foreach ($volumes as $volume) { ?>
                <option value="<?php echo $volume['volumeid']; ?>" <?php echo ($volume['volumeid'] == $article['volumeid']) ? 'selected' : ''; ?>>
                    <?php echo $volume['vol_name']; ?>
                </option>
            <?php } ?>
        </select>

     </div>

   

     <div class="mb-3">
         <label for="file" class="form-label">Upload File</label>
         <input type="file" name="file" id="file" accept="application/pdf"   class="form-control">
     </div>
 
     <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Update</button>
     </div>
</form>
                                                </div>

                                                
                                        </div>
                                    </div>
                                </div>  
                                        
        
                        <?php
                        }
                        ?>
                        </div>
                    </div>
              </tbody>
        </table>
           
           
        
    </div>
</div>
