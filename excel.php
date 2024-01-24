<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Download Button</title>
</head>
<body>

<?php
// Sample data for the table
$tableData = array(
    array('Name', 'Age', 'City', 'Occupation'),
    array('John Doe', 25, 'New York', 'Developer'),
    array('Jane Smith', 30, 'Los Angeles', 'Designer'),
    array('Bob Johnson', 22, 'Chicago', 'Engineer'),
    // Add more rows as needed
);
?>

<table border="1">
    <thead>
        <tr>
            <?php
            // Output table headers
            foreach ($tableData[0] as $header) {
                echo "<th>$header</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        // Output table rows
        for ($i = 1; $i < count($tableData); $i++) {
            echo "<tr>";
            foreach ($tableData[$i] as $cell) {
                echo "<td>$cell</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<!-- Download Button -->
<button onclick="downloadTable()">Download Table</button>

<script>
function downloadTable() {
    // Creating a CSV content
    var csvContent = "data:text/csv;charset=utf-8,";
    <?php
    // Convert PHP array to CSV content
    foreach ($tableData as $row) {
        $csvRow = implode(',', $row);
        echo "csvContent += \"$csvRow\\n\";";
    }
    ?>

    // Creating a blob with the CSV content
    var blob = new Blob([csvContent], { type: 'text/csv' });

    // Creating a download link and triggering a click to download the file
    var link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = "table_data.csv";
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>

</body>
</html>
