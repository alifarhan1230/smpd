<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_laporan_pad extends CI_Controller{

	var $fontSize = 10;
    var $fontFam = 'Arial';
    var $yearId = 0;
    var $yearCode="";
    var $paperWSize = 410;
    var $paperHSize = 255;
    var $height = 5;
    var $currX;
    var $currY;
    var $widths;
    var $aligns;

    function __construct() {
        parent::__construct();
        //$this->formCetak();
        $pdf = new FPDF();
        $this->startY = $pdf->GetY();
        $this->startX = $this->paperWSize-12;
        $this->lengthCell = $this->paperHSize+10;
    }

    function newLine(){
        $pdf = new FPDF();
        $pdf->Cell($this->lengthCell, $this->height, "", "", 0, 'L');
        $pdf->Ln();
    }
	
	

	function pageCetak(){
		$p_year_period_id = getVarClean('p_year_period_id','int',0);
		$year_code = getVarClean('year_code','str','');

		$_BORDER = 0;
		$_FONT = 'Times';
		$_FONTSIZE = 10;
	    $pdf = new FPDF();
		$pdf->AliasNbPages();
	    $pdf->AddPage('Landscape', 'Letter');
	    $pdf->SetFont('helvetica', '', $_FONTSIZE);
		$pdf->SetRightMargin(5);
		$pdf->SetLeftMargin(9);
		$pdf->SetAutoPageBreak(false,0);

		$pdf->SetFont('helvetica', 'B',12);
		$pdf->SetWidths(array(260));
		$pdf->SetAligns('C');
		$pdf->ln(1);
	    $pdf->RowMultiBorderWithHeight(array("DAFTAR PENERIMAAN PAD BERDASARKAN JENIS PENERIMAAN"),array('',''),4);
		//$pdf->ln(8);
		$pdf->SetWidths(array(260,260));
		$pdf->ln(3);
		$pdf->RowMultiBorderWithHeight(array("TAHUN ".$year_code,""),array('',''),6);

		$sql="SELECT * FROM f_laporan_pad($p_year_period_id) AS tbl (rc_pad);";	
		$query = $this->db->query($sql);
		$items=$query->result_array();

		$lheader = $this->lengthCell / 16;
		$lheader1 = $lheader * 1;
		$lheader2 = $lheader * 2;
		$lheader3 = $lheader * 3;
		$lheader4 = $lheader * 4;
		$lheader8 = $lheader * 8;

		$pdf->SetFont('arial', '',8);
		$pdf->ln(8);
		$pdf->SetWidths(array($lheader1,$lheader1,$lheader1 * 12,$lheader1,$lheader1));
		$pdf->SetAligns(Array('C','C','C','C','C'));
		$pdf->RowMultiBorderWithHeight(array("Jenis","Target","Bulan", "Jumlah", "Persentase"),array('LT','LT','LT','LT','LTR'),6);

		$pdf->SetWidths(array($lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1));
		$pdf->SetAligns(Array('C','C','C','C','C','C','C','C','C','C','C','C','C','C','C'));
		$pdf->RowMultiBorderWithHeight(array("Penerimaan","","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember", "", ""),array('L','L','LT','LT','LT','LT','LT','LT','LT','LT','LT','LT','LT','LT','L','LR'),6);
		for ($i=0; $i <count($items) ; $i++) { 
			$pdf->SetWidths(array($lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1,$lheader1));
			$pdf->SetAligns(Array('L','R','R','R','R','R','R','R','R','R','R','R','R','R','R','R'));
			$first_char = substr($items[$i]['rc_pad'], 0,1);
			$rc_pad = [];
			if ($first_char == '#') {
				$pdf->SetFont('arial', 'B',8);
				$rc_pad = substr($items[$i]['rc_pad'], 1);
			} else {
				$pdf->SetFont('arial', '',8);
				$rc_pad = $items[$i]['rc_pad'];
			}
			$pdf->RowMultiBorderWithHeight(array($rc_pad,number_format($items[$i]['target'], 2, ',', '.'),number_format($items[$i]['januari'], 2, ',', '.'),number_format($items[$i]['februari'], 2, ',', '.'),number_format($items[$i]['maret'], 2, ',', '.'),number_format($items[$i]['april'], 2, ',', '.'),number_format($items[$i]['mei'], 2, ',', '.'),number_format($items[$i]['juni'], 2, ',', '.'),number_format($items[$i]['juli'], 2, ',', '.'),number_format($items[$i]['agustus'], 2, ',', '.'),number_format($items[$i]['september'], 2, ',', '.'),number_format($items[$i]['oktober'], 2, ',', '.'),number_format($items[$i]['november'], 2, ',', '.'),number_format($items[$i]['desember'], 2, ',', '.'), number_format($items[$i]['total'], 2, ',', '.'), number_format($items[$i]['persentasi'], 2, ',', '.')),array('LTB','LTB','LTB','LTB','LTB','LTB','LTB','LTB','LTB','LTB','LTB','LTB','LTB','LTB','LTB','LTBR'),6);
		}
		


		
		$pdf->Output("","I");
	}

	

	

}



