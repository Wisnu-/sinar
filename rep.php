<?php

include 'conf.php';

$opt = isset($_REQUEST['opt']) ? $_REQUEST['opt'] :'';

if($opt == '') {
?>
<div class="onerow spacer"></div>

<div class="onerow">
	<div class="col6">
    	Tanggal
	</div>
    
    <div class="col2">
		<input style="width:100%" id="tgl1" type="text" name="tgl1" /> 
	</div>                    
    <div class="col2">
		<input style="width:100%" id="tgl2" type="text" name="tgl2" /> 
	</div>                   
    <div class="col2 last">
		<a id="tBtn" href="#"> Tampilkan</a>
	</div>
</div>

<div class="onerow spacer"></div>

<div class="onerow">
	<div style="height:300px">
        <div id="dg-rep" />
    </div>
</div>
<script type="text/javascript">
	function myformatter(date){
	    var y = date.getFullYear();
	    var m = date.getMonth()+1;
	    var d = date.getDate();
	    return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
	}
	function myparser(s){
	    if (!s) return new Date();
	    var ss = (s.split('-'));
	    var y = parseInt(ss[0],10);
	    var m = parseInt(ss[1],10);
	    var d = parseInt(ss[2],10);
	    if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
	        return new Date(y,m-1,d);
	    } else {
	        return new Date();
	    }
	} 
	$("#dg-rep").datagrid({
		fit:true,
		title:'Data Penjualan',
		singleSelect: true,
	    rownumbers: true,
	    showFooter: true,
	    columns:[[
	        {field:'id',title:'ID',width:60,hidden:true},
	        {field:'nama',title:'Customer',width:150},
	        {field:'uraian',title:'Uraian',width:300},
	        {field:'total',align:'right',title:'Total',width:150,formatter: function(value,row,index){
				if (row.total){
					return accounting.formatNumber(row.total,{decimal : ",",	thousand: ".",	precision : 0});
				} else {
					return value;
				}
			}}
	    ]]
	});


	$("#tgl1").datebox({
		formatter:myformatter,
		parser:myparser
	});
	$("#tgl2").datebox({
		formatter:myformatter,
		parser:myparser
	});


	$('#tBtn').linkbutton({
	    iconCls: 'icon-search',
	    onClick: function () {
	    	var tgl1 = $('#tgl1').datebox('getValue');
	    	var tgl2 = $('#tgl2').datebox('getValue');
	    	$("#dg-rep").datagrid({url:'rep.php?opt=result&tgl1='+tgl1+'&tgl2='+tgl2});
	    }
	});
</script>
<?php	
}

if ($opt == 'result') {

	$tgl1 = $_REQUEST['tgl1'];
	$tgl2 = $_REQUEST['tgl2'];

	$query = "SELECT
				sales.id,
				sales.tanggal,
				sales.kasir,
				sales.subtotal,
				sales.diskon,
				sales.Ndiskon,
				sales.total,
				sales.bayar,
				Count(detil.order_id) AS jml_order,
				GROUP_CONCAT(detil.uraian) as uraian,
				customer.nama
		FROM sales
		INNER JOIN detil ON detil.order_id = sales.id
		INNER JOIN customer ON customer.id = sales.customer_id
		WHERE sales.tanggal BETWEEN '$tgl1' AND '$tgl2'
		GROUP BY
		sales.id";
		// exit($query);
	$q = $db->query($query);

	$dt = $q->fetchAll();

	$footer = array(
		"uraian" => "TOTAL",
		"total" => 0
	);

	foreach ($dt as $v) {
		$footer["total"] = $footer["total"] + $v["total"];
	}

	$row = array();

	$row['total'] = count($dt);

	$row['rows'] = $dt;

	$row['footer'][] = $footer;

	echo json_encode($row);

}