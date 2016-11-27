<?php
/**
 * [$server Below are configuration for local server by XAMPP]
 * @var String [<$server>] as servername
 * @var [String] [<$username>] as username for server
 * @var [String] [<$password>] as password for server
 * @var [String] [<$database>] as database name for servel
 */
$server = "localhost";
$username = "root";
$password = "";
$database = "db_surat";
/*
	Build connection by using sql command 
	mysql_connect 
	if{connection==1}
		run connection
	else
		Failed
	mysql_select_db
	if(database==1)
		run database
	else
		Database is not found
 */
mysql_connect($server,$username,$password) or die ("Failed");

mysql_select_db($database) or die ("Database is not found");
	/**
	 * [rupiah for change format of currency]
	 * @param  [integer] $angka [return format of currency]
	 * @return [integer]        [return $angka ]
	 */
	function rupiah($angka){
           $jadi="Rp.".number_format($angka,0,',','.');
           return $jadi;
	}
	/**
	 * [tgl_indo for returning form of date in date month and year]
	 * @param  [String] $tgl [return form of time ]
	 * @return [String]      [return variable $tanggal $bulan and $tahun]
	 */
	function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	
	/**
	 * [getBulan make conditional of month in a year by switch]
	 * @param  [String] $bln [return name of month in a year]
	 * @return [String]      [return name of month]
	 */
	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Jan";
						break;
					case 2:
						return "Feb";
						break;
					case 3:
						return "Mar";
						break;
					case 4:
						return "Apr";
						break;
					case 5:
						return "May";
						break;
					case 6:
						return "Jun";
						break;
					case 7:
						return "Jul";
						break;
					case 8:
						return "Aug";
						break;
					case 9:
						return "Sep";
						break;
					case 10:
						return "Oct";
						break;
					case 11:
						return "Nov";
						break;
					case 12:
						return "Dec";
						break;
				}
			} 
?>