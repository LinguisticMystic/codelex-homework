<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Civil Registry</title>
</head>
<body>

<a href="/">Home</a>

<h1>Search Results</h1>

<?php

//session_start();
//$_SESSION['postData'] = $_POST;
//var_dump($_SESSION['postData']);
//'<br>';

if (count($results) === 0) {
    echo 'No results';
} else {
    foreach ($results as $result) {
        echo "<strong>Name:</strong> {$result['name']}<br>";
        echo "<strong>Social Nº:</strong> {$result['socnumber']}<br>";
        echo "<strong>Description:</strong> {$result['description']}<br>";

        echo '<form action="/delete-person" method="post">
                <button type="submit" name="delete" value="'.$result['id'].'">DELETE PERSON</button>
            </form>';

        echo '<form action="/edit-person" method="post">
                <input type="text" name="edit_description">
                <button type="submit" name="edit" value="'.$result['id'].'">CHANGE DESCRIPTION</button>
            </form>';
    }
}

?>
</body>
</html>