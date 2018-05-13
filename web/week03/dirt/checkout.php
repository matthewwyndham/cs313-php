<?php session_start(); ?> 
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <?php require 'header.php' ?>
        <main>
            <div class="jumbotron">
                <h1>Dirt Co.</h1>
                <p>Checkout</p>
            </div>
            <div class="container">
            <div class="alert alert-dark" role="alert">
                Please enter your address:
            </div>
            <form action="confirm.php" method="get">
               <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" name="add1" placeholder="1234 Main St">
              </div>
              <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" name="add2" placeholder="Apartment, studio, or floor">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">City</label>
                  <input type="text" class="form-control" name="city">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">State</label>
                  <input type="text" class="form-control" name="state">
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Zip</label>
                  <input type="text" class="form-control" name="zip">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </main>
    </body>
    <script src="script.js"></script>
</html>