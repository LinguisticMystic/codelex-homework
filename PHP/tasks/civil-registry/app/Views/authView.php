<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../main.css">
    <title>Civil Registry</title>
</head>
<body>

<a class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600" href="/">Home</a>

{% if isTokenValid == true %}

<a class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600" href="/dashboard">Dashboard</a>
<h1 class="text-3xl font-bold leading-normal mt-0 mb-2 text-gray-900">Token valid!</h1>

{% else %}
<h1 class="text-3xl font-bold leading-normal mt-0 mb-2 text-red-600">Token invalid!</h1>

{% endif %}

</body>
</html>