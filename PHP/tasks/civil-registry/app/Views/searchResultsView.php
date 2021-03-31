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

<h1 class="text-3xl font-bold leading-normal mt-0 mb-2 text-gray-900">Search Results</h1>

{% if results is empty %}
No results
{% endif %}

{% for result in results %}

<li><span>Name:</span> {{ result.name }}</li>
<li><span>Social Nº:</span> {{ result.socnumber }}</li>
<li><span>Description:</span> {{ result.description }}</li>
<li><span>Age:</span> {{ result.age }}</li>
<li><span>Address:</span> {{ result.address }}</li>

<form action="/delete-person" method="post">
    <button class="bg-pink-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" name="delete"
            value="'{{result.id}}'">DELETE PERSON
    </button>
</form>

<form action="/edit-person" method="post">
    <input class="rounded-full border-grey-light border-2 h-10" type="text" name="edit_description">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded" type="submit" name="edit"
            value="'{{result.id}}'">CHANGE DESCRIPTION
    </button>
</form>

<br>

{% endfor %}


</body>
</html>