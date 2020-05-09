      <?php session_start();

        require_once('functions/alert.php');
        require_once('functions/email.php');
          include("lib/header.php");

        ?>



     

      <body>

          <section class="newsletter">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="content">
                              <form action="processForget.php" method="POST">
                                  <h2>Forget Password Page</h2>
                                  <?php print_error('error'); ?>


                                  <?php print_error('message'); ?>

                                  <div class="input-group">
                                      <input type="email" class="form-control" placeholder="Enter your email" name="email">
                                      <span class="input-group-btn">
                                          <button class="btn" type="submit">Submit</button>
                                      </span>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </section>









          <?php include("lib/footer.php"); ?>