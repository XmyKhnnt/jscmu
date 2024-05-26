
<div class="container">
    

        <br><br><br>

            <div class="card mb-2 p-0">
                <div class="card-body d-flex justify-content-between  ">
                    <h4 class="p-0 m-0 ">Authors</h4 >
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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_author_xx">Add Author</button>
                </div>
               
               


                <!--  Add Author Modal -->
                <div class="modal fade" id="add_author_xx" tabindex="-1" aria-labelledby="add_author_xxLabel" aria-hidden="true">
                <div class="modal-dialog">
                    
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_author_xxLabel">Add Author</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Name</label>
                                <input type="text" name="name" id="name" required placeholder="Author Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" required placeholder="Mr.,  Mrs." class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Email</label>
                                <input type="email" name="email" id="email" required placeholder="jhon.doe@domain.com." class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Contact Number</label>
                                <input type="text" name="cnumber" id="cnumber" required placeholder="0987654332 " class="form-control">
                            </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add New Author</button>
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
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                       
                        <th scope="col">email</th>
                        <th scope="col">Contact Num</th>
                        <th scope="col">Title</th>
                        <th></th>
                       
                        
                      
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        
                        foreach ($articles as $article) {
                        ?> 

                            <tr>
                               
                                <td>
                                    <?php echo $article['auid']; ?>
                                  
                                </td>
                                <td>
                                    <?php echo $article['name']; ?>
                                    
                                </td>
                                <td>
                                    <?php echo $article['email']; ?>
                                </td>
                                <td>
                                    <?php echo $article['contact_num']; ?>
                                </td>
                                <td>
                                    <?php echo $article['title']; ?>
                                </td>
                                <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                    <ul class="dropdown-menu">
                                        
                                        <li>
                                           
                                                <button  class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_author_xx<?php echo  $article['auid']   ?>">Edit</button>
                                            
                                        </li>

                                    
                                        <li>
                                                <button  class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delemol<?php echo   $article['auid'] ?>mm">Delete</button>
                                                <!-- Modal -->
                                                

                                               
                                        </li>
                                    </ul>
                                </div>
                                </td>
                            </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="edit_author_xx<?php echo  $article['auid']   ?>" tabindex="-1" aria-labelledby="add_author_xxLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="add_author_xxLabel">Add Author</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?php echo site_url('authors/update/'.  $article['auid']  ); ?>" method="post">
                                                <div class="modal-body">
                                                
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Name</label>
                                                    <input type="text" name="name" value=" <?php echo $article['name']; ?>" id="name" required placeholder="Author Name" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" name="title" id="title"  value="<?php echo $article['title']; ?>"  required placeholder="Mr.,  Mrs." class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Email</label>
                                                    <input type="email" name="email" value="<?php echo $article['email']; ?>" id="email" required placeholder="jhon.doe@domain.com." class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Contact Number</label>
                                                    <input type="text" name="cnumber" id="cnumber" value="<?php echo $article['contact_num']; ?>" required placeholder="0987654332 " class="form-control">
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



                                <!-- Delete modal -->
                                <!-- Modal DELETE -->
                                <div class="modal fade" id="delemol<?php echo   $article['auid'] ?>mm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="text-center">You are about to delete Author: <?php echo  $article['auid'] ?> </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a  href="<?php echo site_url('authors/delete/' . $article['auid'] )?>" class="btn btn-danger">Delete</a>
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
