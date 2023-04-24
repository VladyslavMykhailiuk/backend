<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>Отчет по бронированиям</title>
</head>
<body>
<h1>Отчет по бронированиям</h1>
<table>
    <thead>
    <tr>
        <th>Номер бронирования</th>
        <th>Имя клиента</th>
        <th>E-mail клиента</th>
        <th>Отель</th>
        <th>Комната</th>
        <th>Дата заезда</th>
        <th>Дата выезда</th>
        <th>Цена</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($reservations as $reservation)
        <tr>
            <td>{{ $reservation->id }}</td>
            <td>{{ $reservation->hotel_id }}</td>
            <td>{{ $reservation->name }}</td>
            <td>{{ $reservation->class }}</td>
            <td>{{ $reservation->persons }}</td>
            <td>{{ $reservation->price }}</td>
            <td>{{ $reservation->arrival_date }}</td>
            <td>{{ $reservation->departure_date }}</td>
            <td>{{ $reservation->person_name }}</td>
            <td>{{ $reservation->person_email}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
