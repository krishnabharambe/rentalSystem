author krishna Bharaambe



//A4 width = 219mm
//default margin = 10 mm auto
//writable horizontal : 189

$pdf -> new FPDF("p","mm","A4");
$pdf -> Addpage();
$pdf -> SetFont("font-name","style:bold itaic","size");

$pdf -> Cell(width,height,"text",border(0false/1true),endline(0false/1true),[align]);

$pdf -> Output();