<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>About hotel</title>
</head>
<body>
<h1>My PDF-file about hotel</h1>
<div>Name: {{ $hotel->name }}</div>
<div>City: {{ $hotel->city }}</div>
<div>Description: {{ $hotel->description }}</div>
<div>Address: {{ $hotel->address }}</div>
<div>Stars: {{ $hotel->stars }}</div>
<div>Average Cost: {{ $hotel->average_cost }}</div>
</body>
</html>
