<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Details</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>
    <h2>Teacher Details</h2>
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>Address</th>
                <th>Mobile Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacher as $teachers)
            <tr>
                <td>{{$teachers->teacher_name}}</td>
                <td>{{$teachers->mobile_no}}</td>
                <td>{{$teachers->address}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
