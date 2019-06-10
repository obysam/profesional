<script type="text/javascript" defer="defer">
	var page  = <?= json_encode($page);?>;
	var model = {
	      Processing: ko.observable(false),
	      SelectedMenu: ko.observable(page.toString()),
	      status: ko.observableArray([]),
	      persentase: ko.observable(''),
        ok: ko.observable(0)

	    };

	var Biodata = {
	     nama : '',
	     domisili : '',
	     tempat_lahir : '',
	     tanggal_lahir : '',
	     jenisKelamin : 'pria',
	     statusPernikahan : 'married',
	     
	  }

	$('#simpan-biodata').click(function(){
/*	  var levelArray = $('.customx').map( function() {
	    return $(this).html();
	}).get();
	  //var id = '4';
	  var url = "<?//=base_url();?>user/insertBP";
	   $.post(url, {bidang_pendidikan:levelArray}, function(result){
	   	swal('Berhasil',"Data tersimpan","success");
	    $('.temp').load('<?//=base_url();?>user/getLastSpesialisasi/');
	    $('#simpan-biodata').hide();
	  })*/
     model.Processing(true);
      if($('#foto').prop('files')[0] != undefined){
      var file_data = $('#foto').prop('files')[0];
      var form_data = new FormData();

            form_data.append('file', file_data);
            $.ajax({
                url: "<?=base_url();?>user/updateFoto", // point to server-side PHP script
                dataType: 'json',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(data,status){
                    //alert(php_script_response); // display response from the PHP script, if any
                      if(data.status=="error"){
                        if(data.msg="<p>The uploaded file exceeds the maximum allowed size in your PHP configuration file.</p>"){
                          swal("error","Maksimal Ukuruan Foto 2 MB","error")
                             model.Processing(false);
                          return false;
                        }else{
                          swal("error",data.msg,"error");
                             model.Processing(false);
                          return false;

                        }
                        
                      }else if(data.status=="success"){
                          simpanData();
                      }
                }
            });
      }else{
        simpanData();
      }
	})

  function simpanData(){
    param = ko.mapping.toJS(model.Biodata());
    url = "<?=base_url();?>user/updateUser";
   
    $.post(url, param, function(result){
      if(result!=true){
          swal("error",result+' belum valid',"error")
           model.Processing(false);
          return false;
        }else if(result==true || result==1){
          swal('Berhasil',"Data tersimpan","success");
          getUserData();
           model.Processing(false);
          return false;
      }

    model.Processing(false);
    
      });
  }

	function getUserData(){
  url = '<?=base_url();?>user/getUserData';
  $.post(url,{},function(data){

    var res = jQuery.parseJSON(data);
      if(res[0].nama){
     	    model.Biodata().nama(res[0].nama);
     	    model.Biodata().domisili(res[0].domisili);
     	    model.Biodata().tempat_lahir(res[0].tempat_lahir);
     	    model.Biodata().tanggal_lahir(res[0].tanggal_lahir);
     	    model.Biodata().jenisKelamin(res[0].jenisKelamin);
	        model.Biodata().statusPernikahan(res[0].statusPernikahan);
          if(res[0].foto.length>0){
            $('.foto').html($('<img>',{id:'userFoto',src:'<?=base_url();?>assets/img/upload/'+res[0].foto, height:'190px', width:'100%'}))
          }else{
            $('.foto').html($('<img>',{id:'userFoto',src:'<?=base_url();?>assets/img/default-avatar.png', height:'190px',width:'100%'}))
          }
          $('#userFoto').css( "border-radius", "8px" )
      }
  })
}



  
var currentYear = new Date().getFullYear();
var minYear = currentYear -17;
$( "#tanggal_lahir" ).datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: new Date(1960, 10 - 1, 25),
      maxDate: '+50Y',
      yearRange: "1960:"+minYear 
    });
 Biodata    = ko.mapping.fromJS(Biodata);
 model.Biodata = ko.observable(Biodata);


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

$(document).ready(function() {
   url = "<?=base_url();?>user/getRegencies";
   var options = {
      url: url,
      getValue:"name",
      list: {
        match: {
          enabled: true
        }
      }
    };
   $("#domisili").easyAutocomplete(options);  
   $("#tempat_lahir").easyAutocomplete(options);  
   getUserData()
  status();

    $('.temp').load('<?=base_url();?>user/getLastSpesialisasi/');
  });

</script>