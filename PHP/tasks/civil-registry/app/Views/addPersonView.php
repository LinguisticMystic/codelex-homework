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

<h1 class="text-3xl font-bold leading-normal mt-0 mb-2 text-gray-900">Add person</h1>

<form action="/add-person" method="post">
    Name <input class="flex rounded-full border-grey-light border h-8" type="text" name="name"><br>
    Social Nº <input class="flex rounded-full border-grey-light border h-8" type="text" name="socnumber"><br>
    Description <input class="flex rounded-full border-grey-light border h-8" type="text" name="description"><br>
    Age <input class="flex rounded-full border-grey-light border h-8" type="text" name="age"><br>
    Address <input class="flex rounded-full border-grey-light border h-8" type="text" name="address"><br>
    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="ADD">
</form>

</body>
</html>