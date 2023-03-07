<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('db.php'); ?>

    <table>
        <tr>
            <th>Venue</th>
            <th>Date</th>
            <th>Team_1</th>
            <th>Team_2</th>
            <th>T1_Captain</th>
            <th>T2_Captain</th>
            <th>Toss_wonBy</th>
            <th>Match_wonBy</th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo $row['venue_name']; ?></td>
                <td><?php echo $row['match_date']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['captain']; ?></td>
                <td><?php echo $row['captain']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>