<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent & Return</title>
</head>
<body>

<h1>Rent & Return</h1>

<form action="index.php" method="post">

    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Model</th>
            <th>Fuel consumption</th>
            <th>Price</th>
            <th>Availability</th>
            <th>Rent</th>
            <th>Return</th>
        </tr>

        <?php

        foreach ($carData as $key => $car) {
            $availability = ($car->isAvailable) ? '<span style="color:green">yes</span>' : '<span style="color:red">no</span>';
            echo "<tr>
            <td>$key</td>
            <td>$car->name</td>
            <td>$car->model</td>
            <td>$car->fuelConsumption L/100 km</td>
            <td>€$car->price</td>
            <td>$availability</td>
            <td><input type='submit' name='rent[$key]' value='Rent' value='redirect'></td>
            <td><input type='submit' name='return[$key]' value='Return' value='redirect'></td>
          </tr>";
        }

        ?>

        <table>
</form>

</body>
</html>

<style>
    * {
        font-family: arial, sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th {
        background-color: teal;
        color: white;
        text-transform: uppercase;
    }

    td, th {
        border: 1px solid #333;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>