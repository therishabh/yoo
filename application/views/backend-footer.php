
			</div>
		</div>
	</div>

	<!-- // end main body for content -->

</body>
</html>

<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>

<script type="text/javascript">


	$(".main-body").on('click', '.checkbox', function() {
		
		if( $(this).is(":checked") )
		{
			$(this).next('.checkbox-img').css({
				background: 'url(<?php echo base_url();?>images/blue.png) no-repeat -47px 0px'
			});
		}
		else
		{
			$(this).next('.checkbox-img').css({
				background: 'url(<?php echo base_url();?>images/blue.png) no-repeat -23px 0px'
			});
		}
	});

	$(".main-body").on('click', '.radio', function() {
		
		if( $(this).is(":checked") )
		{
			var name = $(this).attr('name');
			
			$('.radio').each(function(){

				if( $(this).attr('name') == name )
				{
					$(this).next(".radio-img").css({
						background: 'url(<?php echo base_url();?>images/blue.png) no-repeat -143px 0px'
					});
				}

			});

			$(this).next('.radio-img').css({
				background: 'url(<?php echo base_url();?>images/blue.png) no-repeat -167px 0px'
			});
		}
		else
		{
			$(this).next('.radio-img').css({
				background: 'url(../images/blue.png) no-repeat -143px 0px'
			});
		}
	});

	if( $('.checkbox').is(":checked") )
	{
		$(".checkbox:checked").next('.checkbox-img').css({
			background: 'url(<?php echo base_url();?>images/blue.png) no-repeat -47px 0px'
		});
	}

	if( $('.radio').is(":checked") )
	{
		$(".radio:checked").next('.radio-img').css({
			background: 'url(<?php echo base_url();?>images/blue.png) no-repeat -167px 0px'
		});
	}

</script>