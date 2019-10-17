<?php defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('fpdf/invClassExtend.php');

class Cetak_formulir_skpdkb_pdf extends CI_Controller{
    var $fontSize = 10;
    var $fontFam = 'Arial';
    var $yearId = 0;
    var $yearCode="";
    var $paperWSize = 210;
    var $paperHSize = 297;
    var $height = 5;
    var $currX;
    var $currY;
    var $widths;
    var $aligns;

    function __construct() {
        parent::__construct();
        $pdf = new FPDF();
        $this->startY = $pdf->GetY();
        $this->startX = $this->paperWSize-42;
        $this->lengthCell = $this->startX+20;
    }

    function newLine(){
        $pdf = new FPDF();
        $pdf->Cell($this->lengthCell, $this->height, "", "", 0, 'L');
        $pdf->Ln();
    }

    function pageCetak() {

        $t_vat_setllement_id        = getVarClean('t_vat_setllement_id', 'int', 0);
        
        $data = $this->getData($t_vat_setllement_id);


        $pdf = new FPDF();
        
        
        $this->kopSurat($pdf,$data);
        $this->identitasWp($pdf,$data);
        $this->isiSurat($pdf,$data);
        $this->bagianTerbilang($pdf,$data);
        $this->bagianTTD($pdf,$data);
        
        
        
        
        $pdf->Output();
    } 

    function kopSurat($pdf,$data){
      $pdf->AliasNbPages();
      $pdf->AddPage("P");
      $pdf->SetFont('Arial', '', 6);
      
      $pdf->Image(getValByCode('LOGO'),12,12,25,25);

      $lheader = $this->lengthCell / 8;
      $lheader1 = $lheader * 1;
      $lheader2 = $lheader * 2;
      $lheader3 = $lheader * 3;
      $lheader4 = $lheader * 4;
      
      $pdf->Cell($lheader1, $this->height, "", "LT", 0, 'L');
      $pdf->Cell($lheader3 - 15, $this->height, "", "TR", 0, 'L');
      $pdf->Cell($lheader2 + 15, $this->height, "", "TR", 0, 'C');
      $pdf->Cell($lheader2, $this->height, "", "TR", 0, 'C');
      $pdf->Ln();
      
      $pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lheader3 - 15, $this->height, getValByCode('INSTANSI_1'), "R", 0, 'C');
      $pdf->SetFont('Arial', '', 8);
      $pdf->Cell($lheader2 + 15, $this->height, "SKPDKB", "R", 0, 'C');
      $pdf->SetFont('Arial', '', 6);
      $pdf->Cell($lheader2, $this->height, "", "R", 0, 'C');
      $pdf->Ln();

      $pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lheader3 - 15, $this->height, getValByCode('INSTANSI_2'), "R", 0, 'C');
      $pdf->SetFont('Arial', '', 6);
      $pdf->Cell($lheader2 + 15, $this->height, "(Surat Keterangan Pajak Daerah Kurang Bayar)", "R", 0, 'C');
      $pdf->SetFont('Arial', '', 6);
      $pdf->Cell($lheader2, $this->height, "No. Urut", "R", 0, 'C');
      $pdf->Ln();
      
      $pdf->Cell($lheader1, $this->height + 2, "", "L", 0, 'L');
      $pdf->Cell($lheader3 - 15, $this->height + 2, getValByCode('ALAMAT_6'), "R", 0, 'C');
      $pdf->SetFont('Arial', '', 6);
      $pdf->Cell(9, $this->height + 2, "", "", 0, 'L');
      $pdf->Cell($lheader1 + 6, $this->height + 2, "Masa Pajak ", "", 0, 'L');
      $pdf->Cell($lheader1, $this->height + 2, ": ".$data["finance_period_code"], "R", 0, 'L');
      $pdf->SetFont('Arial', '', 6);
      $pdf->Cell($lheader2, $this->height + 2, "", "R", 0, 'C');
      $pdf->Ln($this->height - 4);
      // No Urut
      $pdf->Cell($lheader2 + $lheader4 + 1, $this->height, "", "R", 0, 'C');
      $no_urut = str_split($data["no_urut"]);
      $this->kotak($pdf,1, 34, 8, $no_urut);
      $pdf->Ln();


      $pdf->Cell($lheader1, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lheader3 - 15, $this->height, "Telp. ".getValByCode('ALAMAT_2').' '.getValByCode('ALAMAT_3'), "R", 0, 'C');
      $pdf->SetFont('Arial', '', 6);
      $pdf->Cell(9, $this->height, "", "", 0, 'L');
      $pdf->Cell($lheader1 + 6, $this->height, "Tahun Pajak ", "", 0, 'L');
      $pdf->Cell($lheader1, $this->height, ": ".$data["tahun"], "R", 0, 'L');
      $pdf->Cell($lheader2, $this->height, "", "R", 0, 'C');
      $pdf->Ln();

      $pdf->Cell($lheader1, $this->height, "", "LB", 0, 'L');
      $pdf->Cell($lheader3 - 15, $this->height, "", "BR", 0, 'L');
      $pdf->Cell($lheader2 + 15, $this->height, "", "BR", 0, 'L');
      $pdf->Cell($lheader2, $this->height, "", "BR", 0, 'L');
    }

    function identitasWp($pdf,$data){
      $lbody = $this->lengthCell / 4;
      $lbody1 = $lbody * 1;
      $lbody2 = $lbody * 2;
      $lbody3 = $lbody * 3;

      //=================================
      // START kotak pertama nama dan lain lain
      $pdf->Ln();
      $pdf->Cell(5, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody1 - 5, $this->height, "Nama", "", 0, 'L');
      $pdf->Cell($lbody3, $this->height, ": " . $data["wp_name"], "R", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell(5, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody1 - 5, $this->height, "Alamat", "", 0, 'L');
      $pdf->Cell($lbody3, $this->height, ": " . $data["wp_address_name"], "R", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell(5, $this->height + 2, "", "L", 0, 'L');
      $pdf->Cell($lbody1 - 5, $this->height + 2, "NPWPD", "", 0, 'L');
      $pdf->Cell($lbody1, $this->height + 2, "", "", 0, 'L');
      $pdf->Cell($lbody2, $this->height + 2, "", "R", 0, 'L');
      $pdf->Ln($this->height-4);
      
      $pdf->Cell($lbody1 + 3, $this->height, ":", "L", 0, 'R');
      $rep_npwd = str_replace(".", "", $data["npwd"]);
      $arr1 = str_split($rep_npwd);
      
      $this->kotak($pdf,1, 34, 1,$arr1[0]);
      $this->kotakKosong($pdf,1, 34, 1);
      $this->kotak($pdf,1, 34, 1,$arr1[1]);
      $this->kotakKosong($pdf,1, 34, 1);
      $this->kotak($pdf,1, 34, 1,$arr1[2]);
      $this->kotak($pdf,1, 34, 1,$arr1[3]);
      $this->kotak($pdf,1, 34, 1,$arr1[4]);
      $this->kotak($pdf,1, 34, 1,$arr1[5]);
      $this->kotak($pdf,1, 34, 1,$arr1[6]);
      $this->kotak($pdf,1, 34, 1,$arr1[7]);
      $this->kotak($pdf,1, 34, 1,$arr1[8]);
      $this->kotakKosong($pdf,1, 34, 1);
      $this->kotak($pdf,1, 34, 1,$arr1[9]);
      $this->kotak($pdf,1, 34, 1,$arr1[10]);
      $this->kotakKosong($pdf,1, 34, 1);
      $this->kotak($pdf,1, 34, 1,$arr1[11]);
      $this->kotak($pdf,1, 34, 1,$arr1[12]);
      $pdf->Ln();
      
      $pdf->Cell(5, $this->height, "", "BL", 0, 'L');
      $pdf->Cell($lbody1 - 5, $this->height, "Tanggal jatuh tempo", "B", 0, 'L');
      $pdf->Cell($lbody3, $this->height, ": ".$data["due_date"], "BR", 0, 'L');

      //END kotak pertama nama dan lain lain
      //=================================
    }

    function isiSurat($pdf,$data){
      //=================================
      // START kotak pertama pasal dan lain lain
      $pdf->Ln();
      $this->tulis($pdf,"I. Berdasarkan Pasal 65 ayat (2) dan (3) Peraturan Daerah Nomor 20 Tahun 2011, telah dilakukan pemeriksaan atau keterangan lain di atas", "L");
      $this->tulis($pdf,"pelaksanaan kewajiban:", "L");
      
      $lbody = $this->lengthCell / 4;
      $lbody1 = $lbody * 1;
      $lbody2 = $lbody * 2;
      $lbody3 = $lbody * 3;
      $indent = $this->lengthCell / 30;
      
      $pdf->Cell(5, $this->height + 2, "", "L", 0, 'L');
      $pdf->Cell($lbody1 - 5, $this->height + 2, "Ayat Pajak", "", 0, 'L');
      $pdf->Cell($lbody3, $this->height + 2, ": " /*. $data["ayat"]*/, "R", 0, 'L');
      $pdf->Ln($this->height - 4);
      
      // Ayat Pajak
      $isikotak =array("","","","","","");
      $pdf->Cell($lbody1 + 3, $this->height, "", "L", 0, 'R');
      $this->kotak($pdf,1, 34, 6, $isikotak );
      $pdf->Ln();
      // ==========
      
      $pdf->Cell(5, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody1 - 5, $this->height, "Nama Pajak", "", 0, 'L');
      $pdf->Cell($lbody3, $this->height, ": ".$data["jenis_pajak"], "R", 0, 'L');
      $pdf->Ln();
      
      $this->tulis($pdf,"II. Dari pemeriksaan atau keterangan lain tersebut di atas, perhitungan jumlah yang masih harus dibayar adalah sebagai berikut:", "L");
      
      $pdf->Cell(5, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody3 - 5, $this->height, "1. Dasar Pengenaan", "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "Rp ".number_format($data["debt_vat_amt"],2,",","."), "R", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell(5, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody3 - 5, $this->height, "2. Pajak yang Terutang", "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "Rp ".number_format($data["terutang"],2,",","."), "R", 0, 'L');
      $pdf->Ln();
      
      $this->tulis($pdf,"3. Kredit Pajak", "L");
      
      $pdf->Cell(10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody2 - 10, $this->height, "a. Kompensasi kelebihan dari tahun sebelumnya", "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "Rp ".number_format($data["cr_adjustment"],2,",","."), "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "", "R", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell(10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody2 - 10, $this->height, "b. Setoran yang dilakukan", "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "Rp ".number_format($data["cr_payment"],2,",","."), "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "", "R", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell(10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody2 - 10, $this->height, "c. Lain-lain", "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "Rp ".number_format($data["cr_others"],2,",","."), "B", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "", "R", 0, 'L');
      $pdf->Ln();
      
      $jumno3 = $data["cr_others"] + $data["cr_payment"] + $data["cr_adjustment"];
      $pdf->Cell(10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody2 - 10, $this->height, "d. Jumlah yang dapat dikreditkan (a + b + c)", "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "Rp ".number_format($jumno3,2,",","."), "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "", "R", 0, 'L');
      $pdf->Ln();
      
      $this->tulis($pdf,"4. Jumlah kekurangan pembayaran Pokok Pajak (2-3d)", "L");
      $this->tulis($pdf,"5. Sanksi Administrasi", "L");
      
      $pdf->Cell(10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody2 - 10, $this->height, "a. Bunga (Pasal 65 ayat(2)", "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "Rp ".number_format($data["db_interest_charge"],2,",","."), "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "", "R", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell(10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody2 - 10, $this->height, "b. Kenaikan (Pasal 65 ayat (3)", "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "Rp ".number_format($data["db_increasing_charge"],2,",","."), "B", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "", "R", 0, 'L');
      $pdf->Ln();
      
      $jumno5 = $data["db_interest_charge"] + $data["db_increasing_charge"];
      $pdf->Cell(10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody2 - 10, $this->height, "c. Jumlah sanksi administrasi (a + b)", "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "" , "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "Rp ".number_format($jumno5,2,",","."), "BR", 0, 'L');
      $pdf->Ln();
      
      $jumno4 = $data["terutang"] - $jumno3;
      $total = $jumno4 + $jumno5;
      $pdf->Cell(5, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody3 - 5, $this->height, "6. Jumlah yang masih harus dibayar (4 + 5c)", "", 0, 'L');
      $pdf->Cell($lbody1, $this->height, "Rp ".number_format($total,2,",","."), "BR", 0, 'L');
      $pdf->Ln();

      // END kotak pertama pasal dan lain lain
      //=================================
    }

    function bagianTerbilang($pdf,$data){
      $lbody = $this->lengthCell / 4;
      $lbody1 = $lbody * 1;
      $lbody2 = $lbody * 2;
      $lbody3 = $lbody * 3;
      $indent = $this->lengthCell / 30;
      
      //=================================
      // START kotak terbilang
      $total = (isset($total)) ? $total : 0;
      $huruf = $this->terbilang($total);

      $pdf->Cell($this->lengthCell, $this->height, "", "BLR", 0, 'L');
      $pdf->Ln();
      $pdf->Cell(5, $this->height + 2, "", "BL", 0, 'L');
      $pdf->Cell($lbody1 - 5, $this->height + 2, "Dengan huruf", "B", 0, 'L');
      $pdf->Cell($lbody3, $this->height + 2, "", "BR", 0, 'L');
      $pdf->Ln($this->height - 4);
      
      // Dengan huruf
      $pdf->Cell($lbody1 - 5, $this->height, "", "", 0, 'L');
      $this->kotak($pdf,25, 34, 1, $huruf);
      $pdf->Ln();

      // END  kotak terbilang
      //=================================
    }

    function bagianTTD($pdf,$data){


      $lbody = $this->lengthCell / 4;
      $lbody1 = $lbody * 1;
      $lbody2 = $lbody * 2;
      $lbody3 = $lbody * 3;
      $indent = $this->lengthCell / 30;

      $pdf->SetFont('Arial', 'U', 7);
      $pdf->Cell($lbody1, $this->height, "PERHATIAN:", "L", 0, 'L');
      $pdf->Cell($lbody3, $this->height, "", "R", 0, 'L');
      $pdf->Ln();
      $pdf->SetFont('Arial', '', 6);
      $this->tulis($pdf,"1. Harap penyetoran dilakukan melalui Kas Daerah dengan menggunakan Surat Setoran Pajak Daerah (SSPD)", "L");
      $this->tulis($pdf,"2. Apabila SKPDKB ini tidak atau kurang dibayar setelah lewat waktu paling lama 15 hari kalender sejak SKPDKB ini diterbitkan", "L");
      $this->tulis($pdf,"dikenakan sanksi administrasi berupa bunga sebesar 2% per bulan.", "L");
      
      $pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody1 + 10, $this->height, getValByCode('ALAMAT_3').', '. date("d F Y") /*. $data["tanggal"]*/, "R", 0, 'C');
      $pdf->Ln();
      
      $pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody1 + 10, $this->height, "KEPALA ".getValByCode('INSTANSI_2'), "R", 0, 'C');
      $pdf->Ln();
      
      $pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody1 + 10, $this->height, 'KABUPATEN '.strtoupper(getValByCode('ALAMAT_3')), "R", 0, 'C');
      $this->newLine();
      $pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody1 + 10, $this->height, $data["nama_kadin"], "R", 0, 'C');
      $pdf->Ln();

      $pdf->Cell($lbody3 - 10, $this->height, "", "BL", 0, 'L');
      $pdf->Cell($lbody1 + 8, $this->height, "NIP. " . $data["nip_kadin"], "BT", 0, 'L'); //isi nip
      $pdf->Cell(2, $this->height, "", "BR", 0, 'L');
      $pdf->Ln();


      $pdf->Cell($this->lengthCell, $this->height, "Gunting di sini", "B", 0, 'C');
      $pdf->Ln();
      $pdf->Ln();
      $pdf->Cell($lbody1, $this->height, "", "TL", 0, 'L');
      $pdf->Cell($lbody2, $this->height, "TANDA TERIMA", "T", 0, 'C');
      $pdf->Cell($lbody1, $this->height, "No. STPD", "TR", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell($lbody1, $this->height, "     NPWPD", "L", 0, 'L');
      $pdf->Cell($lbody3, $this->height, ": ".$data["npwd"], "R", 0, 'L');
      $pdf->Ln();
      
      $pdf->Cell($lbody1, $this->height, "     Nama", "L", 0, 'L');
      $pdf->Cell($lbody3, $this->height, ": ".$data["wp_name"], "R", 0, 'L');
      $pdf->Ln();

      $pdf->Cell($lbody1, $this->height, "     Alamat", "L", 0, 'L');
      $pdf->Cell($lbody3, $this->height, ": ".$data["wp_address_name"], "R", 0, 'L');
      $pdf->Ln();
      $pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody1 + 10, $this->height, getValByCode('ALAMAT_3').", " . date("d F Y"), "R", 0, 'C');
      $pdf->Ln();
      $pdf->Cell($lbody3 - 10, $this->height, "", "L", 0, 'L');
      $pdf->Cell($lbody1 + 10, $this->height, "Yang menerima, ", "R", 0, 'C');
      $this->newLine();
      $pdf->Cell($this->lengthCell, $this->height, "", "LR", 0, 'L');
      $pdf->Ln();
      $pdf->Cell($lbody3 - 10, $this->height, "", "BL", 0, 'L');
      $pdf->Cell($lbody1 + 10, $this->height, "(....................................)", "BR", 0, 'C');
    }

    function kotak($pdf,$pembilang, $penyebut, $jumlahKotak, $isi){
      $lkotak = $pembilang / $penyebut * $this->lengthCell;
      for($i = 0; $i < $jumlahKotak; $i++){
        $pdf->Cell($lkotak, $this->height, $isi[$i], "TBLR", 0, 'C');
      }
    }

    function  tulis($pdf,$text, $align){
      $pdf->Cell(5, $this->height, "", "L", 0, 'C');
      $pdf->Cell($this->lengthCell - 10, $this->height, $text, "", 0, $align);
      $pdf->Cell(5, $this->height, "", "R", 0, 'C');
      $pdf->Ln();
    }

    function kotakKosong($pdf,$pembilang, $penyebut, $jumlahKotak){
      $lkotak = $pembilang / $penyebut * $this->lengthCell;
      for($i = 0; $i < $jumlahKotak; $i++){
        $pdf->Cell($lkotak, $this->height, "", "LR", 0, 'L');
      }
    }

    function getDataSetllement($t_vat_setllement_id){

        $sql = "SELECT *
                  FROM v_vat_setllement
                WHERE t_vat_setllement_id = ".$t_vat_setllement_id;

        //echo ($sql);exit;

        $output = $this->db->query($sql);
        $items = $output->result_array();

        if ($items != null || $items != ''){
          foreach ($items as $item) {
            $data[] = array (
                      't_cust_account_id'     => $item['t_cust_account_id'],   
                      'finance_period_code'   => $item['finance_period_code'],   
                      'tahun'                 => $item['tahun'],   
                      'npwd'                  => $item['npwd'],
                      'due_date'              => $item['due_date'],
                      'no_urut'               => $item['order_no'],
                      'jenis_pajak'           => $item['jenis_pajak'],
                      'debt_vat_amt'          => $item['debt_vat_amt'],
                      'terutang'              => $item['terutang'],
                      'cr_adjustment'         => $item['cr_adjustment'],
                      'cr_payment'            => $item['cr_payment'],
                      'cr_others'             => $item['cr_others'],
                      'db_interest_charge'    => $item['db_interest_charge'],
                      'db_increasing_charge'  => $item['db_increasing_charge']
                    );
          }
        }
        
        return $data[0];
    }

    function getDataAccount($data){

        $sql = "SELECT wp_name, wp_address_name, wp_kota
                  FROM v_cust_account_update
                WHERE t_cust_account_id = ".$data["t_cust_account_id"];

        //echo ($sql);exit;

        $output = $this->db->query($sql);
        $items = $output->result_array();

        if ($items != null || $items != ''){
          foreach ($items as $item) {
            $data ['wp_name' ] = $item['wp_name'];  
            $data ['wp_address_name' ] = $item['wp_address_name'];
            $data ['wp_kota' ] = $item['wp_kota'];
          }
        }
        
        return $data;
    }

    function getDataBarcode($data){

        $sql = "SELECT f_gen_barcode('test')";

        //echo ($sql);exit;

        $output = $this->db->query($sql);
        $items = $output->result_array();

        if ($items != null || $items != ''){
          foreach ($items as $item) {
            $data ['barcode' ] = $item['f_gen_barcode']; 
          }
        }
        
        return $data;
    }

    function getDataTTD($data){

        $sql = "SELECT value as nama_kadin, value_2 as nip_kadin 
                  FROM p_global_param 
                WHERE code = 'TTD KADIN'";

        //echo ($sql);exit;

        $output = $this->db->query($sql);
        $items = $output->result_array();

        $data ['nama_kadin' ] = "";
        $data ['nip_kadin' ] ='';

        if ($items != null || $items != ''){
          foreach ($items as $item) {
            $data ['nama_kadin' ] = $item['nama_kadin']; 
            $data ['nip_kadin' ] = $item['nip_kadin'];
          }
        }
        
        return $data;
    }


    function getData($t_vat_setllement_id){
      $data = $this->getDataSetllement($t_vat_setllement_id);
      $data = $this->getDataAccount($data);
      $data = $this->getDataBarcode($data);
      $data = $this->getDataTTD($data); 

      return $data;
    }

    function terbilang($number){
      $sql = "select replace(f_terbilang('". $number . "','IDR'), '  ', ' ') as dengan_huruf";

        //echo ($sql);exit;

        $output = $this->db->query($sql);
        $items = $output->result_array();

        if ($items != null || $items != ''){
          foreach ($items as $item) {
            $huruf  = $item['dengan_huruf']; 
          }
        }

        return $huruf;
    }



   

    function dateToday(){
      $tanggal=date("m Y");
      if(empty($tanggal)) return "";
      
      $monthname = array(0  => '-',
                         01  => 'Januari',
                         02  => 'Februari',
                         03  => 'Maret',
                         04  => 'April',
                         05  => 'Mei',
                         06  => 'Juni',
                         07  => 'Juli',
                         08  => 'Agustus',
                         09  => 'September',
                         10 => 'Oktober',
                         11 => 'November',
                         12 => 'Desember');    
      
      $pieces = explode(' ', $tanggal);
      
      return $monthname[(int)$pieces[0]].' '.$pieces[1];
    }

}


