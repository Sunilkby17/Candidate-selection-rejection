$(function(){
	//when user clicks submit button with id register then post request is sent to process.php
	$('#register').click(function(){
		$('h2').css('color','white');
		$('footer').css('backgroundColor','#172337');
		$('h2').html('Give me a moment');
		$.post("process.php",
		{
			submit: true,
			uname: $('#uname').val(), email: $("#email").val(), phone: $("#phone").val(), dob: $("#dob").val(), gender: $("#gender").val()
		},
		function(data,status){
			if(data==1&&status){
				$('h2').html("Successfully registered");
				$('footer').css('backgroundColor','green');
			}
			else if(data==0&&status){
				$('h2').html("email already exists!!");
				$('footer').css('backgroundColor','red');
			}
			else if(data==-2&&status){
				$('h2').html("You'll receive mail shortly");
				$('footer').css('backgroundColor','orange');
			}
			else{ 
				$('h2').html("We are facing some problem. Please try later!!");
				$('footer').css('backgroundColor','orange');
			}
		});
	});

	//when select or reject is clicked then post request is sent to process.php page
	$('.select, .reject').click(function(){
		var obj = $(this);
		var s = $(this).val();
		$(this).val('processing');
		$.post("../process.php",
		  {
		    email: $(this).attr('name'),
		    status: s,
		    uname: $(this).attr('uname'),
		    change_status: true
		  },
		  function(data, status){
		    obj.val(data);
		  });
	});
});