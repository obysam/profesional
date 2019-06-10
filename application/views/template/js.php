<script type="text/javascript" defer="defer">
 var page = <?= json_encode($page);?>;
 var model = {
      Processing: ko.observable(false),
      SelectedMenu: ko.observable(page.toString()),
    };

if(model.SelectedMenu()=='profile'){
  var Biodata = {
     nama : '',
     domisili : '',
     tempat_lahir : '',
     tanggal_lahir : ''
  }



function resetBiodata(){
   model.Biodata().nama('');
   model.Biodata().domisili('');
   model.Biodata().tempat_lahir('');
   model.Biodata().tanggal_lahir('');
}

$('#simpan-biodata').click(function(){
  var levelArray = $('.customx').map( function() {
    return $(this).html();
}).get();
  //var id = '4';
//  var url = "<?=//base_url();?>user/insertBP";

  $('.temp').load('<?=base_url();?>user/getLastSpesialisasi/');
 /*  $.post(url, {bidang_pendidikan:levelArray}, function(result){
    console.log(result)
  })*/
/*  param = ko.mapping.toJS(model.Biodata());
  url = "<?//=base_url();?>user/updateUser";
  model.Processing(true);
  $.post(url, param, function(result){
  mode.Processing(false);
  
    });*/
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

$( "#tanggal_gabung" ).datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: new Date(1960, 10 - 1, 25),
      maxDate: '+50Y',
      yearRange: "1960:"+currentYear 
    });

$( "#tanggal_keluar" ).datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: new Date(1960, 10 - 1, 25),
      maxDate: '+50Y',
      yearRange: "1960:"+currentYear 
    });

 $('#thn_masuk').datepicker( {
        changeMonth: false,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        onClose: function(dateText, inst) { 
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, 1));
            model.Pendidikan().thn_masuk(year);
        }
    });
$( "#thn_lulus" ).datepicker({
       changeMonth: false,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        onClose: function(dateText, inst) { 
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, 1));
            model.Pendidikan().thn_lulus(year);

        }
    });


if(model.SelectedMenu()=='pengalaman'){
  Pengalaman = ko.mapping.fromJS(Pengalaman);
  model.Pengalaman = ko.observable(Pengalaman);

}else if(model.SelectedMenu()=='profile'){
  Biodata    = ko.mapping.fromJS(Biodata);
  model.Biodata = ko.observable(Biodata);

}else if(model.SelectedMenu()=='pendidikan'){
  Pendidikan = ko.mapping.fromJS(Pendidikan);
  model.Pendidikan = ko.observable(Pendidikan)
}




ko.applyBindings(model);

if(model.SelectedMenu()=='pengalaman'){
Pengalaman.checkOut.subscribe(function(newVal) {
    if(newVal == true){
      $("#tanggal_keluar").prop("disabled", true);
      model.Pengalaman().tanggal_keluar('');
    }else{
      $("#tanggal_keluar").prop("disabled", false);
      model.Pengalaman().tanggal_keluar('');
    }
  })
}


$('.sAktif').click(function(){
   model.Processing(true);
})

$('.pengalamanBaru').click(function(){
  $('.form-pengalaman').show();
  $('.tabel-pengalaman').hide();
})

$('.cancelPengalaman').click(function(){
  $('.tabel-pengalaman').show();
   $('.form-pengalaman').hide();
  
})


$(document).ready(function() {
  $('.form-pengalaman').hide();
    $('.temp').load('<?=base_url();?>user/getLastSpesialisasi/');
    
if(model.SelectedMenu()=='pengalaman'){
  $('#tabel-pengalaman').load('<?=base_url();?>user/tabelPengalaman');
}else if(model.SelectedMenu()=='pendidikan'){
  $('#tabel-pendidikan').load('<?=base_url();?>user/tabelPendidikan');
}  
  });
</script>