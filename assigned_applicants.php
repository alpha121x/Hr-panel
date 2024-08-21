<head>
    <title>Assigned Applicants</title>

    <?php include("include/linked-files.php") ?>
    <!-- Add jsPDF and html2canvas scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


    <!-- Add PDF generation script -->
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.setFontSize(16);
            doc.text("Assigned Applicants Report", 10, 10);

            html2canvas(document.querySelector("#datatable"))
                .then(canvas => {
                    // Adjust dimensions based on canvas size
                    const imgData = canvas.toDataURL("image/png");
                    const imgWidth = 190; // Set to fit your PDF page width
                    const imgHeight = canvas.height * imgWidth / canvas.width;
                    doc.addImage(imgData, "PNG", 10, 20, imgWidth, imgHeight);

                    return html2canvas(document.querySelector("#pieChart"));
                })
                .then(pieChartCanvas => {
                    const imgData = pieChartCanvas.toDataURL("image/png");
                    const imgWidth = 190; // Set to fit your PDF page width
                    const imgHeight = pieChartCanvas.height * imgWidth / pieChartCanvas.width;
                    doc.addPage();
                    doc.text("Pie Chart", 10, 10);
                    doc.addImage(imgData, "PNG", 10, 20, imgWidth, imgHeight);

                    return html2canvas(document.querySelector("#columnChart"));
                })
                .then(columnChartCanvas => {
                    const imgData = columnChartCanvas.toDataURL("image/png");
                    const imgWidth = 190; // Set to fit your PDF page width
                    const imgHeight = columnChartCanvas.height * imgWidth / columnChartCanvas.width;
                    doc.addPage();
                    doc.text("Column Chart", 10, 10);
                    doc.addImage(imgData, "PNG", 10, 20, imgWidth, imgHeight);

                    doc.save("assigned_applicants_report.pdf");
                })
                .catch(error => {
                    console.error("Error generating PDF:", error);
                });
        }

        document.querySelector("#downloadPDF").addEventListener("click", generatePDF);
    });
</script>

</body>
