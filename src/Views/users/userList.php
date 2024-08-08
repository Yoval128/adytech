<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        #header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            text-transform: uppercase;
        }
    </style>
</head>

<body>

    <div id="header">
        <h2>Usuarios del sistema</h2>
    </div>

    <table>

        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Id de tipo Usuario </th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user->getFullName(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

        

    </table>

</body>

</html>