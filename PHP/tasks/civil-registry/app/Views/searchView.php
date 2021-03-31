<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../main.css">
    <title>Civil Registry</title>
</head>
<body>

<a class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600" href="/">Home</a>

<h1 class="text-3xl font-bold leading-normal mt-0 mb-2 text-gray-900">Search Person</h1>

<br>

<form action="/search-results" method="post">
    By full name <input class="flex rounded-full border-grey-light border h-8" type="text" name="query_name">
    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Search">
</form>

<br>

<form action="/search-results" method="post">
    By social Nº <input class="flex rounded-full border-grey-light border h-8" type="text" name="query_socnumber">
    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Search">
</form>

<br>

<form action="/search-results" method="post">
    By age <input class="flex rounded-full border-grey-light border h-8" type="text" name="query_age">
    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Search">
</form>

<br>

<form action="/search-results" method="post">
    By address <input class="flex rounded-full border-grey-light border h-8" type="text" name="query_address">
    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Search">
</form>

</body>
</html>