/* $(function(){
	$("#mainCategory").change(function(){
		var categoryID = $(this).val();
		urlpath = baseurl+"index.php/category/createCategory/"+categoryID;
		window.location.href=urlpath;
	});
}); */

$(function(){
	$("#mainCat").change(function(){
		var categoryID = $(this).val();		
		
		urlpath = baseurl+"index.php/gifts/createProduct/"+categoryID;
		window.location.href=urlpath;		
	});
});

$(function(){
	$("#vencat").change(function(){
		var categoryID = $(this).val();		
		
		urlpath = baseurl+"index.php/product/createProduct/"+categoryID;
		window.location.href=urlpath;		
	});
});

$(function(){
	$("#subcatId").change(function(){
		var categoryID = $('#mainCat').val();
		var subcategoryID = $(this).val();
		urlpath = baseurl+"index.php/gifts/createProduct/"+categoryID+"/"+subcategoryID;
		//alert(urlpath)
		window.location.href=urlpath;
	});
});
 
$(function(){
	$("#tejaBhanu").change(function(){		
		var productid = $('#productid').val();
		var categoryID = $(this).val();
		//alert(productid);
		//alert(categoryID);
		urlpath = baseurl+"index.php/gifts/editProduct/"+productid+"/"+categoryID;
		window.location.href=urlpath;
	});
});

$(function(){
	$("#subcatId1").change(function(){
		var productid = $('#productid').val();
		var categoryID = $('#tejaBhanu').val();
		var subcategoryID = $(this).val();
		urlpath = baseurl+"index.php/gifts/editProduct/"+productid+"/"+categoryID+"/"+subcategoryID;
		//alert(urlpath)
		window.location.href=urlpath;
	});
});

$(function(){
	$("#mainCat2").change(function(){

		var categoryID = $(this).val();
		urlpath = baseurl+"index.php/featured/createFeatured/"+categoryID;
		window.location.href=urlpath;
	});
});

$(function(){
	$("#subcatId2").change(function(){

		var categoryID = $('#mainCat2').val();
		var subcategoryID = $(this).val();
		urlpath = baseurl+"index.php/featured/createFeatured/"+categoryID+"/"+subcategoryID;
		//alert(urlpath)
		window.location.href=urlpath;
	});
});

$(function(){
	$("#subcatId12").change(function(){

		var categoryID = $('#mainCat2').val();
		var subcategoryID = $('#subcatId2').val();
		var childcategoryID = $(this).val();
		urlpath = baseurl+"index.php/featured/createFeatured/"+categoryID+"/"+subcategoryID+"/"+childcategoryID;
		//alert(urlpath)
		window.location.href=urlpath;
	});
});

$(function(){
	$("#mainCat3").change(function(){

		var categoryID = $(this).val();
		urlpath = baseurl+"index.php/sellers/createsellers/"+categoryID;
		window.location.href=urlpath;
	});
});

$(function(){
	$("#subcatId3").change(function(){

		var categoryID = $('#mainCat3').val();
		var subcategoryID = $(this).val();
		urlpath = baseurl+"index.php/sellers/createsellers/"+categoryID+"/"+subcategoryID;
		//alert(urlpath)
		window.location.href=urlpath;
	});
});

$(function(){
	$("#subcatIdb").change(function(){

		var categoryID = $('#mainCat3').val();
		var subcategoryID = $('#subcatId3').val();
		var childcategoryID = $(this).val();
		urlpath = baseurl+"index.php/sellers/createsellers/"+categoryID+"/"+subcategoryID+"/"+childcategoryID;
		//alert(urlpath)
		window.location.href=urlpath;
	});
});

function bhanuFun(Oval)
{	
	var mainCategory = $("#mainCategory").val();
	
	var productTitle = $("#productTitle").val();
	var skuCode = $("#skuCode").val();
	var productOriginalPrice = $("#productOriginalPrice").val();
	var productQuantity = $("#productQuantity").val();

	
	if(mainCategory !='' && productTitle !='' && skuCode !='' && productOriginalPrice !='' && productQuantity !='' )
	{
		var bhanu = confirm('Do you Want Really Proceed To Next Step?');
		if (bhanu == true)
		{
			$('.bhanu1').removeClass('active');
			$('.bhanu2').addClass('active');
			
		}		
	}
	else
	{		
		$("#clickit_2[data-toggle='tab'").prop('disabled', true);
		$("#clickit_2[data-toggle='tab'").each(function () {
			$(this).prop('data-href', $(this).attr('href')); // hold you original href
			//$(this).attr('href', '#'); // clear href
		});                
		$("#clickit_2[data-toggle='tab'").addClass('disabled-link');
		
		alert('Please Fill The All Required Fields to continue');
	}
	
}

function bhanuFun1(Oval)
{

	if ($(".bhanuRadio").filter(":checked").length < 1)
	{
	alert("Please select Cover image to continue");
		return false;
	}
	else
	{
		var bhanu = confirm('Do you Want Really Proceed To Next Step?');
		if (bhanu == true)
		{
			$("#clickit_3[data-toggle='tab'").prop('disabled', false);
			$("#clickit_3[data-toggle='tab'").each(function () {
				//$(this).attr('href', $(this).prop('data-href')); // restore original href
			});
			$("#clickit_3[data-toggle='tab'").removeClass('disabled-link');
			
			$('.bhanu2').removeClass('active');
			$('.bhanu3').addClass('active');
			
			$("#"+Oval).click();
				
				   $("html, body").animate({
					   scrollTop: 0
				   }, 600);
				   return false;
			   
		}
		else
		{		
			$("#clickit_3[data-toggle='tab'").prop('disabled', true);
			$("#clickit_3[data-toggle='tab'").each(function () {
				$(this).prop('data-href', $(this).attr('href')); // hold you original href
				//$(this).attr('href', '#'); // clear href
			});                
			$("#clickit_3[data-toggle='tab'").addClass('disabled-link');
			
			alert('Please Fill The All Required Fields to continue');
		}
		return true;
	}
	
	
}

function bhanuFun2(Oval)
{
	//alert(Oval);
	var mainImage = $("#mainImage").val();	
	
	if(mainImage !='')
	{
		var bhanu = confirm('Do you Want Really Proceed To Next Step?');
		if (bhanu == true)
		{
			$("#clickit_4[data-toggle='tab'").prop('disabled', false);
			$("#clickit_4[data-toggle='tab'").each(function () {
				//$(this).attr('href', $(this).prop('data-href')); // restore original href
			});
			$("#clickit_4[data-toggle='tab'").removeClass('disabled-link');
			$('.bhanu3').removeClass('active');
			$('.bhanu4').addClass('active');
			
			$("#"+Oval).click();
		}		
	}
	else
	{		
		$("#clickit_4[data-toggle='tab'").prop('disabled', true);
		$("#clickit_4[data-toggle='tab'").each(function () {
			$(this).prop('data-href', $(this).attr('href')); // hold you original href
			//$(this).attr('href', '#'); // clear href
		});                
		$("#clickit_4[data-toggle='tab'").addClass('disabled-link');
		
		alert('Please Fill The All Required Fields to continue');
	}
	
}

/*function proTitle()
{
	//alert('hai');
  var value=$("#productTitle").val();
  
  if(!$.isNumeric(value))
  {
    $("#productTitle").val("");
   
    
  }
  else{
   
  }
}*/

/*function proTitlealt()
{
  var mobile=$("#productAlias").val();
  
  if(!$.isNumeric(mobile))
  {
    $("#productAlias").val("");
    $("#productAlias").css({"border":"1px solid #ff0000"});
    $("#productAlias").attr("placeholder","Mobile Number should be 10 digit number only")
  }
  else{
    if(mobile.length < 10)
    {
      $("#productAlias").css({"border":"1px solid #ff0000"});
      $("#productAlias").val("");
      $("#productAlias").attr("placeholder","Mobile Number should be 10 digit number")
    }
    else if(mobile.length > 10)
    {
      $("#productAlias").css({"border":"1px solid #ff0000"});
      $("#productAlias").val("");
      $("#productAlias").attr("placeholder","Mobile Number should be 10 digit number")
    }
    else
    {
      $("#productAlias").css({"border":"1px solid #999"});
    }
  }
}*/

function prevFun(oVal)
{
	alert(oVal);
	$("#"+oVal).click();
}
