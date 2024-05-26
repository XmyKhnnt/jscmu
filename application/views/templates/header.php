
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php echo $title; ?>
  </title>
 
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('static/assets/images/logos/favicon.png'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('static/assets/css/bootstrap.min.css'); ?>" />
  
  <link rel="stylesheet" href="<?php echo base_url('static/assets/css/styles.css'); ?>" />

  <script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
 
  <style>
    body {
      background-color: #f9f8f4;
    }

    .c-bg {
      background-color: #f9f8f4;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm c-bg" id="mainNav">
            <div class="container ">
                <a class="navbar-brand fw-bold" href="<?php echo base_url()  ?>"> 
                <img src="<?php echo base_url('static/assets/images/logos/JSCMU.png') ?>" height="25" alt="">
              </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url('about')  ?>">About</a></li>
                        <!-- <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url('services')  ?>">Service</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url('user')  ?>">Index</a></li> -->
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url()  ?>">Articles</a></li>
                        <!-- <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url('submission')  ?>">Submission</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo base_url('submission/assigned')  ?>">Assigned Article</a></li> -->
                    </ul>
                    <!-- <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedback_modal">
                        <span class="d-flex align-items-center">
                            
                            <span class="small">Join Us</span>
                        </span>
                    </button> -->

                    <a href="<?php echo base_url('articles') ?>" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" >
                        <span class="d-flex align-items-center">
                            
                            <span class="small">Dashboard</span>
                        </span>
                  </a>

                </div>
            </div>
        </nav>



<!-- Modal -->
<div class="modal fade" id="feedback_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body">
        <h3 class="text-center mb-3 mt-2">Join Us</h3>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control"  placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password</label>
        <input type="password" class="form-control"  placeholder="password">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary rounded-pill px-3 mb-2 mb-lg-0" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" >
                        <span class="d-flex align-items-center">
                            <i class="bi-chat-text-fill me-2"></i>
                            <span class="small">Submit</span>
                        </span>
                    </button>
      </div>
    </div>
  </div>
</div>