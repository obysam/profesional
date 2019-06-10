 <script type="text/javascript" defer="defer">
  var page = <?= json_encode($page);?>;
  var model = {
      Processing: ko.observable(false),
      SelectedMenu: ko.observable(page.toString()),
      nomor:ko.observable(0),
      status: ko.observableArray([]),
      persentase: ko.observable(''),
      ok: ko.observable(0)
    };
  model.Processing(true);   

 var Pendidikan = {
      id_pendidikan : '',
      sekolah       : '',
      lokasi        : '',
      tingkatan     : '',
      thn_lulus     : '', 
      thn_masuk     : '',
      checkOutP     : false,
      id_bidang_pendidikan : '',
      detail        : '',
      skala         : '',
      nilai         : '',
      data_bidang   : []
  }

  function resetPendidikan(){
      model.Pendidikan().id_pendidikan('');
      model.Pendidikan().sekolah('');
      model.Pendidikan().lokasi('');
      model.Pendidikan().tingkatan('');
      model.Pendidikan().thn_lulus('');
      model.Pendidikan().thn_masuk('');
      model.Pendidikan().checkOutP('');
      model.Pendidikan().id_bidang_pendidikan('');
      model.Pendidikan().detail('');
      model.Pendidikan().skala('');
      model.Pendidikan().nilai('');
  }



function handlerPendidikan(data){
  console.log(data,'ok')
    model.Pendidikan().data_bidang('');   
    var array = {'id_bidang_pendidikan': 0, 'bidang_pendidikan': '--Silahkan Pilih--'};
    data.unshift(array);
    var temp = [];
    var lainnya;
    _.each(data, function(v,i){
        temp.push(v)
     })
    model.Pendidikan().data_bidang(temp);   
  }

  $('#simpan-Pendidikan').click(function(){
    param = ko.mapping.toJS(model.Pendidikan());
    url = "<?=base_url();?>user/updatePendidikan";
      model.Processing(true);
      if(model.Pendidikan().skala()<model.Pendidikan().nilai()){
         swal("Error", "Skala nilai tidak boleh melebihi Nilai", "error");
           model.Processing(false);
            return false;
      }
      if(!model.Pendidikan().checkOutP()){
             if(model.Pendidikan().thn_lulus()<model.Pendidikan().thn_masuk()){
               swal("Error", "Tahun Pendidikan anda tidak valid", "error");
                 model.Processing(false);
                  return false;
              }
        }
    $.post(url, param, function(result){
         var res = jQuery.parseJSON(result);
        if(res.code=='1'){
            swal("Sukses",res.msg, "success")
              $('#tabel-Pendidikan').load('<?=base_url();?>user/tabelPendidikan');
              $('.tabel-Pendidikan').show();
              $('.form-Pendidikan').hide();   
              resetPendidikan();
            model.Processing(false);
        }else{
          swal("Error", "Data Lokasi Belum benar", "error");
           model.Processing(false);
        }
    });
    
  })

   $('#thn_masuk').datepicker( {
        changeMonth: false,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        yearRange: "-60:+0",
        onClose: function(dateText, inst) { 
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, 1));
            model.Pendidikan().thn_masuk(year);
            //$('.ui-datepicker-current').addCss('style':'none');
        }
    });
  $( "#thn_lulus" ).datepicker({
       changeMonth: false,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        yearRange: "-60:+0",
        onClose: function(dateText, inst) { 
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, 1));
            model.Pendidikan().thn_lulus(year);

        }
    });

 Pendidikan = ko.mapping.fromJS(Pendidikan);
 model.Pendidikan = ko.observable(Pendidikan)
 ko.applyBindings(model);


$('.PendidikanBaru').click(function(){
  $('.form-Pendidikan').show();
  $('.tabel-Pendidikan').hide();
  model.Pendidikan().tingkatan('SMK');
})

$('.cancelPendidikan').click(function(){
  $('.tabel-Pendidikan').show();
   $('.form-Pendidikan').hide();
  
})


$('.sAktif').click(function(){
   model.Processing(true);
})

var shuffle = function (str) {
    return str.split('').sort(function () {
        return 0.5 - Math.random();
    }).join('');
};

 Pendidikan.checkOutP.subscribe(function(newVal) {
    if(newVal == true){
      $("#thn_lulus").prop("disabled", true);
      model.Pendidikan().thn_lulus('');
    }else{
      $("#thn_lulus").prop("disabled", false);
      model.Pendidikan().thn_lulus('');
    }
  })

  Pendidikan.tingkatan.subscribe(function(val){
     model.Processing(true);  
       var tingkatan = val;
       var url = "<?=base_url();?>user/getBidangPendidikan/";
       if(tingkatan != '0'){
       $.post(url, {tingkatan:tingkatan}, function(result){
        var newData = jQuery.parseJSON(result); 
        handlerPendidikan(newData);
         model.Processing(false);  
        })
     }
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
  $('.form-Pendidikan').hide();
 // $('#id_bidang_pendidikan').select2({    width: 'element',});
 

  status();
    model.Processing(true);
    url = "<?=base_url();?>user/getRegencies";

   
   var options = {
      url: url,
      getValue:"name",
      list: {
        match: {
          enabled: true
        }
      },
       requestDelay: 300
    };
  $("#lokasi").easyAutocomplete(options);  
  setTimeout(function(){ $('#id_bidang_pendidikan').select2();},5000);
  $('#tabel-Pendidikan').load('<?=base_url();?>user/tabelPendidikan');
  model.Processing(false);
  });

</script>