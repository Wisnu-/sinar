<?php 
include "conf.php";
$opt = isset($_GET["opt"]) ? $_GET["opt"] : "";

if ($opt == "get") {

	$q = "select * from barang";
	
	$q1 = $db->query($q);
	
	echo json_encode($q1->fetchAll());
}

if ($opt == "delete") {

	$id = isset($_GET["id"]) ? $_GET["id"] : 0;
	
	if ($id > 0) {
		$q = "delete from barang where id={$id}";
	}
	
	$q1 = $db->query($q);
	
	echo 'sukses';
}
if ($opt == "simpan") {

	$id = isset($_GET["id"]) ? $_GET["id"] : 0;
	$nama = isset($_GET["nama"]) ? $_GET["nama"] : '';
	$harga = isset($_GET["harga"]) ? $_GET["harga"] : '';
	$tipe = isset($_GET["tipe"]) ? $_GET["tipe"] : '';
	$satuan = isset($_GET["satuan"]) ? $_GET["satuan"] : '';

	if ($id < 1) {
		$q = "insert into barang values('',
				'{$nama}',
				'{$tipe}',
				{$harga},
				'{$satuan}'
			)";
	} else {
		$q = "UPDATE barang SET 
				nama='$nama',
				tipe='$tipe',
				harga=$harga,
				satuan='$satuan'
				WHERE id=$id";
	}
	// die($q);
	$db->query($q);
	
	echo "SUKSES";
}

if ($opt == "window") {
?>
        <div class="easyui-layout" data-options="fit:true">
            <div data-options="region:'east',split:true" style="width:300px;padding:10px">
                <div class="one-1000"> 
                	<div class="onerow">
                		<div class="col4">Nama</div>
                		<div class="col8 last"><input id="cNama" style="width:100%"></input></div>
                	</div> 
					<div class="onerow sp">
					</div>
                	<div class="onerow">
                		<div class="col4">Tipe</div>
                		<div class="col8 last">
                			<select id="cTipe" class="easyui-combobox" name="cTipe" style="width:100%">
						        <option value="banner">Banner</option>
						        <option value="film">Film</option>
						        <option value="desain">Desain</option>
						        <option value="barang">Barang</option>
						    </select>
                		</div>
						<input type="hidden" id="cId"></input>
                	</div>
					<div class="onerow sp">
					</div>
                	<div class="onerow">
                		<div class="col4">Satuan</div>
                		<div class="col8 last"><input id="cSatuan" style="width:100%"></input></div>
                	</div>
					<div class="onerow sp">
					</div>
                	<div class="onerow">
                		<div class="col4">Harga</div>
                		<div class="col8 last"><input id="cHarga" style="width:100%"></input></div>
                	</div>
					<div class="onerow sp">
					</div>
                	<div class="onerow">
                		<div class="col4"><a id="delBtn" href="#"> Hapus</a></div>
                		<div class="col4 last"><a id="saveBtn" href="#"> Simpan</a></div>
                	</div>
                </div>
            </div>
            <div data-options="region:'center'">
            	<table id="cg"></table>
            </div>
        </div>
        <script type="text/javascript">
        	function clearForm () {
        		$('#cNama').textbox('setValue', '');
        		$('#cNama').textbox('setText', '');
	        	$('#cSatuan').textbox('setValue', '');
	        	$('#cSatuan').textbox('setText', '');
	        	$('#cHarga').numberbox('setValue', 0);
	        	$('#cHarga').numberbox('setText', 0);
	        	$("#cId").val(0);
        	}
        	$('#cg').datagrid({
        		fit:true,
				url:'barang.php?opt=get',
			    columns:[[
			        {field:'id',title:'ID',width:60,hidden:true},
			        {field:'nama',title:'Nama',width:200},
			        {field:'tipe',title:'Tipe',width:50},
			        {field:'satuan',title:'Satuan',width:50},
			        {field:'harga',title:'Harga',width:100}
			    ]],
				rownumbers : true,
				singleSelect:true,
				striped:true,
				onClickRow: function(index,row){
					if (row) {
						$('#cNama').textbox('setValue', row.nama);
			        	$('#cTipe').combobox('setValue', row.tipe);
			        	$('#cSatuan').textbox('setValue', row.satuan);
			        	$('#cHarga').numberbox('setValue', row.harga);
			        	$("#cId").val(row.id);
					}
				}
        	});

        	$('#cNama').textbox({});
        	$('#cTipe').combobox({});
        	$('#cSatuan').textbox({});
        	$('#cHarga').numberbox({});


        	$('#saveBtn').linkbutton({
			    iconCls: 'icon-save',
			    onClick: function () {
			    	var n = $('#cNama').textbox('getValue');
		        	var t = $('#cTipe').combobox('getValue');
		        	var s = $('#cSatuan').textbox('getValue');
		        	var h = $('#cHarga').numberbox('getValue');
		        	var i = $("#cId").val();

		        	$.get( "barang.php", { 
		        		id: i, 
		        		tipe: t,
		        		nama:n,
		        		harga:h,
		        		satuan:s,
		        		opt:'simpan' 
		        	}).done(function( data ) {
					   $('#cg').datagrid('reload');
					   // $('#iBarang').combogrid('url','barang.php?opt=get');
					   $("#iBarang").combogrid('grid').datagrid('reload');
					});
				   	clearForm();
			    }
			});
        	$('#delBtn').linkbutton({
			    iconCls: 'icon-delete',
			    onClick: function () {
		        	var i = $("#cId").val();

		        	$.get( "barang.php", { 
		        		id: i, 
		        		opt:'delete' 
		        	}).done(function( data ) {
					   $('#cg').datagrid('reload');
					   $('#iBarang').combogrid('url','barang.php?opt=get');
					});
					  clearForm();
			    }
			});

        </script>
<?php
}