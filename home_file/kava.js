// Start of Tawk.to Script-->

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cff6ab1267b2e578531c988/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

//End of Tawk.to Script-->


$(function(){
	$('#news_form').submit(function(){
		if($('#news_email').val() == '')
		{
			$('#err_newslatter').show();
			$('#err_newslatter').html('Please Add Email Id');
			return false;
		}
		else{
			$('#err_newslatter').hide();
			return true;
		}
	});
})





