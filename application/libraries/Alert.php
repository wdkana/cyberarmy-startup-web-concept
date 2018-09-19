<?php 

class  Alert  {	
	
	function render($type="success",$message=null,$title=null,$showCancel=false)
	{ 
?>
		<script src="<?php echo base_url();?>assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/sweet-alert/sweetalert2.min.js" ></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/sweet-alert/sweetalert2.css">
		<script type="text/javascript">
			$(function(){
				swal({
				  title: '<?php echo $title;?>',
				  text: "<?php echo $message;?>",
				  type: '<?php echo $type;?>',
				  showCancelButton: '<?php echo $showCancel;?>',
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Ya',
				  cancelButtonText: 'Tidak',
				  confirmButtonClass: 'btn btn-success',
				  cancelButtonClass: 'btn btn-danger',
				  buttonsStyling: true
				});

			});
		</script>

	<?php }
}?>