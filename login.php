<?php

include "db.php";
session_start();

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name= $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $sql= $conn->prepare("select password from users where name = ?");
    $sql->bind_param('s',$name);
    $sql->execute();
    $sql->bind_result($password);
    $sql->fetch();
    if(password_verify($pass,$password)){
        $_SESSION["Name"]=$name;
        header("location:home.php");
    }
    else{
        echo "login failes";
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
            <div
                class="container text-center"
            >
                <h2>login</h2>
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
                            name="name"
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
