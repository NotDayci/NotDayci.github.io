<?php
$data = $_POST["data"];

// HTML 파일에 데이터 저장
$file = fopen("data.html", "w");

$htmlContent = "<table>\n";
$htmlContent .= "<tr>\n";
$htmlContent .= "<th>Title</th>\n";
$htmlContent .= "<th>Novice</th>\n";
$htmlContent .= "<th>Advanced</th>\n";
$htmlContent .= "<th>Exhaust</th>\n";
$htmlContent .= "<th>Maximum</th>\n";
$htmlContent .= "<th>Infinity</th>\n";
$htmlContent .= "</tr>\n";

foreach ($data as $entry) {
    $title = $entry[0];
    $novice = $entry[1];
    $advanced = $entry[2];
    $exhaust = $entry[3];
    $maximum = $entry[4];
    $infinity = $entry[5];

    $htmlContent .= "<tr class=\"data\">\n";
    $htmlContent .= "<td>$title</td>\n";
    $htmlContent .= "<td>$novice</td>\n";
    $htmlContent .= "<td>$advanced</td>\n";
    $htmlContent .= "<td>$exhaust</td>\n";
    $htmlContent .= "<td>$maximum</td>\n";
    $htmlContent .= "<td>$infinity</td>\n";
    $htmlContent .= "</tr>\n";
}

$htmlContent .= "</table>";

fwrite($file, $htmlContent);
fclose($file);

echo "Data saved to HTML file";
?>
