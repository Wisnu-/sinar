<?php 
include "conf.php";
$url = strtok($_SERVER["REQUEST_URI"],'?');
$opt = isset($_REQUEST["opt"]) ? $_REQUEST["opt"] : "";

if ($opt == "get") {

    $q = "select * from customer";
    
    $q1 = $db->query($q);
    
    echo json_encode($q1->fetchAll());
}

if ($opt == "saveSales") {

    $cust = $_REQUEST["cust"];
    $ksr = $_REQUEST["ksr"];
    $tg = ganti($_REQUEST["tg"]);
    $sttl = $_REQUEST["sttl"];
    $dskn = $_REQUEST["dskn"];
    $ndskn = $_REQUEST["ndskn"];
    $ttl = $_REQUEST["ttl"];
    $byr = $_REQUEST["byr"];
    $dtl = json_decode($_REQUEST["dtl"]);


   $querySales = "INSERT INTO `sales` 
        (`customer_id`, `tanggal`, `kasir`, `subtotal`, `diskon`, `Ndiskon`, `total`, `bayar`) 
    VALUES ('$cust', '$tg', '$ksr', '$sttl', '$dskn', '$ndskn', '$ttl', '$byr')";

    $db->query($querySales);

    $id = $db->lastInsertId();

    $qDetil = "INSERT INTO `detil` (`order_id`, `barang_id`, `jml`, `uraian`, `harga`, `total`) VALUES ";
    
    $last_item = end($dtl);
    foreach ($dtl as $v) {
        if ($v == $last_item) {
            $qDetil .= "('$id', '{$v->barang_id}', '{$v->jml}', '{$v->uraian}', '{$v->harga}', '{$v->subtotal}')";
        } else {
            $qDetil .= "('$id', '{$v->barang_id}', '{$v->jml}', '{$v->uraian}', '{$v->harga}', '{$v->subtotal}'),";
        }
    }
    try {
        $db->query($qDetil);

        echo $id;
    } catch (Exception $e) {
        $db->query("delete from sales where id=$id");

       echo "gagal";
    }
}

if ($opt == "add") {

    $nama = $_REQUEST['nama'];
    $telepon = $_REQUEST['telepon'];
    $alamat = $_REQUEST['alamat'];
    // $id = $_REQUEST['id'];
    $q = "insert into customer VALUES ('', '$nama','$telepon', '$alamat')";
    try {
       
       $q1 = $db->query($q);

       echo "SUKSES INPUT DATA :: $nama";
    } catch (Exception $e) {
        echo "GAGAL";
    }
    
    // echo json_encode($q1->fetchAll());
}

if ($opt == "edit") {

    $nama = $_REQUEST['nama'];
    $telepon = $_REQUEST['telepon'];
    $alamat = $_REQUEST['alamat'];
    $id = $_REQUEST['id'];
	$q = "UPDATE customer SET nama = '$nama', telp='$telepon', alamat='$alamat' WHERE id=$id";
	try {
       
	   $q1 = $db->query($q);

       echo "SUKSES INPUT DATA :: $nama";
    } catch (Exception $e) {
        echo "GAGAL";
    }
	
	// echo json_encode($q1->fetchAll());
}

if ($opt == "window") {
?>
        <div class="easyui-layout" data-options="fit:true">
            <div data-options="region:'east',split:true" style="width:300px;padding:10px">
                <div class="one-1000"> 
                	<div class="onerow">
                		<div class="col4">Nama</div>
                		<div class="col8 last"><input id="cNama"></input></div>
                	</div> 
					<div class="onerow sp">
					</div>
                	<div class="onerow">
                		<div class="col4">Alamat</div>
                		<div class="col8 last"><input id="cAlamat"></input></div>
						<input type="hidden" id="cId"></input>
                	</div>
					<div class="onerow sp">
					</div>
                	<div class="onerow">
                		<div class="col4">Telepon</div>
                		<div class="col8 last"><input id="cTelepon"></input></div>
                	</div>
					<div class="onerow sp">
					</div>
                	<div class="onerow">
                        <div class="col6">&nbsp;</div>
                		<div class="col6 last"><a id="saveBtn"> Simpan</a></div>
                	</div>
                </div>
            </div>
            <div data-options="region:'center'">
            	<table id="cg"></table>
            </div>
        </div>
        <script type="text/javascript">
        	$('#cg').datagrid({
        		fit:true,
				url:'customer.php?opt=get',
			    columns:[[
			        {field:'id',title:'ID',width:60,hidden:true},
			        {field:'nama',title:'Nama',width:200},
			        {field:'alamat',title:'Alamat',width:200},
			        {field:'telp',title:'Telepon',width:100}
			    ]],
				rownumbers : true,
				singleSelect:true,
				striped:true,
				onClickRow: function(index,row){
					if (row) {
						$('#cNama').textbox('setValue', row.nama);
			        	$('#cAlamat').textbox('setValue', row.alamat);
			        	$('#cTelepon').textbox('setValue', row.telp);
			        	$("#cId").val(row.id);
					}
				}
        	});

        	$('#cNama').textbox({});
        	$('#cAlamat').textbox({});
        	$('#cTelepon').textbox({});

        	$('#saveBtn').linkbutton({
                iconCls: 'icon-save'
            });

            $('#saveBtn').bind('click', function() {
                var row = $("#cg").datagrid('getSelected');
                var nm = $("#cNama").textbox('getValue');
                var al = $("#cAlamat").textbox('getValue');
                var tlp = $("#cTelepon").textbox('getValue');

                if(nm == '') {
                    $.messager.show({
                        title:'Status',
                        msg:'harap kolom nama di isi',
                        timeout:5000,
                        showType:'slide'
                    });
                    return;
                }

                if(row) {
                    $.post('<?php echo $url; ?>', 
                        {
                            nama: nm,
                            alamat: al,
                            telepon: tlp,
                            id: row.id,
                            opt: 'edit'
                        }, function(data) {
                            $.messager.show({
                                title:'Status',
                                msg:data,
                                timeout:5000,
                                showType:'slide'
                            });
                            $("#cg").datagrid('reload');
                            $("#iCustomer").combogrid('grid').datagrid('reload');
                    });
                } else {
                    $.post('<?php echo $url; ?>', 
                        {
                            nama: nm,
                            alamat: al,
                            telepon: tlp,
                            opt: 'add'
                        }, function(data) {
                            $.messager.show({
                                title:'Status',
                                msg:data,
                                timeout:5000,
                                showType:'slide'
                            });

                            $("#cg").datagrid('reload');
                            $("#iCustomer").combogrid('grid').datagrid('reload');
                            // $("#iCustomer").combogrid('reload');
                    });
                }
            });




        </script>
<?php
}