<?php
	Class App_library 
	{
		public function get_kode($nama_tabel)
		{
			if($nama_tabel=="tb_user"):
				$kode = "USR".date("YmdHis");
			elseif($nama_tabel=="tb_costumer"):
				$kode = "CTR".date("YmdHis");
			elseif($nama_tabel=="tb_program"):
				$kode = "APK".date("YmdHis");
			endif;
			return $kode;
		}
	}
?>