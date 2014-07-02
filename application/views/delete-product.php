<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>

<div class="product-id" style="display:none;"><?php echo $product_data['id']; ?></div>
<div class="product-name" style="display:none;"><?php echo $product_data['name']; ?></div>
<div class="user-name" style="display:none;"><?php echo $user_data['name']; ?></div>
<div class="email" style="display:none;"><?php echo $user_data['email']; ?></div>


<script type="text/javascript">
	var product_id = $(".product-id").text();
	var product_name = $(".product-name").text();
	var user_name = $(".user-name").text();
	var email = $(".email").text();

	if(confirm("Do you Want to deactivate Product ("+product_name+")"))
	{
		$.ajax({
				url: "<?php echo base_url();?>index.php/addproduct/deactivate_product",
				type: 'POST',
				data: {product_id:product_id,email:email,user_name:user_name},
				success: function(result){
					window.close();
				}
			});
	}
	else
	{
		// pathArray = window.location.href.split( '/' );
		// protocol = pathArray[0];
		// host = pathArray[2];
		// url = protocol + '://' + host;
		// window.location = url;
		window.close();
	}
</script>