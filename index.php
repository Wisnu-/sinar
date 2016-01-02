<?php 
include 'conf.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title>Kasir Sinar Mojokerto</title>

	<link rel="stylesheet" type="text/css" href="assets/easyui.css"/>
	<link rel="stylesheet" type="text/css" href="assets/icon.css"/>
	<link rel="stylesheet" type="text/css" href="assets/demo.css"/>

	<script type="text/javascript" src="assets/jquery.min.js"></script>
	<script type="text/javascript" src="assets/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="assets/jquery.edatagrid.js"></script>
	<script type="text/javascript" src="assets/app.js"></script>
	<meta name="robots" content="noindex, nofollow">

</head>

	<body class="easyui-layout">

		        <div data-options="region:'north',border:false" style="height:60px">
                <div class="logo">
					
                </div>
		</div>		

        <div id="x-content" data-options="region:'center'" title="">     
			<div class="one-1200">
				<div class="onerow">
					<div class="col7">
						<table cellpadding="5">
							<tr>
								<td>Tanggal</td>
								<td><input disabled id="iTanggal" value="<?php echo hari(); ?>" type="text" name="tanggal" /></td>
                                <td></td>
							</tr>
							<tr>
								<td>Customer</td>
								<td><input id="iCustomer" type="text" name="customer" style="min-width:250px;"/></td>
                                <td><a id="addCustomer">[F1] Tambah</a></td>
							</tr>
							
						</table>
					</div>
					
					
					<div class="col5 last">
						<table cellpadding="5">
							<tr>
								<td>Nama Kasir</td>
								<td><input value="nama kasir" id="iKasir" type="text" name="kasir" /></td>
							</tr>
						</table>
					</div>
				</div>
				<!-- spacer -->
				<div class="onerow spacer">
				</div>

				
				<!-- tombol datagrid wkwk -->
				<div class="onerow">
					<div class="col4">
						<input style="width:260px" id="iBarang" type="text" name="barang" />
                        [F2]
					</div>
                    <div class="col4">
                        Jml 
						<input style="width:50px" id="iJml" type="text" name="jml" />
                        P  
						<input style="width:60px" id="iP" type="text" name="p" />  L  
						<input style="width:60px" id="iL" type="text" name="l" />   
					</div>
                    
                    <div class="col3">
						Ket 
						<input id="iKeterangan" style="width:160px" id type="text" name="iKeterangan" />
					</div>
					<div class="col1 last">
						<a id="addBtn" href="#"> Tambah</a>
					</div>
				</div>
                	<br />

                <!-- spacer -->
				<div class="onerow spacer">
				</div>
                
				<!-- datagrid -->
				<div class="onerow">
                    <div style="height:300px">
                        <div id="dg" />
                    </div>
				</div>                


				<div class="onerow" style="padding:5px 0;margin 10px 0 0 0">
                    <div class="col8">
                    	&nbsp;
					</div>
                    
                    <div class="col2">
						<div style="text-align:right">Sub Total  Rp.</div>  
					</div>                    
                    <div class="col2 last">
						<input style="width:100%" id="sSubTotal" type="text" name="sSubTotal" /> 
					</div>
				</div>

				<div class="onerow" style="padding:5px 0;margin 10px 0 0 0">
                    <div class="col8">
                    	&nbsp;
					</div>
                    
                    <div class="col1">
						<div style="text-align:right">Diskon  %</div>  
					</div>                     
                    <div class="col1">
						<input value="0" style="width:100%" id="sDiskon" type="text" name="sDiskon" /> 
					</div>                    
                    <div class="col2 last">
						<input style="width:100%" id="hDiskon" type="text" name="hDiskon" /> 
					</div>
				</div>
				
				<div class="onerow" style="padding:5px 0;margin 10px 0 0 0">
                    <div class="col8">
                    	&nbsp;
					</div>
                    
                    <div class="col2">
						<div style="text-align:right">Total  Rp.</div>  
					</div>                    
                    <div class="col2 last">
						<input style="width:100%" id="sTotal" type="text" name="sTotal" /> 
					</div>
				</div>	

				<div class="onerow" style="padding:5px 0;margin 10px 0 0 0">
                    <div class="col8">
                    	&nbsp;
					</div>
                    
                    <div class="col2">
						<div style="text-align:right">Bayar  Rp.</div>  
					</div>                    
                    <div class="col2 last">
						<input style="width:100%" id="sBayar" type="text" name="sBayar" /> 
					</div>
				</div>	
				<div class="onerow" style="padding:5px 0;margin 10px 0 0 0">
                    <div class="col8">
                    	&nbsp;
					</div>
                    
                    <div class="col2">
						<div style="text-align:right">Kembali  Rp.</div>  
					</div>                    
                    <div class="col2 last">
						<input style="width:100%" id="sKembali" type="text" name="sKembali" /> 
					</div>
				</div>	

				<div class="onerow" style="padding:5px 0;margin 10px 0 0 0">
                    <div class="col10">
                    	LIHAT TRANSAKSI [F8] 
					</div>                    
                    <div class="col2 last">
						<a id="printBtn" href="#"> Simpan & Cetak</a>
					</div>
				</div>

			</div>
        </div>
		<div id="x-dialog" />
		<div id="x-report" />
<script>
$(document).on( "keydown", function(e) {
	var key = e.which;
	
	if (key == 112) {
		 e.preventDefault();
		 $('#x-dialog').window({
		 	width:750,
    		height:450,
    		title:'Customer Database',
		 }).window('open').window('center').window('refresh', 'customer.php?opt=window');
	}
	if (key == 113) {
		 e.preventDefault();
		 $('#x-dialog').window({
		 	width:850,
    		height:450,
    		title:'Barang Database',
		 }).window('open').window('center').window('refresh', 'barang.php?opt=window');
	}

	if (key == 119) {
		 e.preventDefault();
		//  $.messager.prompt('Prompt', 'Silahkan Masukkan Password Anda:', function(r){
		// 	if (r){
		// 		alert('Your name is:' + r);
		// 	}
		// });
		 $('#x-report').dialog({
		 	width:850,
    		height:500,
    		title:'LAPORAN TRANSAKSI',
    		modal:true
		 }).dialog('open').dialog('center').dialog('refresh', 'rep.php');
	}

	
});

function subTotal () {
	var ttl = $("#dg").datagrid('getChanges');
		var nilai = 0;
		for (var i = ttl.length - 1; i >= 0; i--) {
			nilai = nilai + ttl[i].subtotal
		};
	var	nilaiDiskon = ($('#sDiskon').numberbox('getValue') * nilai) / 100;


	
	$("#sSubTotal").numberbox('setValue', nilai);
	$("#hDiskon").numberbox('setValue', nilaiDiskon);
	$("#sTotal").numberbox('setValue', (nilai - nilaiDiskon));

}

function clearForm () {
	$('#iJml').numberbox('reset');
	$('#iP').numberbox('enable');
	$('#iL').numberbox('enable');
	$('#iP').numberbox('reset');
	$('#iL').numberbox('reset');
	$('#iKeterangan').val('');
	$('#iBarang').combogrid('clear');
}

$('#iJml').numberbox({
    min:0
});
$('#sDiskon').numberbox({
    min:0,
    max:100,
	suffix : ' %',
	onChange: function() {
		subTotal()
	}
});
$('#iP').numberbox({
    min:0,
    precision:2
});
$('#iL').numberbox({
    min:0,
    precision:2
});
$('#sSubTotal').numberbox({
    min:0,
    readonly:true,
	precision:2,
	groupSeparator:'.',
	decimalSeparator:','
});
$('#sBayar').numberbox({
    min:0,
	precision:2,
	groupSeparator:'.',
	decimalSeparator:',',
	onChange : function (news,old) {
		var jml = $("#sTotal").numberbox('getValue');
		$('#sKembali').numberbox('setValue', (news - jml));
	}
});
$('#sKembali').numberbox({
    readonly:true,
	precision:2,
	groupSeparator:'.',
	decimalSeparator:','
});
$('#sTotal').numberbox({
    min:0,
    readonly:true,
	precision:2,
	groupSeparator:'.',
	decimalSeparator:','
});
$('#hDiskon').numberbox({
    min:0,
    readonly:true,
	precision:2,
	groupSeparator:'.',
	decimalSeparator:','
});
$('#dg').datagrid({
	title:'Item Penjualan',
	fit:true,
	columns:[[
		{field:'barang_id',title:'Jml',width:100,hidden:true},
		{field:'jml',title:'Banyaknya',width:'15%'},
		{field:'uraian',title:'Uraian',width:'50%'},
		{field:'harga',title:'Harga',width:'15%'},
		{field:'subtotal',title:'Subtotal',width:'19%'}
	]],
	rownumbers : true,
	singleSelect:true,
	striped:true,
	onDblClickRow:function(index,row){
		$('#dg').datagrid('deleteRow',index);
		subTotal();
	}
});
$('#iBarang').combogrid({
    panelWidth:450,
    prompt:'Pilih Barang',
    idField:'id',
    textField:'nama',
    url:'barang.php?opt=get',
    columns:[[
        {field:'id',title:'ID',width:60},
        {field:'nama',title:'Nama',width:300},
        {field:'tipe',title:'Nama',width:300,hidden:true},
        {field:'harga',title:'Nama',width:300,hidden:true},
        {field:'satuan',title:'Nama',width:300,hidden:true}
    ]],
	onHidePanel :  function(){
		var g = $('#iBarang').combogrid('grid');	// get datagrid object
		var r = g.datagrid('getSelected');	// get the selected row
		
		if (r.tipe == "barang" || r.tipe == "desain" ) {
			$('#iP').numberbox('disable');
			$('#iL').numberbox('disable');
			$('#iP').numberbox('reset');
			$('#iL').numberbox('reset');
		} else {
			$('#iP').numberbox('enable');
			$('#iL').numberbox('enable');
			$('#iP').numberbox('reset');
			$('#iL').numberbox('reset');
		}
	},
	onShowPanel :  function(){
		
	}
});
$('#iCustomer').combogrid({
    panelWidth:650,
    prompt:'Pilih Customer',
    idField:'id',
    textField:'nama',
    selectOnNavigation:true,
    url:'customer.php?opt=get',
    columns:[[
        {field:'id',title:'ID',width:60},
        {field:'nama',title:'Nama',width:300},
        {field:'alamat',title:'Alamat',width:300},
        {field:'telp',title:'Telepon',width:300}
    ]]
});

$('#addBtn').linkbutton({
			    iconCls: 'icon-add',
			    onClick: function () {
			    	
			    	var brgId = $("#iBarang").combogrid('getValue');
			    	var jmlh = $("#iJml").numberbox('getValue');
			    	var urai = $("#iKeterangan").val();
			    	var pjg = $("#iP").numberbox('getValue');
			    	var lbr = $("#iL").numberbox('getValue');
			    	var dg = $("#iBarang").combogrid('grid').datagrid('getSelected');
			    	if(urai == '' || !brgId) {
			    		$.messager.show({
                                title:'Status',
                                msg:'data harap di isi',
                                timeout:5000,
                                showType:'slide'
                            });
			    		return;
			    	}
			    	if(pjg == '' || lbr == '' ) {
			    		ket = dg.nama + ' ' + urai;
			    		var hrg = (jmlh * dg.harga);
			    	} else {
			    		ket = dg.nama + ' ' + urai + ' P = ' + pjg + dg.satuan + ' L = ' + lbr + dg.satuan;
			    		var hrg = (jmlh * dg.harga * pjg * lbr);
			    	}

			    	$('#dg').datagrid('appendRow',{
			    		barang_id:brgId,
			    		jml:jmlh,
			    		uraian:ket,
			    		harga:dg.harga,
			    		subtotal:hrg
			    	});
			    	clearForm();
			    	subTotal();
			    }
			});
function suksesAdd() {
	$("#dg").datagrid('rejectChanges');
	$("#iCustomer").combogrid('reset');
	$("#sSubTotal").numberbox('reset');
	$("#sDiskon").numberbox('reset');
	$("#hDiskon").numberbox('reset');
	$("#sTotal").numberbox('reset');
	$("#sBayar").numberbox('reset');
}

$('#printBtn').linkbutton({
    iconCls: 'icon-save',
    onClick: function () {
    	var customer = $("#iCustomer").combogrid('getValue');
    	var kasir = $("#iKasir").val();
    	var tgl = $("#iTanggal").val();

    	var	subtotal = $("#sSubTotal").numberbox('getValue');
    	var	diskon = $("#sDiskon").numberbox('getValue');
    	var	Ndiskon = $("#hDiskon").numberbox('getValue');
    	var	total = $("#sTotal").numberbox('getValue');
    	var	bayar = $("#sBayar").numberbox('getValue');

    	var dt = JSON.stringify($("#dg").datagrid('getChanges'));

    	$.post('customer.php', {
    		opt: 'saveSales',
    		cust: customer,
    		ksr: kasir,
    		tg : tgl,
    		sttl : subtotal,
    		dskn : diskon,
    		ndskn : Ndiskon,
    		ttl : total,
    		byr : bayar,
    		dtl : dt
    	}, function(data) {
    		if(data != "gagal") {
    			suksesAdd();
    			$('#x-dialog').window({
				 	width:750,
		    		height:450,
		    		title:'Laporan',
				 }).window('open').window('center').window('refresh', 'laporan.php?id=' + data);
    		} else {
    			$.messager.show({
                        title:'Status',
                        msg: data,
                        timeout:5000,
                        showType:'slide'
                    });
	    		return;
    		}
    	});

    }
});

</script>
	</body>

</html>