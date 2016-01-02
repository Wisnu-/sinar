<?php
error_reporting(1);
include 'conf.php';
$rootpath = dirname(__FILE__); // rubah, disesuaikan dengan path document berada

define('FPDF_FONTPATH','./pdf/font/');

require_once('./pdf/lib/fpdf.inc.php');
require_once('./pdf/lib/pdftable.inc.php');
require_once('./pdf/lib/pdf.inc.php');
require_once('./pdf/lib/color.inc.php');
require_once('./pdf/lib/htmlparser.inc.php');


$id = $_REQUEST["id"];

$q = $db->query('SELECT customer.nama,
			sales.id,
			sales.tanggal,
			sales.kasir,
			sales.subtotal,
			sales.diskon,
			sales.Ndiskon,
			sales.total,
			sales.bayar
			FROM
			sales
			INNER JOIN customer ON customer.id = sales.customer_id 
			where sales.id=' .$id);

$dt = $q->fetch();



$tbl = '<table border="1" width="100%">';
$tbl .='
  <tr> 
    <td border="0 1 1 0" rowspan="2" colspan="3" valign="top">
    	<img src="kop.jpg" width="80" height="13"></img>
    </td>
    <td style="bold" colspan="2" valign="middle" align="center" bgcolor="#cccccc">FAKTUR PENJUALAN</td>
   </tr> 
  <tr> 
    <td border="1 1 1 1">No Faktur</td>
    <td border="1 1 1 1" style="bold,italic"> SN-' .str_pad($id,8,"0",STR_PAD_LEFT).'</td>
   </tr> 
  <tr> 
  	<td rowspan="2" border="0 1 1 0" colspan="3" valign="top">
  		Perum Meri Blok 33 - 4 Kota Mojokerto<br>0321 553663
    </td>
    <td border="1 1 1 1">Tanggal</td>
    <td border="1 1 1 1">'.$dt['tanggal'].'</td>
   </tr> 
  <tr> 
    <td border="1 1 1 1">Customer</td>
    <td border="1 1 1 1">'.$dt['nama'].'</td>
   </tr>';

$tbl .= '<tr> 
    <td bgcolor="#dddddd" style="bold" border="1 1 1 1" width="10">No</td>
    <td bgcolor="#dddddd" style="bold" border="1 1 1 1" width="20">Jml Brg</td>
    <td bgcolor="#dddddd" style="bold" border="1 1 1 1" width="95">Uraian</td>
    <td bgcolor="#dddddd" style="bold" border="1 1 1 1" width="25">Harga</td>
    <td bgcolor="#dddddd" style="bold" border="1 1 1 1" width="45">Total</td>
   </tr>';

$no = 0;

$qDetil = $db->query("SELECT
		detil.jml,
		detil.uraian,
		detil.harga,
		detil.total
		FROM
		detil where order_id=$id");
$ro = $qDetil->fetchAll();

foreach ($ro as $v) {
	$no++;
	$tbl .= '<tr> 
	    <td border="1 1 1 1" width="10">' . $no . '</td>
	    <td border="1 1 1 1" width="20">' . $v['jml'] . '</td>
	    <td border="1 1 1 1" width="95">' . $v['uraian'] . '</td>
	    <td border="1 1 1 1" width="25" align="right" >' .duit($v['harga']). ' </td>
	    <td border="1 1 1 1" width="45" align="right" >' .duit($v['total']) .' </td>
	   </tr>';
}

for ($i=count($ro); $i < 9; $i++) { 
	$tbl .= '<tr> 
	    <td border="1 1 1 1" width="10"></td>
	    <td border="1 1 1 1" width="20"></td>
	    <td border="1 1 1 1" width="95"></td>
	    <td border="1 1 1 1" width="25"></td>
	    <td border="1 1 1 1" width="45"></td>
	   </tr>';
}



$tbl .= '<tr> 
    <td colspan="3" style="italic" border="1 1 1 1">NB. BARANG YANG DIBELI TIDAK DAPAT DIKEMBALIKAN!!</td>
    <td bgcolor="#dddddd" style="bold" border="1 1 1 1" width="25">TOTAL</td>
    <td align="right" bgcolor="#dddddd" style="bold" border="1 1 1 1" width="45">' .duit($dt['total']). ' </td>
   </tr>';


$tbl .= '<tr> 
    <td colspan="2" style="italic" border="0"></td>
    <td border="0" align="center">
    <br><br><br>
    Penerima <br><br><br><br><br>
    (..................)
    </td>
    <td colspan="2" align="center" border="0">
    <br><br><br>
 	Hormat Kami <br><br><br><br><br>
    ( ' .$dt['kasir'].')
    </td>
    </tr>';

$tbl .= '<tr> 
    <td colspan="5" style="italic" border="0">
    <br><br><br>
    <br><br>
    <br><br><br>.
    <br>
    <br>
    </td>
    </tr>';


$tbl .= '</table>';



$tbl2 = $tbl;

$ct = $tbl . $tbl2;

$p = new PDF();
			
// PAGE // Data
$p->SetMargins(10,10,10,10);
$p->AddPage();
$p->setStyle('normal');
$p->SetFont('helvetica','', '8');
$p->htmltable($ct);


$filename = "report.pdf"; // ubah namafile sesuai dengan keinginanr
$p->output($filename, 'F');

if(file_exists($filename)) {
?>
	<div id="pdf" data-options="fit:true">
		It appears you don't have Adobe Reader or PDF support in this web browser. 
		<a href="report.pdf">Click here to download the PDF</a>
	</div>
	<script type="text/javascript">
		$("#pdf").panel({fit:true});
		var success = new PDFObject({ url: "report.pdf" }).embed("pdf");
	</script>
<?php
}