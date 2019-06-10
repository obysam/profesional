<script type="text/javascript">
	var page  = <?= json_encode($page);?>;
	var model = {
	      Processing: ko.observable(false),
	      SelectedMenu: ko.observable(page.toString()),
	      status: ko.observableArray([]),
	      persentase: ko.observable(''),
	      ok: ko.observable(0)
	    };

	var template = {
	   	id_template : 0 
	  }

	 template    = ko.mapping.fromJS(template);
	


	ko.applyBindings(model);


	$('.sAktif').click(function(){
	   model.Processing(true);
	})

	model.persentase.subscribe(function(value){
	          if(value<30){
	            $('.persentase').addClass('abang');
	          }else if(value<60){
	            $('.persentase').addClass('oren');
	          }else if(value<90){
	            $('.persentase').addClass('hijau');
	          }else if(value>=90){
	            $('.persentase').addClass('biru');
	          }
	         })

	function setId(id){
		template.id_template(id);
	}

	$('#simpan').click(function(){
		param = ko.mapping.toJS(template);
	    url = "<?=base_url();?>user/updateTemplate";
	    if(param.id_template ==0){
			swal("","Anda belum memilih template",'error');
			return false;
		}
	
	    model.Processing(true);
	    $.post(url, param, function(result){
	      swal("Berhasil","Template Terupdate","success");
	  	  model.Processing(false);
		})
	})

	$(document).ready(function() {
	  status();
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