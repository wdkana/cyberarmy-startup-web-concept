<?php 

class  Toash{	
	function render($type="success",$message=null)
	{ 
?>
		<script src="<?php echo base_url();?>assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/toash/bootoast.css">
		<script type="text/javascript" src="<?php echo base_url();?>assets/toash/bootoast.min.js" ></script>
        <script type="text/javascript">
			$(function(){
                bootoast.toast({
                message: '<?php echo $message;?>',
                type: '<?php echo $type;?>'
                });
			});
		</script>

	<?php }
}?>