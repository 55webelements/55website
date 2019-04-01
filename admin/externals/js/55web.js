
$(function(){
	$(".orderShip").click(function(){
		var orderid = $(this).attr("id");
		$.ajax({
			type:"POST",
			url:baseurl+"index.php/orders/delhiveryApi/"+orderid,
			dataType: "text",
			async:false,
			success:function(resp)
			{
				  var json = $.parseJSON(resp);
				  var upload_wbn = json.upload_wbn;
				  var waybill = json.packages[0].waybill;
				  var refnum = json.packages[0].refnum;
				  if(waybill != '')
				  {
					$.ajax({
						type:"POST",
						url:baseurl+"index.php/orders/storeOrderDelhiveryItems/"+orderid+"/"+upload_wbn+"/"+waybill+"/"+refnum,
						async:false,
						success:function(resp)
						{
							window.location.href=baseurl+"index.php/orders/index/3";			
						}
					});
				  }
			}
		});
	});
});
function storeOrderResponse(orderid,upload_wbn,waybill,refnum)
{
	
}