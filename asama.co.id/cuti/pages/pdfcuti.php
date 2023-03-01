<!DOCTYPE html>
<?php 
ob_start();
?>
<page>
		<style type="text/css">
		table#barang{
			border: 2px solid darkgrey;
		}
		th{
			border-bottom: 2px solid darkgrey;
		}
		td.table-td{
			border-bottom: 2px solid darkgrey;
			border-right: 0.5px solid darkgrey;
		}
		</style>
		<h1 align="center"> </h1>
		<table border="0" align="center" style="font-size: 16px; border-collapse: collapse; width: 100%;">
			<tr><td style="font-size: 30px; width: 90%;" align="center;"><b>PT. ASAMA INDONESIA MANUFACTURING</b></td></tr>
			<tr><td style="font-size: 18px; width: 90%;" align="center;"><b>Foundry Casting and Machining of Cast Iron Product</b></td></tr>
			<tr><td style="font-size: 14px; width: 92%;" align="center;">JL. Mitra Selatan II, Mitra Karawang Industrial Estate, Karawang, West Java, Indonesia</td></tr>
			<tr><td style="font-size: 14px; width: 92%; padding:2; border-top:1;" align="center;">NPWP : 66.809.200.0-446.000 | Tlp : 086294778777</td></tr>
		</table>
		<hr>
		<h3 align="center">SURAT KETERANGAN CUTI</h3>
        <?php
		$sql1 = mysql_query("SELECT a.nama, a.no_tlp, a.jkelamin, b.nama AS cabang_id FROM pegawai a, departemen b WHERE a.id='$_GET[pgid] AND a.cabang_id=b.id'");
		$ro = mysql_fetch_array($sql1);
		?>
		
		<p style="font-size: 14px;"><b>PT. Asama Indonesia Mfg memberikan izin kepada :</b></p>
		<table border="0" style="font-size: 16px; border-collapse: collapse; width: 100%;">
			<tr><td>Nama </td><td>&nbsp; : &nbsp;</td><td><?php echo $ro['nama']; ?></td></tr>
			<tr><td>Kantor </td><td>&nbsp; : &nbsp;</td><td><?php echo $ro['cabang_id']; ?></td></tr>
			<tr><td>Jenis Kelamin </td><td>&nbsp; : &nbsp;</td><td><?php echo $ro['jkelamin']; ?></td></tr>
			<tr><td>Telepon </td><td>&nbsp; : &nbsp;</td><td><?php echo $ro['no_tlp']; ?></td></tr>
		</table>
		
		<?php
		$sql2 = mysql_query("SELECT * FROM cuti WHERE kode='$_GET[kdct]'");
		while ($row = mysql_fetch_array($sql2)) {
		?>
		<p style="font-size: 14px;">Terhitung sejak tanggal <?php echo date ('d-m-Y', strtotime ($row['tanggal1'])); ?> sampai dengan tanggal <?php echo date ('d-m-Y', strtotime ($row['batascuti'])); ?>.</p>
		<br />
        <p style="font-size: 14px;">Demikian Surat Cuti ini diberikan untuk dilaksanakan dengan penuh tanggung jawab.</p>
		<?php
		}
        ?>
		<table border="0" align="right" style="font-size: 16px; border-collapse: collapse; width: 100%;">
			<tr><td style="width: 100%; padding: 2;" align="right;">Karawang, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
			<tr><td style="width: 100%; padding: 2;" align="right;">&nbsp;<br/>&nbsp;<br/>&nbsp;</td></tr>
			<tr><td style="width: 100%; padding: 2;" align="right;">&nbsp;<br/>&nbsp;<br/>&nbsp;</td></tr>
			<tr><td style="width: 100%; padding: 2;" align="right;">(_____________________)</td></tr>
		</table>
</page>
<?php
    $content = ob_get_clean();

// conversion HTML => PDF
 require_once(dirname(__FILE__).'../../asset/html2pdf/html2pdf.class.php');
 try
 {
 $html2pdf = new HTML2PDF('P','A4', 'fr', false, 'ISO-8859-15');
 $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
 ob_end_clean();
 $html2pdf->Output('suratcuti.pdf');
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>
</html>