<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>

    <!-- link bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
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

        // foreach ($hotels as $hotel) {
        //     echo '<div>';
        //     echo '<strong>Name:</strong> ' . $hotel['name'] . '<br>';
        //     echo '<strong>Description:</strong> ' . $hotel['description'] . '<br>';
        //     echo '<strong>Parking:</strong> ' . ($hotel['parking'] ? 'Yes' : 'No') . '<br>';
        //     echo '<strong>Vote:</strong> ' . $hotel['vote'] . '<br>';
        //     echo '<strong>Distance to Center:</strong> ' . $hotel['distance_to_center'] . '<br>';
        //     echo '</div><hr>';
        // }
        $filteredHotels = $hotels;
        
        if (isset($_GET['filterVote']) && is_numeric($_GET['filterVote'])) {
            $filteredHotels = array_filter($filteredHotels, function ($hotel) {
                return $hotel['vote'] >= $_GET['filterVote'];
            });
        }
    ?>

<div class="container mt-5">

        <form method="get" action="">
            <div class="form-group">
                <label for="filterVote">Filtra per Voto:</label>
                <input type="number" class="form-control" name="filterVote" id="filterVote" min="1" max="5" step="1">
                <button type="submit" class="btn btn-primary">Applica</button>
            </div>   
        </form>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance to Center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredHotels as $hotel): ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>