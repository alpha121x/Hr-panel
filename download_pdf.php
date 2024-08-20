<?php
require 'vendor/autoload.php'; // Include the autoloader if using Composer

use Dompdf\Dompdf;
use Dompdf\Options;

// Initialize Dompdf with options
$options = new Options();
$options->set('defaultFont', 'Courier'); // Set the default font if needed
$dompdf = new Dompdf($options);

// Capture the HTML content for the PDF
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assigned Applicants PDF</title>
</head>
<body>
    <h2>Assigned Applicants</h2>
    <p>Date: <?php echo date('Y-m-d'); ?></p>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Applicant Name</th>
                <th>District</th>
                <th>Tehsil</th>
                <th>Circle</th>
                <th>Mozah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require("db_config.php");

            // Fetch data from assigned_applicants table and join with applicants table
            $query = "
                SELECT a.id, a.applicant_id, ap.applicant_name, m.mozah_name, c.circle_name, t.tehsil_name, d.district_name
                FROM assigned_applicants a
                JOIN mozah m ON a.mozah_id = m.mozah_id
                JOIN circle c ON m.circle_id = c.circle_id
                JOIN tehsil t ON c.tehsil_id = t.tehsil_id
                JOIN district d ON t.district_id = d.district_id
                JOIN applicants ap ON a.applicant_id = ap.applicant_id
            ";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $assigned_applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $index = 1;
            foreach ($assigned_applicants as $row):
            ?>
            <tr>
                <td><?php echo $index++; ?></td>
                <td><?php echo htmlspecialchars($row['applicant_name']); ?></td>
                <td><?php echo htmlspecialchars($row['district_name']); ?></td>
                <td><?php echo htmlspecialchars($row['tehsil_name']); ?></td>
                <td><?php echo htmlspecialchars($row['circle_name']); ?></td>
                <td><?php echo htmlspecialchars($row['mozah_name']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$html = ob_get_clean();

// Load HTML into Dompdf
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the PDF
$dompdf->render();

// Output the generated PDF to the browser
$dompdf->stream("Applicants_List_" . date('Y-m-d') . ".pdf", ["Attachment" => 1]);
?>
