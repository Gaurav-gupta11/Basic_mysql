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
            <th colspan="3">employee_code_table</th>
        </tr>
        <tr>
            <th>employee_code</th>
            <th>employee_code_name</th>
            <th>employee_domain</th>
        </tr>
        <?php foreach ($data[0] as $row): ?>
            <tr>
                <td><?php echo $row['employee_code']; ?></td>
                <td><?php echo $row['employee_code_name']; ?></td>
                <td><?php echo $row['employee_domain']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <table>
        <tr>
            <th colspan="3">employee_salary_table</th>
        </tr>
        <tr>
            <th>employee_id</th>
            <th>employee_salary</th>
            <th>employee_code</th>
        </tr>
        <?php foreach ($data[1] as $row): ?>
            <tr>
                <td><?php echo $row['employee_id']; ?></td>
                <td><?php echo $row['employee_salary']; ?></td>
                <td><?php echo $row['employee_code']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <table>
        <tr>
            <th colspan="3">employee_details_table</th>
        </tr>
        <tr>
            <th>employee_id</th>
            <th>employee_first_name</th>
            <th>employee_last_name</th>
            <th>Graduation_percentile</th>
        </tr>
        <?php foreach ($data[2] as $row): ?>
            <tr>
                <td><?php echo $row['employee_id']; ?></td>
                <td><?php echo $row['employee_first_name']; ?></td>
                <td><?php echo $row['employee_last_name']; ?></td>
                <td><?php echo $row['Graduation_percentile']; ?></td>
            </tr>
        <?php endforeach; ?>
        <table>
        <tr>
            <th>employee_first_name</th>
        </tr>
        <?php foreach ($data1[0] as $row): ?>
            <tr>
                <td><?php echo $row['employee_first_name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <table>
        <tr>
            <th>employee_last_name</th>
        </tr>
        <?php foreach ($data1[1] as $row): ?>
            <tr>
                <td><?php echo $row['employee_last_name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <table>
        <tr>
            <th>employee_code_name</th>
        </tr>
        <?php foreach ($data1[2] as $row): ?>
            <tr>
                <td><?php echo $row['employee_code_name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <table>
        <tr>
            <th>employee_full_name</th>
        </tr>
        <?php foreach ($data1[3] as $row): ?>
            <tr>
                <td><?php echo $row['full_name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <table>
        <tr>
            <th>employee_domain</th>
            <th>total_salary</th>
        </tr>
        <?php foreach ($data1[4] as $row): ?>
            <tr>
                <td><?php echo $row['employee_domain']; ?></td>
                <td><?php echo $row['total_salary']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <table>
        <tr>
            <th>employee_domain</th>
            <th>total_salary</th>
        </tr>
        <?php foreach ($data1[5] as $row): ?>
            <tr>
                <td><?php echo $row['employee_domain']; ?></td>
                <td><?php echo $row['total_salary']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <table>
        <tr>
            <th>employee_id</th>
        </tr>
        <?php foreach ($data1[6] as $row): ?>
            <tr>
                <td><?php echo $row['employee_id']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>