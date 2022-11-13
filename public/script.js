$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".session_messages").alert('close');
    }, 3000);
});

function base_url() {
	return $('#base_url').val();
}

function validate_purchase() {
	var url = base_url()+'/validate-purchase-form';

	$.ajax({
		type:'post',
		url:url,
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		data: $('.products_form').serialize(),
		beforeSend:function(){
			$('.help-block').text("");
		},
		success:function (data) {
			if($.isEmptyObject(data.errors)) {
				$('.products_form').submit();
			} else {
				var code = data.code;
				if(code == 401) {
					var errors = data.errors;
					$.each(errors, function(key, val) {
						$("."+key+"_error").text("*"+val[0]);
					});
				}
			}
		}
	});
}

