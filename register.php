<?php
 
include "db.php";

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id=$_POST["id"];
    $name= $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $pass = password_hash($_POST["pass"],PASSWORD_BCRYPT);

    $sql = $conn->prepare("insert into users values(?,?,?,?,?,?)");
    $sql->bind_param('isisss',$id,$name,$age,$address,$email,$pass);
    if($sql->execute()){
        header("location:login.php");
    }else{
        echo "registration fails";
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
            
        </header>
        <main>
            <div
                class="container text-center"
            >
                <h2>registeration</h2>
            </div>
            
            <div
                class="container rounded shadow p-3 border"
            >
                <form method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">id</label>
                        <input
                            type="number"
                            class="form-control"
                            name="id"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <label for="" class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <label for="" class="form-label">age</label>
                        <input
                            type="number"
                            class="form-control"
                            name="age"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <label for="" class="form-label">address</label>
                        <input
                            type="text"
                            class="form-control"
                            name="address"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <label for="" class="form-label">email </label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <label for="" class="form-label">password</label>
                        <input
                            type="text"
                            class="form-control"
                            name="pass"
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
