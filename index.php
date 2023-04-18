<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $select = $_GET['select'];
    $vote = $_GET['vote'];

    $hotelsFiltered = [];

    foreach ($hotels as $hotel) {
        if ($hotel[$select] == true || $hotel['vote'] >= $vote) {
            $hotelsFiltered[] = $hotel;
        } else if ($select == 'All' && $vote == '') {
            $hotelsFiltered = $hotels;
        } else if (!$_GET) {
            $hotelsFiltered = $hotels;
        }
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Php Hotel</title>
    <style>
        header {
            height: 80px;
        }
    </style>
</head>
<body>

    <header class="d-flex align-items-center bg-primary">
        <div class="container">
            <h1 class="text-light">Php Hotels</h1>
        </div>
    </header>
        
        <div class="container">
            <nav class="navbar bg-primary-subtle my-5 p-3 rounded">
                <div class="container-fluid">
                    <form action="index.php" method="GET" class="w-100 d-flex align-items-center gap-3 justify-content-between">
                        <div class="d-flex align-items-center w-50 gap-2">
                            <select class="form-select" name="select" aria-label="Default select example">
                                <option selected>All</option>
                                <option value="parking">Parcheggio</option>
                            </select>

                            <label for="vote" class="w-100 text-center">Filtra per voto</label>
                            <input type="text" name="vote" id="vote">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success">Cerca</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>


    <div class="container">

        <table class="table table-striped table-hover mt-5 rounded">
            <thead>
                <tr class="bg-primary text-light">
                    <?php
                        
                            foreach ($hotels['0'] as $key => $value) {

                                if ($key === 'distance_to_center') {
                                    $key = 'distance to center';
                                }
                                echo '<th scope="col">' . ucfirst($key) . '</th>';

                            } 
                    ?>
                </tr>
            </thead>
            <tbody>
            
                <?php
                    foreach ($hotelsFiltered as $hotel) {
                        echo '<tr>';
                        foreach ($hotel as $key => $value) {

                            if ($value === true) {
                                $value = 'yes';
                            } else if ($value === false) {
                                $value = 'no';
                            } else if ($key === 'distance_to_center') {
                                $key = 'distance to center';
                                $value .= ' km';
                            }
                            echo '<td>' . ucfirst($value) . '</td>';

                        } 
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>   
</body>
</html>