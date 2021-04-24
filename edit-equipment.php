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
    <title>Edytuj sprzęt</title>
</head>

<body>
    <div class="container">
    <?php
        require('navbar.php');
        show_header();
    ?>    
        <h3>Wyszukaj sprzęt do edycji</h3>
        <hr>
        <form class="d-flex" method="POST">
            <input class="form-control me-2" type="search" name="parameter" placeholder="Wpisz czego szukasz..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="search">Search</button>
        </form><hr>
        <?php
        require('dbconnect.php');
        require('test-input.php');
        require('class-equipment.php');
     
		    if(isset($_POST['search'])){
                $parameter = test_input($_POST['parameter']);
                if($parameter == ""){
                    echo'<br><div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Zostawiłeś puste pole...</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } else {
                        try
                        {
                            $result = $dbh->query("SELECT * FROM equipment WHERE 
                                    (type LIKE '%$parameter%') or (ni LIKE '%$parameter%') or (room LIKE '%$parameter%')");
                            $count = $result->rowCount();
                            if($count == 0) {
                                echo '<br><div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Brak danych...</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            } else {
                                
                                while ($row = $result->fetchObject("Equipment"))
                                {
                                    echo $row->UpdateEquipment();
                                              
                                }
                                $result->closeCursor();
                                $dbh = null;
                            }
                        }
                        catch(PDOException $e)
                        {
                            echo "Error: " . $e->getMessage();
                        }
                    }
                }
                if(isset($_POST['edit'])){
                    try
                    {
                        $type = test_input($_POST['type']);
                        $ni = test_input($_POST['ni']);
                        $room = test_input($_POST['room']);
                        $description = test_input($_POST['description']);
    
                        $result = $dbh->query("UPDATE equipment SET type = '$type', NI = '$ni', room = '$room', description = '$description' WHERE eq_id = '$_POST[id]'");
                        $result->closeCursor();
                        $dbh = null;
                        echo '<br><div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Zmiany wprowadzone.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    catch(PDOException $e)
                    {
                        echo "Error: " . $e->getMessage();
                    }
                }
        ?>
    </div>
</body>

</html>