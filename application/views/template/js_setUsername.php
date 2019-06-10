<script type="text/javascript">
	var page  = <?= json_encode($page);?>;
	var model = {
	      Processing: ko.observable(false),
	      SelectedMenu: ko.observable(page.toString()),
	    };

	var template = {
	   	id_template : 0,
	   	nama:'',
	  }

	 template    = ko.mapping.fromJS(template);
	 model.template = ko.observable(template)
	 ko.applyBindings(model);


	$('.sAktif').click(function(){
	   model.Processing(true);
	})


	function setId(id){
		template.id_template(id);
		$('.aman2').show();
	}

	$('#simpan').click(function(){
		if(template.nama().length <8){
			swal('Error', "minimal karakter username ialah 8","warning");
			return false;
		}

		param = ko.mapping.toJS(template);
	    url = "<?=base_url();?>user/updateUsername";
	    if(param.id_template ==0){
			swal("","Anda belum memilih template",'error');
			return false;
		}
	
	    model.Processing(true);
	    $.post(url, param, function(result){
	    	var res = jQuery.parseJSON(result);
	    	if(res.code != 1000){
	      		swal("Error",res.msg,"warning");
	     	}else if(res.code == 1000){
	    		 swal("Berhasil",res.msg,"success");
	  		}
	  	  model.Processing(false);
		  window.location = "<?=base_url();?>user/profile";
		})
	})

	$('.check').click(function(){
		if(template.nama().length <8){
			swal('Error', "minimal karakter username ialah 8","warning");
			return false;
		}
		if(/^[a-zA-Z0-9- ]*$/.test(template.nama()) == false) {
			swal('Error', "Username Menggunakan Angka dan Huruf","warning");
		    return false
		}
		var conf = model.template().nama().split(' ' ).join('');
		$('#username').val(conf);
		model.template().nama(conf);
		model.Processing(true)
		var url = '<?=base_url();?>user/cekUsername';
		$.post(url,{username:template.nama()}, function(data){
    		 var res = jQuery.parseJSON(data);
    		 if(res.code=='1000'){
	  				$('.aman').show();  
	  				$('.template').fadeIn();
	  				 $("#username").prop("disabled", true);
	  				 $('.check').hide();
	  				 $('.ganti').show();
    		 }else{
	  				$('.gaaman').show();
	  				$('.aman2').hide();
	  				$('.template').hide();

				swal('Error', "Username tidak tersedia","warning");
    		 }
    	model.Processing(false);
		})
	})

	$('.ganti').click(function(){
		$('.gaaman').hide();
	  	$('.aman2').hide();
	  	$('.template').hide();
	  	$('.aman').hide();
	  	$('.ganti').hide();
	  	$('.check').show();
	  	 $("#username").prop("disabled", false);


	})

	$(document).ready(function() {
	  $('.aman').hide();
	  $('.gaaman').hide();
	  $('.template').hide();
	  $('.aman2').hide();
	  $('.ganti').hide();
	  });

$(function () {
    $('.btn-radio').click(function(e) {
        $('.btn-radio').not(this).removeClass('active')
    		.siblings('input').prop('checked',false)
            .siblings('.img-radio').css('opacity','0.5')
            .siblings('attr')
    	$(this).addClass('active')
            .siblings('input').prop('checked',true)
    		.siblings('.img-radio').css('opacity','1');
    });
});
</script>