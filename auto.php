<?php 
	$host='localhost';
	$username='root';
	$password='';
	$database='autoexcel';
	mysql_connect($host,$username,$password);
	mysql_select_db($database);
	//Import uploaded file to Database, Letakan dibawah sini..
	$handle = fopen("C:\SERVER\htdocs\autoexcel\data.csv", "r"); //Membuka file dan membacanya

	if ($handle) {
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    $import="INSERT into tb_data (id,nama,alamat) values(NULL,'$data[0]','$data[1]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
		    mysql_query($import) or die(mysql_error()); //Melakukan Import
		}

		fclose($handle); //Menutup CSV file
		echo "<br><strong>Import data selesai.</strong>";
	} else {
	    die("Unable to open file");
	}
	

?>