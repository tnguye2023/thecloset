<!DOCTYPE html>  
<html lang="en">
    <head>
        <title>THE CLOSET</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <meta name="author" content="Tracy Nguyen (tn9eer) and Rachel Ding (rd7bk)">
        <meta name="description" content="Marketplace">
        <meta name="keywords" content="clothes, listing">
        <link rel="stylesheet" href="market.css"> 
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">    
        
        <script src="https://code.jquery.com/jquery-3.6.0.js"
	      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	      crossorigin="anonymous"></script>
        <script type="text/javascript">
            // document.getElementById("logout").onclick = confirmLogout;
            
            // function confirmLogout() {
            //     document.getElementById("confirm").innerHTML = $("<p>Are you sure you want to log out?</p><");
            // }
            $(document).ready(function(){
              $("#logout").click(function(){
                  $("#logoutModal").modal("show");
              });
                  $("#logoutModal").on('shown.bs.modal', function () {    
              });

          });

        </script>
    </head>  
    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="?command=market">👜 <b>THE CLOSET</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="market.html">Market</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">My Profile</a>
                  </li>
                  <li class="nav-item">
                    <!-- <a class="nav-link" href="?command=login" id="logout">Log Out</a> -->
                    <a class="nav-link" id="logout">Log Out</a>

                    <!-- Modal -->
                    <div class="modal fade" id="logoutModal" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Are you sure you want to log out?</h4>
                          </div>
                          <div class="modal-body">
                            <p>Click 'confirm' to return to the login screen. Otherwise, click out of the box to cancel.</p>
                          </div>
                          <div class="modal-footer">
                            <a href="?command=login"><button type="button" class="btn btn-default">Confirm</button></a>
                          </div>
                        </div>
                        
                      </div>
                    </div>

                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
    </header>
    <a class="float-button" href="?command=create"><h1>+</h1></a>
    
      <div class="container" style="padding-top: 5%;">

        <div class="row">
          <div class="col-sm-3">
            <div class="filter">
              <div class="filtertext">
                <h6>FILTER</h6>
              </div>
            </div>
          </div>

          <div class="col-sm-8">
            <h4 style="padding-left:2.5%; padding-bottom: 2%">MARKET</h4>
            <?=$status_msg?>
            <!-- LISTINGS GRID -->
            <div class="container">
              <div class="row row-cols-3">
                  <?php
                  foreach($data as $listing_preview) { ?>
                      <div class="col">
                        <div class="card" style="width: 13rem; height: 13rem; padding-bottom: 5%;">
                          <div class="card-body">
                            <a class="thumbnailtitle" href="?command=detail"><h5 class="card-title"><?=$listing_preview["item"]?></h5></a>
                            <h6 class="card-subtitle mb-2 text-muted">$ <?=$listing_preview["price"]?></h6>
                            <!-- <button type="submit" name="deleteItem" value="'.$row['id'].'" />Delete</button> -->
                            <!-- <input type="hidden" name="id" value="<?=$listing_preview["id"]?>"> -->
                            <form action="?command=market" method="post">
                              <input type="submit" class="btn btn-danger" name="delete" id="delete" value="delete">
                            </form>
                      
                          </div>
                        </div>
                      </div>
                  <?php } ?>
              </div>
            </div>

          </div>
        </div>
      </div>
      
        <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>