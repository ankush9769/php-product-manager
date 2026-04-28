<?php

include "db.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = $conn->prepare("select * from products where id = ?");
    $sql->bind_param('i',$id);
    $sql->execute();
    $result = $sql->get_result()->fetch_assoc();
}
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name = $_POST["pname"];
    $price = $_POST["pprice"];
    $category = $_POST["pcategory"];
    $quantity = $_POST["pquantity"];

    $sql = $conn->prepare("update products set pname=?,pprice=?,pcategory=?,pquantity=? where id=?");
    $sql->bind_param('sdsii',$name,$price,$category,$quantity,$id);
    if($sql->execute()){
        header("location:home.php");
    }else{
        echo "not inserted data";
    }
}


?>


<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div
                class="container text-center"
            >
                <h2>update</h2>
            </div>
            
            <div
                class="container rounded shadow p-3 border"
            >
                <form method="POST">
                    <div class="mb-3">
                        
                        <label for="" class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="pname"
                            value="<?= $result["pname"]?>"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <label for="" class="form-label">price</label>
                        <input
                            type="number"
                            class="form-control"
                            name="pprice"
                            value="<?=$result["pprice"]?>"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <label for="" class="form-label">category </label>
                        <input
                            type="text"
                            class="form-control"
                            name="pcategory"
                            value="<?=$result["pcategory"]?>"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <label for="" class="form-label">quantity </label>
                        <input
                            type="number"
                            class="form-control"
                            name="pquantity"
                            value="<?=$result["pquantity"]?>"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                       
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Submit
                        </button>
                    </div>
                </form>    
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
