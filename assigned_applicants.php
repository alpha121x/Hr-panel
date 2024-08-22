<head>
    <title>Assigned Applicants</title>

    <?php include("include/linked-files.php") ?>
    <!-- Add jsPDF and html2canvas scripts -->

</head>

<body>
    <!-- ======= Header ======= -->
    <?php require_once('include/header-nav.php'); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php require_once('include/side-nav.php'); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Assigned Applicants</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Applicants List</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Applicants</h5>

                            <!-- Download PDF Button -->
                            <button id="downloadPDF" class="btn btn-primary">Download PDF</button>
                            <br><br>

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
                            ?>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-hover" id='datatable'>
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Applicant Name</th>
                                        <th>District</th>
                                        <th>Tehsil</th>
                                        <th>Circle</th>
                                        <th>Mozah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $index = 1; // Initialize index
                                    foreach ($assigned_applicants as $row): ?>
                                        <tr>
                                            <th scope="row"><?php echo $index++; ?></th> <!-- Use index for row number -->
                                            <td><?php echo htmlspecialchars($row['applicant_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['district_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['tehsil_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['circle_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['mozah_name']); ?></td>
                                            <td>
                                                <a href="edit_assigned_applicant.php?id=<?php echo htmlspecialchars($row['id']); ?>" class='text-black'>
                                                    <i class="bi bi-pencil-square text-primary"></i>&nbsp;
                                                </a>
                                                |
                                                <a href="delete_assigned_applicant.php?id=<?php echo htmlspecialchars($row['id']); ?>" class='text-black'>
                                                    <i class="bi bi-trash text-primary"></i>&nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            <br>

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Pie Chart</h5>

                                        <!-- Pie Chart -->
                                        <div id="pieChart"></div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                new ApexCharts(document.querySelector("#pieChart"), {
                                                    series: [44, 55, 13, 43, 22],
                                                    chart: {
                                                        height: 350,
                                                        type: 'pie',
                                                        toolbar: {
                                                            show: true
                                                        }
                                                    },
                                                    labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E']
                                                }).render();
                                            });
                                        </script>
                                        <!-- End Pie Chart -->

                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Column Chart</h5>

                                        <!-- Column Chart -->
                                        <div id="columnChart"></div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                new ApexCharts(document.querySelector("#columnChart"), {
                                                    series: [{
                                                        name: 'Net Profit',
                                                        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                                                    }, {
                                                        name: 'Revenue',
                                                        data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                                                    }, {
                                                        name: 'Free Cash Flow',
                                                        data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
                                                    }],
                                                    chart: {
                                                        type: 'bar',
                                                        height: 350
                                                    },
                                                    plotOptions: {
                                                        bar: {
                                                            horizontal: false,
                                                            columnWidth: '55%',
                                                            endingShape: 'rounded'
                                                        },
                                                    },
                                                    dataLabels: {
                                                        enabled: false
                                                    },
                                                    stroke: {
                                                        show: true,
                                                        width: 2,
                                                        colors: ['transparent']
                                                    },
                                                    xaxis: {
                                                        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                                                    },
                                                    yaxis: {
                                                        title: {
                                                            text: '$ (thousands)'
                                                        }
                                                    },
                                                    fill: {
                                                        opacity: 1
                                                    },
                                                    tooltip: {
                                                        y: {
                                                            formatter: function(val) {
                                                                return "$ " + val + " thousands"
                                                            }
                                                        }
                                                    }
                                                }).render();
                                            });
                                        </script>
                                        <!-- End Column Chart -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <?php include("include/footer.php") ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include("include/script-files.php") ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.21/jspdf.plugin.autotable.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function generatePDF() {
                const {
                    jsPDF
                } = window.jspdf;
                const doc = new jsPDF("p", "mm", "a4");

                // Set Colors
                const headerColor = "#007BFF"; // Blue color for header
                const dateColor = "#FF5733"; // Orange color for date
                const titleColor = "#28A745"; // Green color for title

                // Add Header - Centered with color
                doc.setTextColor(headerColor);
                doc.setFontSize(18);
                doc.text("BixiSoft HR Management", doc.internal.pageSize.getWidth() / 2, 20, {
                    align: "center"
                });

                // Add Report Title - Centered with color
                doc.setTextColor(titleColor);
                doc.setFontSize(14);
                doc.text("Assigned Applicants Report", doc.internal.pageSize.getWidth() / 2, 30, {
                    align: "center"
                });

                // Add Date - Centered with color
                doc.setTextColor(dateColor);
                doc.setFontSize(12);
                doc.text(`Date: ${new Date().toLocaleDateString()}`, doc.internal.pageSize.getWidth() / 2, 40, {
                    align: "center"
                });

                // Generate the table, including all rows
                const tableElement = document.querySelector("#datatable");

                doc.autoTable({
                    html: tableElement,
                    startY: 50, // Position below the header
                    theme: "grid",
                    didDrawPage: (data) => {
                        doc.setTextColor(headerColor);
                        doc.text("Page " + doc.internal.getNumberOfPages(), data.settings.margin.left, doc.internal.pageSize.height - 10);
                    },
                    columnStyles: {
                        6: {
                            cellWidth: 0
                        }, // Hide the "Action" column (index 6)
                    },
                    styles: {
                        cellPadding: 3,
                        fontSize: 10,
                    },
                    margin: {
                        left: 10,
                        right: 10
                    },
                });

                // Add the Pie Chart
                html2canvas(document.querySelector("#pieChart")).then((canvas) => {
                    const imgData = canvas.toDataURL("image/png");
                    const imgWidth = 200;
                    const imgHeight = canvas.height * imgWidth / canvas.width;
                    const positionY = doc.previousAutoTable.finalY + 10;
                    doc.addImage(imgData, "PNG", 10, positionY, imgWidth, imgHeight);

                    return html2canvas(document.querySelector("#columnChart"));
                }).then((canvas) => {
                    const imgData = canvas.toDataURL("image/png");
                    const imgWidth = 200;
                    const imgHeight = canvas.height * imgWidth / canvas.width;
                    const positionY = doc.previousAutoTable.finalY + 10 + imgHeight + 10;
                    doc.addImage(imgData, "PNG", 10, positionY, imgWidth, imgHeight);

                    doc.save("Assigned_Applicants_Report.pdf");
                }).catch((error) => {
                    console.error("Error generating PDF:", error);
                });
            }

            document.querySelector("#downloadPDF").addEventListener("click", generatePDF);
        });
    </script>



</body>