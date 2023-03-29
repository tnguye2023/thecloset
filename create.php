<!DOCTYPE html>  
<html lang="en">
    <head>
        <title>THE CLOSET</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <meta name="author" content="Tracy Nguyen (tn9eer) and Rachel Ding (rd7bk)">
        <meta name="description" content="Login page">
        <meta name="keywords" content="login, clothes">
        <link rel="stylesheet" href="create.css">     
        
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
    <h1>List an item for sale</h1>
    <form action="?command=create" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="item">ITEM NAME</label>
        <input type="text" class="form-control" name="item" id="item" placeholder="Enter item name...">
      </div>

      <div class="form-group">
        <label for="description">ITEM DESCRIPTION</label><label class="required">*</label>
        <input type="textarea" class="form-control" name="description" id="description" placeholder="Describe your item and add any additional information here...">
        <!-- <textarea class="form-control" name="description" id="description" rows="3" placeholder="Describe your item and add any additional information here..."></textarea> -->
        <p>Character limit: 3000</p>
      </div>

      <div class="form-group">
        <label class="sr-only" for="price">PRICE</label><label class="required">*</label>
        <!-- <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">$</div>
          </div> -->
        <input type="number" step="0.01" class="form-control" name="price" id="price" placeholder="Enter a number...">
        <p>Must be a number between 0-9999</p>
        <!-- </div> -->
      </div>

      <div class="form-group">
        <div class="custom-file">
          <label class="custom-file-label" for="customFile">ADD IMAGES</label><label class="required">*</label>
          <input type="file" class="custom-file-input" name="image" id="image">
          <!-- hidden field for linking images to listing -->
          <input type="hidden" id="listing_id" name="listing_id" value=<?=$listings["id"]?>>
        </div>
      </div>

      <div class="form-group">
        <label for="type">TYPE OF ITEM</label><label class="required">*</label>
        <select id="type" name="type" class="form-select">
          <option selected>Select item...</option>
          <option>TOPS</option>
          <option>BOTTOMS</option>
          <option>SWEATERS</option>
          <option>JACKETS/COATS</option>
          <option>UNDERGARMENTS</option>
          <option>JEWELRY</option>
          <option>SHOES</option>
          <option>HATS</option>
          <option>MISC</option>
        </select>
      </div>

      <div class="form-group">
        <label for="size">SIZE</label><label class="required">*</label>
        <select id="size" name="size" class="form-select">
          <option selected>Select size...</option>
          <option>XL</option>
          <option>S</option>
          <option>M</option>
          <option>L</option>
          <option>XL</option>
        </select>
      </div>
      <!-- hidden field to connect listing to user -->
      <input type="hidden" id="user_id" name="user_id" value=<?=$closet_user["id"]?>>
      <a class="btn btn-primary" href="?command=market" role="button" style="margin-top: 25px;">Cancel</a>
      <button id="submit" type="submit" class="btn btn-primary" onclick="success()">Submit</button>
    </form>

    <h1 style="margin-top: 50px;">Item detail preview (live)</h1>
    <button id="show" class="btn btn-primary" onclick="base()">Show Preview</button>
    <button id="hide" class="btn btn-primary">Hide Preview</button>
    <div class="container" id="preview">
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
              <h3 id="itemName" style="color: red;">Item Name</h3>
                <h4 id="like">♡</h4>
                <div class="name">
                  <h1 id="priceAmount" style="color: red;">$ Price</h1>
                </div>
                <div class="name">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1024px-Circle-icons-profile.svg.png" style="height: 30px; padding-right: 2%;" alt="profile picture"><?=$closet_user["name"]?>
                </div>
                <br>
                <h6><b>ITEM DESCRIPTION</b></h6>
                <!-- <p>This is a vintage, genuine Gucci garment. There is a minor stain on one of the sleeves. The material is comfortable and there are no rips or holes.</p> -->
                <p id="desc" style="color: red;">Description</p>
                <br>
                <h6><b>ITEM DETAILS</b></h6>
                <p>Material: Wool<br>
                Size: M<br>
                Color: Brown</p>
            </div>
          </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>

        <script type="text/javascript">

          // Shows and hides the preview upon user request
          $(document).ready(function() {
            $("#preview").hide();
            $("#show").click(function(){
              $("#preview").show();
            })
            $("#hide").click(function(){
              $("#preview").hide();
            })
          })

          // JS Object for example detail page
          var example = {
            item_name: "Gucci Belt",
            item_price: 234,
            item_description: "Very nice belt"
          };

          // Allows Users to heart a listing in the preview
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

            // Arrow Function when user sucessfully creates a listing
            let created = () => alert("Listing has been created!");
            
            function success(){
                created();
            }

            // Event Listener (3)
            // Corresponding text ares in preview changes as user types in input
            // Item name
            var item = document.getElementById("item");
            var itemName = document.getElementById("itemName");
            item.addEventListener("keyup", changeName);
            
            function changeName(e){
              if(item.value != ""){
                itemName.textContent = e.target.value;
              }
              else{
                itemName.textContent = example.item_name;
              }
            }

            // Item price
            var price = document.getElementById("price");
            var priceAmount = document.getElementById("priceAmount");
            price.addEventListener("keyup", changePrice);

            function changePrice(e){
              if(price.value != ""){
                priceAmount.textContent = "$ " + e.target.value;
              }
              else{
                priceAmount.textContent = "$ " + example.item_price;
              }
            }

            // Item description
            var description = document.getElementById("description");
            var desc = document.getElementById("desc");
            description.addEventListener("keyup", changeDescription);

            function changeDescription(e){
              if(description.value != ""){
                desc.textContent = e.target.value;
              }
              else{
                desc.textContent = example.item_description;
              }
            }

          // Sets preview with JS object parameters  
          function base(){
            itemName.textContent = example.item_name;
            priceAmount.textContent = "$ " + example.item_price;
            desc.textContent = example.item_description;
          }


        </script>
    </body>
</html>