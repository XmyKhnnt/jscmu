
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Users</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_user_xx">Add User</button>
        <!-- add user Modal -->
        <div class="modal fade" id="add_user_xx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo  site_url('user/create')  ?>" method="post">
            <div class="modal-body">
                    
                    <div class="mb-3 ">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" name="name" id="name" required placeholder="Full name" class="form-control">
                    </div>

                    <div class="mb-3 ">
                        <label for="title" class="form-label">Email</label>
                        <input type="email" name="email"  required placeholder="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">password</label>
                        <input type="password" name="password"  required placeholder="password" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create New User</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    
        <div class="card-body">
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
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Complete Name</th>
                <th scope="col">email</th>
               
                <th scope="col">date_created</th>
                <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($users as $user) {
                    ?>
                     <tr>
                    <th scope="row">
                        <?php echo $user['userid']; ?>
                    </th>
                    <td>
                        <?php echo $user['complete_name']; ?>

                    </td>
                    <td>
                        <?php echo $user['email']; ?>
                    </td>
                    <!-- <td>

                        <?php 
                        if ($user['status'] == 1) {
                            echo "<span class='badge bg-success mr-4'> </span>";
                        } else {
                            echo "<span class='badge bg-danger mr-4'> </span>";
                        }
                        
                        ?>
                    </td> -->
                    <td>
                        <?php echo $user['date_created']; ?>
                    </td>
                    <td>
                        <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                    <ul class="dropdown-menu">
                                        
                                        <li>
                                           
                                                <button  class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_user_xx<?php echo $user['userid']   ?>">Edit</button>
                                            
                                        </li>

                                    
                                        <li>
                                                <button  class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delemol<?php echo  $user['userid'] ?>mm">Delete</button>
                                                <!-- Modal -->
                                               
                                        </li>
                                    </ul>
                            </div>

                    </td>


                </tr>

                        <!-- Edit Modal -->
                <div class="modal fade" id="edit_user_xx<?php echo $user['userid']   ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo  site_url('user/update/' . $user['userid']  )  ?>" method="post">
                    <div class="modal-body">
                            
                    <div class="mb-3 ">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" name="name" value="<?php  echo $user['complete_name']  ?>" required placeholder="Full name" class="form-control">
                    </div>

                    <div class="mb-3 ">
                        <label for="title" class="form-label">Email</label>
                        <input type="email" name="email" value="<?php  echo $user['email']  ?>"   required placeholder="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">password</label>
                        <input type="password" name="password" value="<?php  echo $user['password']  ?>"   required placeholder="password" class="form-control">
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>


                        <!-- Delete Modal -->
                        <div class="modal fade" id="delemol<?php echo  $user['userid'] ?>mm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">You are about to delete User:  <?php echo $user['complete_name']; ?> </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a  href="<?php echo site_url('user/delete/' . $user['userid'] . '/delete')?>" class="btn btn-danger">Delete</a>
                                            </div>
                                    </div>
                                </div>

                    <?php
                    }
                
                ?>
               
              
            </tbody>
        </table>
            
        </div>
    </div>
</div>
