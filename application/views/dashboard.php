<!-- heading -->
<div class="row heading">
	<div class="col-lg-6">
		Dashboard
	</div>
</div>

<?php 
if($number_of_campaign)
{
?>

<!-- // end heading -->
		<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column',
                margin: [ 50, 50,150, 80],
                zoomType: 'x'
            },
            title: {
                text: 'Campaign Complete Chart'
            },
            xAxis: {
                min: 0,
                maxZoom:15,
                title: {
                    enabled: true,
                    text: 'Campaigns'
                },
                categories: [
<?php
foreach($campaign_detail as $campaign)
{
	echo "'".$campaign['name']."',";
}
?>
                ],
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                max: 100,
                title: {
                    text: 'Complete ( % Percent )'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Complete: '+ Highcharts.numberFormat(this.y)+"%";
                }
            },
            series: [{
                name: 'Campaign',
                data: [
<?php
foreach($campaign_detail as $campaign)
{
	//count complete status..
	$complete_percent = ($campaign['complete_amount'] / $campaign['amount']) * 100;
	$complete_percent = floor($complete_percent);
	if($complete_percent > 100)
	{
		$complete_percent = 100;
	}
	echo "".$complete_percent.",";
}
?>
                ],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    });
    

		</script>

<div class="row">
	<div class="col-lg-12 col-centered">
		<div id="container" style="min-width: 400px; height: 500px; margin: 0 auto"></div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>js/yoo.js"></script>
<?php 
}
else
{
?>
	<div class="row">
		<div class="col-lg-12 col-centered error-msg-display">
			There is no any Campaign into Database <a href="<?php echo base_url() ?>/managecampaign">Click Here</a> for Add Campaign
		</div>
	</div>
<?php
}
?>


<div class="row" style="margin-top:20px">
	<div class="col-lg-6">
		<div class="recent-campaign">
			
		</div>
	</div>
	<div class="col-lg-6">
		<div class="recent-campaign">
			
		</div>
	</div>
</div>