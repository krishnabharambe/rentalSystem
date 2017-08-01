<?php 
/*
include 'assets/fpdf/fpdf.php';

//A4 width = 219mm
//default margin = 10 mm auto
//writable horizontal : 189

$pdf = new FPDF("p","mm","A4");
$pdf -> Addpage();
//$pdf -> SetFont("font-name","style:bold itaic","size");
$pdf->SetFont('arial','0',24);

//$pdf -> Cell(width,height,"text",border(0false/1true),endline(0false/1true),[align]);
$pdf->Cell(189,6,'Hello World!',0,0,ceter);

$pdf -> Output(); 
 ?>


 <?php 
include('assets/fpdf/fpdf.php');
class Genpdf extends Fpdf{
    public function __construct()
    {
       parent::__construct();
    }
    public function build()
    {
       $this->AddPage();
       $this->SetFont('Arial','B',16);
       $this->Cell(40,10,'¡Hola, Mundo!');
       $this->Output();
    }
}*/



require('assets/fpdf/wordwrap.php');
include 'function_file.php';

date_default_timezone_set("Asia/Kolkata");


$issue_to_id = $_GET['issue_to_id'];
$date = $_GET['date'];
$datetime = date("Y-m-d H:i:s");



$pdf = new PDF();
$pdf->AddPage();

$pdf->SetFont('Arial','BI',16);
$pdf->Cell(189,7,'LimeBerry',0,1,'l');


$pdf->SetFont('Arial','I',15);
$pdf->Cell(189,7,'King\'s Market Buldana 443001',0,1,'l');

$pdf->SetFont('Arial','I',15);
$pdf->Cell(189,7,'Phone: +91 9011365788 | +91 9850364846',0,1,'l');
$pdf->Cell(189,4,'',0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(189,8,'RECEIPT',0,1,'C');
$pdf->Cell(189,4,'',0,1);

$pdf->SetFont('Arial','',13);
$pdf->Cell(40,6,'Technician ID:',0,0,'L');
$pdf->Cell(80,6,$issue_to_id,0,0);
$pdf->Cell(24,6,'Date:',0,0,'R');
$pdf->Cell(45,6,$datetime,0,1,'R');

$pdf->SetFont('Arial','',13);
$pdf->Cell(40,6,'Technician Name:',0,0,'L');
$pdf->Cell(80,6,get_tech_title($issue_to_id),0,0);
$pdf->Cell(41,6,'Mobile:',0,0,'R');
$pdf->Cell(28,6,trim(get_tech_contact($issue_to_id)),0,1,'R');

$pdf->SetFont('Arial','',13);
$pdf->Cell(40,6,'Address:',0,0,'L');
$pdf->Cell(80,6,'',0,0);
$pdf->Cell(41,6,'Alt. Mobile:',0,0,'R');
$pdf->Cell(28,6,trim(get_tech_acontact($issue_to_id)),0,1,'R');

$pdf->SetFont('Arial','',13);
$pdf->Cell(40,5,'',0,0,'L');
$pdf->MultiCell(149,5,get_tech_address($issue_to_id),0,1);


$pdf->Cell(80,6,'',0,1);


$pdf->SetFont('Arial','B',12);
$pdf->Cell(18,6,'Issue ID',1,0,'L');
$pdf->Cell(17,6,'Invty ID',1,0,'L');
$pdf->Cell(50,6,'Inventory Title',1,0,'L');
$pdf->Cell(35,6,'Date Time',1,0,'L');
$pdf->Cell(23,6,'Issued Qty',1,0,'L');
$pdf->Cell(23,6,'Cost/Unit',1,0,'L');
$pdf->Cell(23,6,'Total Cost',1,1,'L');



$borrowdetails_search_query96=mysql_query("SELECT * FROM borrowdetails where b_tech_id='$issue_to_id' AND date = '$date'" ) or die(mysql_error());
					 
		 while ($row = mysql_fetch_array($borrowdetails_search_query96)) {

		 			$pdf->SetFont('Arial','',10);
					$pdf->Cell(18,5,$row['b_id'],1,0,'L');
					$pdf->Cell(17,5,$row['b_inv_id'],1,0,'L');
					$pdf->Cell(50,5,get_inv_title($row['b_inv_id']),1,0,'L');
					$pdf->Cell(35,5,$row['b_timestamp'],1,0,'L');
					$pdf->Cell(23,5,$row['b_tquantity'],1,0,'L');
					$pdf->Cell(23,5,get_inv_cost($row['b_inv_id']),1,0,'L');
					$pdf->Cell(23,5,$row['b_tquantity'] * get_inv_cost($row['b_inv_id']),1,1,'L');	 		

	 } 


$pdf->SetFont('Arial','B',15);
$pdf->Cell(159,7,'Total:',1,0,'R');
$pdf->SetFont('Arial','I',14);

$borrowdetails_search_query96=mysql_query("SELECT SUM(total_cost) as total FROM borrowdetails where b_tech_id='$issue_to_id' AND date = '$date'" ) or die(mysql_error());
					 
		 while ($row = mysql_fetch_array($borrowdetails_search_query96)) {

		 		
					
					$pdf->Cell(30,7,$row['total'],1,0,'L');
						 		

	 } 


$pdf->Output();
?>



