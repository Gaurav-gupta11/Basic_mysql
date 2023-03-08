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
                <td><?php echo $row['team1']; ?></td>
                <td><?php echo $row['team2']; ?></td>
                <td><?php echo $row['t1captain']; ?></td>
                <td><?php echo $row['t2captain']; ?></td>
                <td><?php echo $row['tosswonby']; ?></td>
                <td><?php echo $row['matchwonby']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>