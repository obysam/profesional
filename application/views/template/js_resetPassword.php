<script type="text/javascript">
  var model = {
      Processing: ko.observable(false),
    };
  model.Processing(true);   
 var Reset = {
     password : ko.observable(''),
     cpassword : ko.observable(''),
 }

  function Reset(){
      model.Reset().password();
      model.Reset().cpassword();
  }


 Reset = ko.mapping.fromJS(Reset);
 model.Reset = ko.observable(Reset)




 Reset = ko.mapping.fromJS(Reset);
 model.Reset = ko.observable(Reset)
 ko.applyBindings(model);


$(document).ready(function() {
  model.Processing(false);
	})

$('.sAktif').click(function(){
  model.Processing(true);
})

$('.simpan').click(function(){
  param = ko.mapping.toJS(model.Reset());
  if(model.Reset().password() != model.Reset().cpassword()){
    swal('error','konfirmasi password tidak sama','error');
  }
  if(model.Reset().password().length < 8){
    swal('error','Minimal 8 Karakter','error');
  }
  url = "<?=base_url();?>user/updatePassword";
  $.post(url,param,function(res){
     var newData = jQuery.parseJSON(res); 
     if(newData.code == 1000){
        swal("Success",newData.msg,"success");
        window.location = "<?=base_url();?>user/resetPassword";
     }else{
      swal('error',newData.msg,'error');
     }
  })
})

</script>