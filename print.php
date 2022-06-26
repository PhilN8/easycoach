<?php
header('Content-Type: application/pdf');
require 'fpdf/pdf.php';

//The url you wish to send the POST request to
$url = 'http://localhost/easycoach/backend/purchases.php';

//The data you want to send via POST
$fields = [
    'ticket_info'      => $_GET['id']
];

//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute post
$results = curl_exec($ch);
// echo $results;
$hello = json_decode($results);
$seats_result = (array) $hello[1];
// var_dump($seats_result);

// Handling of Results
$number_of_seats = count($seats_result);
$seats = "";
for ($i = 0; $i < $number_of_seats; $i++) {
    if ($i == $number_of_seats - 1)
        $seats .= $seats_result[$i];
    else
        $seats .= $seats_result[$i] . ", ";
}
$ticketInfo = $hello[0];



$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(40, 10, 'EasyCoach Ke Ltd.');
$pdf->Cell(40, 10, '');
$pdf->Cell(40, 10, '');
$pdf->Cell(20, 10, '');
$pdf->Cell(40, 10, date('Y-m-d'));
$pdf->Ln();
$pdf->Ln();

// Ticket Information
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Name:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $ticketInfo->first_name . " " . $ticketInfo->last_name);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Phone No:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $ticketInfo->tel_no);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'ID No:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $ticketInfo->id_number);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Route:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $ticketInfo->departure . " - " . $ticketInfo->destination);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Departure Date:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $ticketInfo->departure_date);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Seats Booked:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $seats);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(45, 10, 'Total Cost:');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, $number_of_seats * $ticketInfo->cost);
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(100, 10, 'Produce this ticket at the bus station, either printed or electronically');

$pdf->Output('', 'Purchase Info ' . $_GET['id'] . ".pdf");
