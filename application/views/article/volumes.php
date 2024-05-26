
<div class="container">
    
            <br><br><br>
            <div class="card mb-2 p-0">
                <div class="card-body d-flex justify-content-between ">
                    <h4 class="p-0 m-0 ">Volumes</h4 >
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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_volume_xx">Add Volume</button>
                </div>

                <!--  Add Author Modal -->
                <div class="modal fade" id="add_volume_xx" tabindex="-1" aria-labelledby="add_volume_xxLabel" aria-hidden="true">
                <div class="modal-dialog">
                    
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_author_xxLabel">Add Volume</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Name</label>
                                <input type="text" name="name" id="name" required placeholder="Volume name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="abstract" class="form-label">Description</label>
                                <textarea name="description" id="description" required class="form-control" cols="30" rows="10"></textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor 4
                                    // instance, using default configuration.
                            CKEDITOR.replace( 'description' );
                            </script>  
                          
                            </div>

                         
                         

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </form>
                    </div>
                </div>
                </div>


            </div>
            <div class="card">
                <div class="card-body">

            
            <table class="table">
                <thead>
                    <tr>
                        
                        <th scope="col">Volume Name</th>

                        <th scope="col">Description</th>
                        <th scope="col">Date Published</th>

                        <th scope="col">Published</th>

                    </tr>
                </thead>
                <tbody>
                        <?php 
                        
                        foreach ($volumes as $volume) {
                        ?> 

                            <tr>
                               
                               
                                <td>
                                    <?php echo $volume['vol_name']; ?>
                                    
                                </td>
                                <td>
                                    <?php echo $volume['description']; ?>
                                </td>
                                <td>
                                    <?php echo $volume['date_at']; ?>
                                </td>
                               
                                <td>
                                    <?php 
                                  
                                    if ($volume['published'] == 1){
                                        echo  "<span class='badge bg-success mx-4'> </span>";
                                    }else{
                                        echo "<span class='badge bg-danger mx-4'> </span>";
                                    }
                                    ?>
                                </td>

                                <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                    <ul class="dropdown-menu">
                                    <li>
                                           
                                           <a href="<?php  echo site_url('volumes/info/'. $volume['volumeid'] )  ?>" class="dropdown-item" >View Details</a>
                                       
                                   </li>
                                       
                                        <li>
                                           
                                                <button  class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editmol<?php echo  $volume['volumeid'] ?>mm">Edit</button>
                                            
                                        </li>

                                    
                                        <li>
                                                <button  class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delemol<?php echo  $volume['volumeid'] ?>mm">Delete</button>
                                                <!-- Modal -->
                                                

                                               
                                        </li>
                                    </ul>
                                </div>
                                </td>
                               
                                
                            </tr>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editmol<?php echo  $volume['volumeid'] ?>mm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update <?php echo  $volume['volumeid'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                            <form action="<?php echo site_url('volumes/' .$volume['volumeid'] . '/update')?>" method="post">
                                                    <div class="modal-body">
                                                    
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Name</label>
                                                        <input type="text" name="name" value="<?php echo $volume['vol_name'];  ?>" required placeholder="Volume Name" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="abstract" class="form-label">Description</label>
                                                        <textarea name="description" id="description<?php echo $volume['volumeid']  ?>" 
                                                        required class="form-control" cols="30" rows="10"><?php echo $volume['description'];  ?></textarea>
                                                    </div>
                                                    <script>
                                                            // Replace the <textarea id="editor1"> with a CKEditor 4
                                                            // instance, using default configuration.
                                                    CKEDITOR.replace( 'description<?php echo $volume['volumeid']  ?>' );
                                                    </script> 

                                                    <div class="mb-3">
                                                        <label for="published" class="form-label">Published</label>
                                                        <select class="form-control" name="pub-Q111">
                                                            <option value=0 <?php echo ($volume['published'] == 0) ? 'selected' : ''; ?>>False</option>
                                                            <option value=1 <?php echo ($volume['published'] == 1) ? 'selected' : ''; ?>>True</option>
                                                           
                                                        </select>
                                                    </div>

                                                

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

                            <!-- Modal DELETE -->
                            <div class="modal fade" id="delemol<?php echo  $volume['volumeid'] ?>mm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">You are about to delete volume: <?php echo  $volume['vol_name']; ?> </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a  href="<?php echo site_url('volumes/' .$volume['volumeid'] . '/delete')?>" class="btn btn-danger">Delete</a>
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
