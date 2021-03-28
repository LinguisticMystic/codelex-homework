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

<h1>Search Person</h1>

<form action="/search-results" method="post">
    By full name <input type="text" name="query_name">
    <input type="submit" value="Search">
</form>

<form action="/search-results" method="post">
    By social Nº <input type="text" name="query_socnumber">
    <input type="submit" value="Search">
</form>

</body>
</html>