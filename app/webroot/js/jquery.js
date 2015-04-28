$(document).ready(function(){
	var imageName;
	
	$('#login').click(function(){ 
			var user = $('#txtemail');
			var pass = $('#txtpassword');
			var UrlToPass = 'action=login&email='+user.val()+'&password='+pass.val();
			$.ajax({
				type : 'POST',
				data : UrlToPass,
				url  : 'action.php',
				success: function(result){
					console.log(result);
					var res = JSON.parse(result);
					ResetError();
					if(res.type == 'success'){
						window.location.href = "main_page.php";
					}else if(res.type == 'all'){
						$('.err_container').fadeIn().html('<div class="err_message"><h4>Please input a valid accoount</h4></div>');
					}else if(res.type == 'error'){
						$('.err_container').fadeIn().html('<div class="err_message"><h4>Invalid Account</h4></div>');
					}else if(res.type == 'email'){
						$('.error_email').fadeIn().html(res.message);
					}else if(res.type == 'password'){
						$('.error_pass').fadeIn().html('Please input password');
					}
				}
			});
			return false;
	});
	
	$('#register').click(function(){
		var user = $('#name');
		var email = $('#email');
		var pass = $('#password');
		var con_pass = $('#confirm_password');
		var UrlToPass = 'action=register&name='+user.val()+'&email='+email.val()+'&password='+pass.val()+'&con_password='+con_pass.val();
		ResetError();
		$.ajax({
			type : 'POST',
			data : UrlToPass,
			url  : 'action.php',
			success: function(result){
				console.log(result);
				var res = JSON.parse(result);
				
				if(res.type == 'success'){
					window.location.href = "thank_page.php";
				}
				for (var key in res) {
				  if (res.hasOwnProperty(key)) {
					if(res[key].type == 'all'){
						$('.err_container').fadeIn().html(res[key].message);
					}else if(res[key].type == 'name'){
						$('.error_name').fadeIn().html(res[key].message);
					}else if(res[key].type == 'error'){
						$('.err_container').fadeIn().html('<div class="err_message"><h4>Invalid Account</h4></div>');
					}else if(res[key].type== 'email'){
						$('.error_email').fadeIn().html(res[key].message);
					}else if(res[key].type == 'password'){
						$('.error_pass').fadeIn().html(res[key].message);
						$('.error_cpass').fadeIn().html(res[key].message);
					}
				  }
				}
				
			}
		});
		return false;
	});
	
	$('#update').click(function(){ 
		var id = $('#id');
		var tmpImage = $('#tmpImage');
		var img_prev = $('#img_preview');
		var user = $('#name');
		var birth = $('#birth');
		var gender = $('input:radio[name=gender]:checked');
		var hubby = $('#hubby');
		var file_data = $('#uploadFile').prop('files')[0]; 
		var form_data = new FormData();
		form_data.append('file', file_data);
		form_data.append('action', 'update');
		form_data.append('img', img_prev.attr('name'));
		form_data.append('name', user.val());
		form_data.append('birth', birth.val());
		form_data.append('gender', gender.val());
		form_data.append('hubby', hubby.val());
		form_data.append('tmpImage', tmpImage.attr('value'));
		$.ajax({
			url: 'action.php',
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,                         
			type: 'post',
			success: function(result){
				console.log(result);
				var res = JSON.parse(result);
				ResetError();
				if(res.type == 'success'){
					window.location.href = "user_profile.php?id="+id.val();
				}
				for (var key in res) {
				  if (res.hasOwnProperty(key)) {
					if(res[key].type == 'all'){
						$('.err_container').fadeIn().html(res[key].message);
					}else if(res[key].type == 'name'){
						$('.error_name').fadeIn().html(res[key].message);
					}else if(res[key].type == 'error'){
						$('.err_container').fadeIn().html('<div class="err_message"><h4>Invalid Account</h4></div>');
					}else if(res[key].type== 'image'){
						$('.error_img').fadeIn().html(res[key].message);
					}else if(res[key].type == 'birth'){
						$('.error_birth').fadeIn().html(res[key].message);
					}else if(res[key].type == 'gender'){
						$('.error_gender').fadeIn().html(res[key].message);
					}else if(res[key].type == 'hubby'){
						$('.error_hubby').fadeIn().html(res[key].message);
					}
				  }
				}
			}
		});
		return false;
	});
	
	$('#logout').click(function(){ 
		var UrlToPass = 'action=logout';
		$.ajax({
			type : 'POST',
			data : UrlToPass,
			url  : 'action.php',
			success: function(result){
				console.log(result);
				var res = JSON.parse(result);
				if(res.type == 'success'){
					window.location.href = "index.php";
				}
			}
		});
		return false;
	});
	
	$('#message_reply').click(function(){;	
		var to_id = $('#to_id');
		var from_id = $('#from_id');
		var message = $('#message_area');	
		var UrlToPass = 'action=replay&message='+message.val()+'&to_id='+to_id.val()+'&from_id='+from_id.val();
		$.ajax({
			type : 'POST',
			data : UrlToPass,
			url  : 'action.php',
			success: function(result){
				console.log(result);
				var res = JSON.parse(result);
				if(res.type == 'success'){
					$('.message_content').prepend(res.output);
					$('.display_output').fadeIn().html('Message Successfully send!');
					$('#message_area').val('');
					excerptEach();
				}else if(res.type == 'error'){
					$('.display_output').css('background','rgb(237, 60, 60)').fadeIn().html(res.message);
				}
			}
		});
		return false;
	});
	
	$('#sendMessage').click(function(){ 
		var user_id =$('#recipient_select');
		var content =$('#message');
		var UrlToPass = 'action=send&userId='+user_id.val()+'&content='+content.val();
		$.ajax({
			type : 'POST',
			data : UrlToPass,
			url  : 'action.php',
			success: function(result){
				console.log(result);
				var res = JSON.parse(result);
				if(res.type == 'success'){
					window.location.href = "message_page.php";
				}else if(res.type == 'error'){
					$('.error_recipient').html('Please add recipient.');
				}
			}
		});
		return false;
	});
	
	$('#submit_search').click(function(){ 
		var content =$('#content_search');
		var UrlToPass = 'action=search&content='+content.val();
		$.ajax({
			type : 'POST',
			data : UrlToPass,
			url  : 'action.php',
			success: function(result){
				console.log(result);
				var res = JSON.parse(result);
				$('.search_output').html('');
				for (var key in res) {
				  if (res.hasOwnProperty(key)) {
					if(res[key].type == 'success'){
						$('.search_output').append(res[key].output);
					}
				  }
				}

				if(res[0].type == 'error'){
					$('.search_output').append(res[0].message);
				}else{
					if(res[1].total > 1){
						$('#show_pagenate_search').show();
						$('#total').val(res[1].total);
					}
				}
				
				
			}
		});
		return false;
	});
	
	
	
	$(document).on('click', '.delete_single' , function() {
		var confrm = confirm("Are you sure want to delete?");
		if(confrm == true){
			var id = $(this).attr('id')
			var message_id =$(this).find('#date_created').val();
			var UrlToPass = 'action=delete_single&id='+id+'&message_id='+message_id;
			$.ajax({
				type : 'POST',
				data : UrlToPass,
				url  : 'action.php',
				success: function(result){
					console.log(result);
					var res = JSON.parse(result);
					if(res.type == 'success'){
						$('#box_id-'+message_id).fadeOut(300, function() { $(this).remove(); });
					}
				}
			});
			
			return false;
			
		}else{
			return false;
		}
	});
	
	
	$('.delete_group').click(function(){
		var confrm = confirm("Are you sure want to delete?");
		if(confrm == true){
			var id =$(this).attr('id');
			var to_id =$(this).find('#to_id').val();
			var from_id =$(this).find('#from_id').val();
			var UrlToPass = 'action=delete_group&to_id='+to_id+'&from_id='+from_id;
			$.ajax({
				type : 'POST',
				data : UrlToPass,
				url  : 'action.php',
				success: function(result){
					console.log(result);
					var res = JSON.parse(result);
					if(res.type == 'success'){
						$('#box_id-'+id).fadeOut(300, function() { $(this).remove(); });
					}
				}
			});
			
			return false;
		}else{
		
			return false;
		}
	});
	
	
	$("#uploadFile").on("change", function(){
        var files = !!this.files ? this.files : [];
		
        if (!files.length || !window.FileReader) return;
		
		
        if (/^image/.test( files[0].type)){ 
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
			imageName = files[0].name;
            reader.onloadend = function(){ 
                $("#img_preview").attr("src", this.result);
            }
        }
    });

	var data;
	
	$('.date').datepicker({
		 format: 'mm/dd/yyyy'
	});
	
	$("#birth").keypress(function(){
		return false;
	});
	
	$("#recipient_select").select2({
		placeholder: "Search for a recipient"
	});
	
	$("textarea").keyup(function(){
		$(".display_output").fadeOut();
    });
	
	$("#content_search").keyup(function(){
		$(".display_output").fadeOut();
    });
	
	var start=0;
	$("#show_pagenate").click(function(){
		var total = $('#total').val();
		var UrlToPass = 'action=paginate&num_page='+start;
		$.ajax({
			type : 'POST',
			data : UrlToPass,
			url  : 'action.php',
			success: function(result){
				console.log(result);
				var res = JSON.parse(result);
				start =start+1;
				$(".message_content").append(res);
				if(start==total-1){
					$('#show_pagenate').hide();
				}
			}
		});
		return false;
	});
	
	var start_pos=0;
	$("#show_pagenate_single").click(function(){
		var total = $('#total').val();
		var to_id = $('#to_id').val();
		var from_id = $('#from_id').val();
		var UrlToPass = 'action=paginate_single&num_page='+start_pos+'&to_id='+to_id+'&from_id='+from_id;
		$.ajax({
			type : 'POST',
			data : UrlToPass,
			url  : 'action.php',
			success: function(result){
				console.log(result);
				var res = JSON.parse(result);
				start_pos =start_pos+1;
				$(".message_content").append(res);
				if(start_pos==total-1){
					$('#show_pagenate_single').hide();
				}
			}
		});
		return false;
	});
	
	var start_pos=0;
	$("#show_pagenate_search").click(function(){
		var content =$('#content_search');
		var total = $('#total').val();
		var search_output = $('.search_output');
		var paginate_search = this;
		var UrlToPass = 'action=paginate_search&content='+content.val()+'&num_page='+start_pos;
		$.ajax({
			type : 'POST',
			data : UrlToPass,
			url  : 'action.php',
			success: function(result){
				console.log(result);
				var res = JSON.parse(result);
				start_pos =start_pos+1;
				for (var key in res) {
				  if (res.hasOwnProperty(key)) {
					if(res[key].type == 'success'){
						$(search_output).append(res[key].output);
					}
				  }
				}
				if(start_pos==total-1){
					$(paginate_search).hide();
				}
			}
		});
		return false;
	});
	
	$(document).on('click', '.read_more' , function() {
		var messageID = $('.read_more');
		var UrlToPass = 'action=read_more&message_id='+messageID.attr('value')+'&excerpt='+messageID.html();
		$.ajax({
			type : 'POST',
			data : UrlToPass,
			url  : 'action.php',
			success: function(result){
				console.log(result);
				var res = JSON.parse(result);

			}
		});
		return false;
	});
	
	function ResetError(){
	
		var element = [
					".error_name", 
					".error_email", 
					".error_birth",
					".error_img",
					".error_gender",
					".error_hubby",
					".error_cpass",
					".err_container",
					".error_recipient"
					];
					
		for(var x=0;x < element.length;x++){
			$(element[x]).html('');	
		}
	}
	
	// $(".detail .mess_p").shorten({
		// "showChars" : 150,
		// "moreText"  : "Read More",
		// "lessText": "<<"
	// });
	excerptEach();
	function excerptEach(){
		var x=0;
		$(".detail .mess_p").shorten({
		"showChars" : 150,
		"moreText"  : "Read More",
		"lessText": "<<"
		});
	}
	

});