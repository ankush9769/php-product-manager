<?php
include 'db.php';
session_start();

$name = $_SESSION["Name"];
$result = $conn->query("select * from products");

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name = $_POST["pname"];
    $price = $_POST["pprice"];
    $category = $_POST["pcategory"];
    $quantity = $_POST["pquantity"];

    $sql = $conn->prepare("insert into products (pname,pprice,pcategory,pquantity) values(?,?,?,?)");
    $sql->bind_param('sdsi',$name,$price,$category,$quantity);
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
            <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
            >
                <div class="container">
                    <a class="navbar-brand" href="#"><strong><?=$name?></strong></a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        </ul>
                        <form class="d-flex my-2 my-lg-0">
                           
                            <a
                                name=""
                                id=""
                                class="btn btn-danger"
                                href="logout.php"
                                role="button"
                                >logout</a
                            >
                            
                        </form>
                    </div>
                </div>
            </nav>
            
        </header>
        <main>
            <div
                class="container text-center"
            >
                <h2>products</h2>
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
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <label for="" class="form-label">price</label>
                        <input
                            type="number"
                            class="form-control"
                            name="pprice"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <label for="" class="form-label">category </label>
                        <input
                            type="text"
                            class="form-control"
                            name="pcategory"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <label for="" class="form-label">quantity </label>
                        <input
                            type="number"
                            class="form-control"
                            name="pquantity"
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
            
        <div
            class="container"
        >
        <div
            class="table-responsive"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col">id </th>
                        <th scope="col">name </th>
                        <th scope="col">price </th>
                        <th scope="col">category </th>
                        <th scope="col">quantity</th>
                        <th scope="col">action </th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=$result->fetch_assoc()) { ?>
                    <tr>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["pname"]?></td>
                        <td><?=$row["pprice"]?></td>
                        <td><?=$row["pcategory"]?></td>
                        <td><?=$row["pquantity"]?></td>
                        <td><a href="edit.php?id=<?=$row["id"]?>">edit</a></td>
                        <td><a href="delete.php?id=<?=$row["id"]?>">delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
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
