<!DOCTYPE html>
<html>

<head>
    <style>
        table {
    margin: 20px auto;
    text-align: center;
    width: 90%;
    border-collapse: collapse;
    border-radius: 1.5rem;
    overflow: hidden;
    font-size: 12px;
}

th,
td {
    font-size: 12px;
    padding: 10px;
    background: rgb(255, 255, 255);
    border: 4px solid #E4E9F7;
}

td img {
    max-width: 150px;
    max-height: 150px
}

td i {
    font-size: 14px;
}
    </style>
</head>

<body>

    <h2>Yêu cầu liên hệ lại của người dùng gửi tới bạn !</h2>
    <h3>Link BĐS yêu cầu :<a href="http://localhost:8000/lands/details/<?= $objItem->id ?>">Tại đây !</a></h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$contact['name']}}</td>
                <td>{{$contact['email']}}</td>
                <td>{{$contact['phone']}}</td>
                <td>{{$contact['message']}}</td>
            </tr>
        </tbody>

    </table>

</body>

</html>