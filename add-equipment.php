<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./style/main.css">
    <title>dodaj sprzęt</title>
</head>

<body>
    <div class="container">
    <?php
        require('navbar.php');
        show_header();
    ?>
        <?php
            require('dbconnect.php');
            require('test-input.php');

		    if(isset($_POST['add'])){
                if($_POST['ni'] == ""){
                    echo'<br><div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Zostawiłeś puste pole...</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } else {
                        try
                        {
                            $type = test_input($_POST['type']);
                            $ni = test_input($_POST['ni']);
                            $description = test_input($_POST['description']);
                            $room = test_input($_POST['room']);

                            $result = $dbh->query("INSERT INTO equipment (type, NI, description, room) 
                            VALUES ('$type','$ni','$description','$room')");
        
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukces!</strong> Sprzęt dodany.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            
                            $result->closeCursor();
                            
                            $dbh = null;
                        }
                        catch(PDOException $e)
                        {
                            echo "Error: " . $e->getMessage();
                        }
                    }
                }
                
        ?>
        <h3>Dodaj sprzęt do bazy</h3>
        <hr>
        <form method="POST">
            <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Rodzaj" aria-label="Rodzaj" name="type">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Numer inwentarzowy" aria-label="Numer inwentarzowy" name="ni">
                </div>
            </div><br>
            <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Opis" aria-label="Opis" name="description">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="Pokój" aria-label="Pokój" name="room">
                </div>
            </div><br>
            <button class="btn btn-outline-primary" type="submit" name="add">Dodaj do bazy</button>
        </form>
    </div>
</body>

</html>