<?php
require('assets/pChart2.1.4/class/pDraw.class.php');
require('assets/pChart2.1.4/class/pImage.class.php');
require('assets/pChart2.1.4/class/pData.class.php');

// Create a pData object
$data = new pData();
$data->addPoints([44, 55, 13, 43, 22], "Series1");
$data->setSerieDescription("Series1", "Series1");
$data->addPoints(["Team A", "Team B", "Team C", "Team D", "Team E"], "Labels");
$data->setSerieDescription("Labels", "Teams");
$data->setAbscissa("Labels");

// Create a pImage object
$image = new pImage(700, 230, $data);

// Draw the chart
$image->setFontProperties(["FontName" => "assets/pChart2.1.4/fonts/Forgotte.ttf", "FontSize" => 14]);
$image->drawFilledRectangle(0, 0, 700, 230, ["R" => 255, "G" => 255, "B" => 255]);

// Draw Pie Chart
$pieChartOptions = [
    "Radius" => 100,
    "DrawLabels" => TRUE,
    "LabelStacked" => TRUE,
    "LabelRadius" => 120,
    "Border" => TRUE,
    "BorderSize" => 2
];
$image->drawPieGraph($data->getData(), $data->getDataDescription(), $pieChartOptions);

// Render the image to a file
$image->render("uploads/save/pie_chart.png");

echo "Chart generated successfully!";
?>
