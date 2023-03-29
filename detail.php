<!DOCTYPE html>  
<html lang="en">
    <head>
        <title>THE CLOSET</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <meta name="author" content="Tracy Nguyen (tn9eer) and Rachel Ding (rd7bk)">
        <meta name="description" content="Listing detail page">
        <meta name="keywords" content="detail, listing, clothes">
        <link rel="stylesheet" href="detail.css">     
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">    
    
        <script src="https://code.jquery.com/jquery-3.6.0.js"
	      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	      crossorigin="anonymous"></script>
        <script type="text/javascript">
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
                        <a class="nav-link" id="logout">Log Out</a>

                        <div class="modal fade" id="logoutModal" role="dialog">
                          <div class="modal-dialog">
                          
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
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
        </header>

        <div style="padding-left: 7.5%; padding-top: 5%; padding-bottom: 1%;">
          <a class="btn btn-outline-dark" href="?command=market" role="button">Back to market</a>
        </div>

        <div class="container">
          <div class="row">
            <div class="col">
              <div id="clothingPreview" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#clothingPreview" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#clothingPreview" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#clothingPreview" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://di2ponv0v5otw.cloudfront.net/posts/2022/01/03/61d34c455e0ba8558b96598b/m_wp_61d34c9688cce3c7bd3e778f.webp" class="d-block w-200" alt="Sweater preview 1">
                  </div>
                  <div class="carousel-item">
                    <img src="https://di2ponv0v5otw.cloudfront.net/posts/2022/01/03/61d34c455e0ba8558b96598b/m_wp_61d34c96efd0e4e7312db463.webp" class="d-block w-200" alt="Sweater preview 2">
                  </div>
                  <div class="carousel-item">
                    <img src="https://di2ponv0v5otw.cloudfront.net/posts/2022/01/03/61d34c455e0ba8558b96598b/m_wp_61d34c96463d4f2713ce03cc.webp" class="d-block w-200" alt="Sweater preview 3">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#clothingPreview" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#clothingPreview" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <div class="col">

            <!-- AJAX, JSON -->
                <div id="warning"></div>
                <p id="item_title"></p>

                <h3><?=$item_name?></h3>
                <h4 id="like">♡</h4>
                <div class="name">
                  <h1>$ <?=$price?></h1>
                </div>
                <div class="name">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png" style="height: 30px; padding-right: 2%;" alt="profile picture"><?=$closet_user["name"]?>
                </div>
                <br>
                <h6><b>ITEM DESCRIPTION</b></h6>
                <p><?=$description?></p>
                <br>
                <h6><b>ITEM DETAILS</b></h6>
                <p>Material: Wool<br>
                Size: M<br>
                Color: Brown</p>
            </div>
          </div>
        </div>

        <script type="text/javascript">
          var like = document.getElementById("like");
            like.addEventListener("click", heart);

            function heart(){
              if(like.innerHTML == "♡"){
                like.textContent = "♥";
              }
              else{
                like.textContent = "♡";
              }
            }

            // AJAX, JSON
          var title = null;

          function loadDetail() {
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "?command=loadDetail", true);
            ajax.responseType = "json";
            ajax.send(null);
            ajax.addEventListener("load", function() {
              if (this.status == 200) {
                title = this.response;
                displayTitle();
              }
            });
            ajax.addEventListener("error", function() {
              document.getElementById("warning").innerHTML = "<div class='alert alert-danger'>ERROR!</div>";
            });
          }

          function displayTitle() {
            document.getElementById("item_title").innerHTML = title;
          }

          loadDetail();
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    </body>

</html>