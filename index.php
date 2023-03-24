<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6.2.0 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <form method="post" action="./backend/delete.php">
        <header>
            <!-- place navbar here -->
            <nav class="nav justify-content-between">
                <a class="h4" href="./addproduct.html" onclick="deleteCookies(); ">ADD</a>
                <p class="h3">Product List</p>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" id="delete-product-btn" class="btn btn-danger me-2">MASS DELETE</button>
                </div>
            </nav>
        </header>

        <body class="container">

            <div id="errors" class="mt-2"></div>

            <section class="row my-3">
                <?php
                require_once("./backend/DB/crudController.php");

                $data = new DBController();
                try {
                    //code...
                    $data = $data->selectFromDB();
                    if (!$data) {

                        echo   ' <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Unfortenatly! </strong> there is no products yet.
                  </div>
                        ';
                    }
                    // var_dump($data);
                    foreach ($data as $val) : ?>
                        <section class="col-6 col-md-3 p-2">
                            <div class="card">
                                <section class="card-body text-center ">
                                    <input type="checkbox" class="delete-checkbox" name="deletedItems[]" value="<?php echo $val['sku'] ?>" style="margin-right: 98%;">
                                    <?php echo $val['sku'] . "</br>"  .  $val['name'] . "</br>"  . $val['price'] . " $" . "</br>" .  $val['type'] . ": " . $val['attribute']  . "</br>"  ?>
                                </section>
                            </div>
                        </section>
                <?php endforeach;
                } catch (Exception $th) {
                    //throw $th;
                    var_dump("error" . $th);
                }
                ?>
            </section>

        </body>
    </form>
    <script>
        function deleteCookies(){
            document.cookie = "validation=; expires=Thu, 01 Jan 2020 00:00:00 UTC; path=/addproduct.html;";
      document.cookie = "old=; expires=Thu, 01 Jan 2020 12:00:00 UTC; path=/addproduct.html;";
        }
        // console.log(document.querySelectorAll(".delete-checkbox:checked"));
        window.onload = function() {
            let deleteBtn = document.querySelector("#delete-product-btn");
            let errors = document.querySelector("#errors");

            // console.log(deleteBtn);
            deleteBtn.onclick = function() {

                deleteInput = document.querySelectorAll(".delete-checkbox:checked");
                console.log(deleteInput[0], "checking", deleteInput);

                if (deleteInput[0]) {
                    console.log("deleteInput is ready");
                    deleteBtn.type = 'submit';
                } else {
                    errors.innerHTML = `
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>No product selected! </strong> You should select products first.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      `;
                }

            }; //close onClick MAssDelete
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>