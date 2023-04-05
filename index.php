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

$checked = $_GET['parking'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- /Bootstrap CSS -->

    <title>PHP Hotel</title>
</head>

<body class="bg-dark p-4">
    <main class="p-5">
        <form action="index.php" method="GET" class="d-flex ps-3 mb-5">
            <div class="d-flex">
                <label for="parking" class="text-white lh-lg">Solo hotel con parcheggio</label>
                <input type="checkbox" name="parking" id="parking" class="ms-2 me-4">
            </div>
            <div>
                <button class="btn btn-outline-light">Filtra</button>
            </div>
        </form>
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel): ?>
                    <tr>
                        <?php foreach ($hotel as $key => $value): 
                            if ($key === 'parking' && $value === true) {
                                $value = 'Sì';
                            } 
                            if ($key === 'distance_to_center') {
                                $value .= 'km';
                            } 
                            if ($checked === 'on' && $hotel['parking'] === true) {
                                ?><td><?php echo $value; ?></td>    
                            <?php } elseif ($checked === '') {
                                ?><td><?php echo $value; ?></td>
                            <?php }
                        ?> 
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
</body>

</html>