 <script type="text/javascript" defer="defer">
  var page = <?= json_encode($page);?>;
  var statusP = <?= json_encode($TP[0]['statusPengalaman']);?>;


  var temp = false;
  if(statusP==0){
    //ga ada pengalaman
    temp = true;
  }
  var model = {
      Processing: ko.observable(false),
      SelectedMenu: ko.observable(page.toString()),
      status: ko.observableArray([]),
      persentase: ko.observable(''),
      ok: ko.observable(0),
      pengalamanBaru : ko.observable(false),
      statusPengalaman : ko.observable(temp),
    };
  var Pengalaman = {
      id_pengalaman   : '',
      perusahaan      : '',
      posisi          : '',
      lokasi          : '',
      id_spesialisasi : '0',
      id_bidang_pekerjaan: '0',
      data_bidang     :[],
      tingkatan_posisi: '',
      id_industri     : '',
      tanggal_gabung  : '',
      tanggal_keluar  : '',
      detail          : '',
      gaji            : '',
      kurs            : '',
      showGaji        : '',
      checkOut        : false,
      bidangBaru      : ''
  }

  function handlerPengalaman(data){
    var array = {'id_spesialisasi': 0, 'id_bidang_pekerjaan2':0, 'nama_bidang': '--Silahkan Pilih--'};
    data.unshift(array);
    var temp = [];
    var lainnya;
    _.each(data, function(v,i){
      if(v.nama_bidang=="lainnya"||v.nama_bidang=="Lainnya"){
        lainnya = v;
      }else{
        temp.push(v)
      }
    })
    temp.push(lainnya);
    model.Pengalaman().data_bidang(temp);   
  }

function ganti() {
    var id_spesialisasi = model.Pengalaman().id_spesialisasi;
     var url = "<?=base_url();?>user/getBidangPekerjaan/";
     if(id_spesialisasi != '0'){
  //   model.Pengalaman().id_bidang_pekerjaan('0')
     $.post(url, {id_spesialisasi:id_spesialisasi}, function(result){
      var newData = jQuery.parseJSON(result); 
      handlerPengalaman(newData);
      })
   }
}

$('#simpan-pengalaman').click(function(){
    model.Pengalaman().tanggal_gabung($('#tanggal_gabung').val());
    
    if(model.Pengalaman().checkOut()!=true){
        model.Pengalaman().tanggal_keluar($('#tanggal_keluar').val());
    }else{
        model.Pengalaman().tanggal_keluar();
    }
    if(model.Pengalaman().id_spesialisasi() == null || model.Pengalaman().id_bidang_pekerjaan() == null || model.Pengalaman().  id_industri() == null || model.Pengalaman().id_spesialisasi() == 0 || model.Pengalaman().id_bidang_pekerjaan() == 0 || model.Pengalaman().id_industri() == 0){
        swal("Error", "Data Pengalaman Belum Lengkap", "error");  
        return;
    } 
    if(model.pengalamanBaru()){
      if(model.Pengalaman().bidangBaru() == '' || model.Pengalaman().bidangBaru() == false){
           swal("Error", "Pengalaman Baru belum di isi", "error");  
           return;
      }
    }
    param = ko.mapping.toJS(model.Pengalaman());
    url = "<?=base_url();?>user/updatePengalaman";
    model.Processing(true);
    $.post(url, param, function(result){
      if(result=='lokasi'){
        swal("Error", "Data Lokasi Belum Valid", "error");
      }else if(result=='tahun'){
        swal("Error", "Data Tahun Keluar Tidak Valid", "error");
      }else{

    swal("Sukses", "Data telah tersimpan", "success")
        $('.tabel-pengalaman').show();
        $('#tabel-pengalaman').load('<?=base_url();?>user/tabelPengalaman');
       $('.form-pengalaman').hide();    
        resetPengalaman();
          }
        });

    model.Processing(false);
  })

function resetPengalaman(){
    model.Pengalaman().id_pengalaman('');
    model.Pengalaman().perusahaan('');
    model.Pengalaman().posisi('');
    model.Pengalaman().lokasi('');
    model.Pengalaman().id_spesialisasi('');
    model.Pengalaman().id_bidang_pekerjaan(0);
    model.Pengalaman().data_bidang('');
    model.Pengalaman().tingkatan_posisi('');
    model.Pengalaman().id_industri('');
    model.Pengalaman().tanggal_gabung('');
    model.Pengalaman().tanggal_keluar('');
    model.Pengalaman().gaji('');
    model.Pengalaman().detail('');
    model.Pengalaman().checkOut('');
    model.Pengalaman().bidangBaru('');
    $('#tanggal_keluar').val('');
    $('#tanggal_gabung').val('');
}
var currentYear = new Date().getFullYear();
var minYear = currentYear -17;

$( "#tanggal_gabung" ).datepicker({
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true,
      minDate: new Date(1960, 10 - 1, 25),
      maxDate: '+50Y',
      yearRange: "-70:",
       dateFormat:"MM yy",
      onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            if($('#tanggal_gabung').val().length >0){
            $("#tanggal_keluar").prop("disabled", false);
            $('#tanggal_keluar').val('');
            $("#tanggal_keluar").datepicker({
              changeMonth: true,
              changeYear: true,
              showButtonPanel: true,
              minDate: new Date($('#tanggal_gabung').val()),
              maxDate: '+50Y',
              yearRange: "1960:"+currentYear,
              dateFormat:"MM yy",
              onClose: function(dateText2, inst2) { 
                    $(this).datepicker('setDate', new Date(inst2.selectedYear, inst2.selectedMonth, 1));
                }
             
            });
          }else{
             $('#tanggal_keluar').val('')
             $("#tanggal_keluar").prop("disabled", true);
          }
        }
     
    });



  Pengalaman = ko.mapping.fromJS(Pengalaman);
  model.Pengalaman = ko.observable(Pengalaman);
  ko.applyBindings(model);


 Pengalaman.checkOut.subscribe(function(newVal) {
  if($('#tanggal_gabung').val().length==0){
    swal('Warning',"Isi terlebih dahulu tanggal masuk","error");
    Pengalaman.checkOut(false);
    return false;
  }else{
    if(newVal == true){
      $("#tanggal_keluar").prop("disabled", true);
      $('#tanggal_keluar').val('')
      model.Pengalaman().tanggal_keluar('');
    }else{
      $("#tanggal_keluar").prop("disabled", false);
      model.Pengalaman().tanggal_keluar('');
       $("#tanggal_keluar").datepicker({
              changeMonth: true,
              changeYear: true,
              showButtonPanel: true,
              minDate: new Date($('#tanggal_gabung').val()),
              maxDate: '+50Y',
              yearRange: "1960:"+currentYear,
               dateFormat:"MM yy",
              onClose: function(dateText, inst) { 
                    $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                }
             
            });
    }
  }
  })

function cekDate(){
  if($('#tanggal_gabung').val().length >0){
     $("#tanggal_keluar").prop("disabled", false);
    $("#tanggal_keluar").datepicker({
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true,
      minDate: new Date($('#tanggal_gabung').val()),
      maxDate: '+50Y',
      yearRange: "1960:"+currentYear,
       dateFormat:"MM yy",
      onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
     
    });
  }else{
     $('#tanggal_keluar').val('')
     $("#tanggal_keluar").prop("disabled", true);
  }
  
}


  model.statusPengalaman.subscribe(function(newVal) {
        var url = "<?=base_url();?>user/updateStatusPengalaman";
        var statusPengalaman;
        if(newVal==true){
          statusPengalaman=0;
         $('#tabel-pengalaman').hide();

        }else{
          statusPengalaman=1;
         $('#tabel-pengalaman').load('<?=base_url();?>user/tabelPengalaman');
        }
        var param = {statusPengalaman:statusPengalaman};
        $.post(url,param,function(data){
          console.log(data)
           swal("success", "Status Pengalaman Anda Telah TerUpdate", "success");  
           return;
        }) 
  })


  Pengalaman.id_bidang_pekerjaan.subscribe(function(newVal) {
    if(model.Pengalaman().id_pengalaman()==""&& newVal!="ga"){
        var temp = _.filter(model.Pengalaman().data_bidang(), function(x){ return x.id_bidang_pekerjaan2 == newVal});
        if(temp[0].nama_bidang == "lainnya" || temp[0].nama_bidang == "Lainnya" || temp[0].nama_bidang == "Lainnya"){
            model.pengalamanBaru(true);
        }else{
            model.pengalamanBaru(false);
            model.Pengalaman().bidangBaru('');
        }
  }
  })

$('.sAktif').click(function(){
   model.Processing(true);
})

$('.pengalamanBaru').click(function(){
  $('.form-pengalaman').show();
  $('.tabel-pengalaman').hide();
  $('.form-pengalaman').css('visibility','visible')
})

$('#cancelPengalaman').click(function(){
            swal({
                      title: "Yakin Cancel",
                      text: "Yang telah di isi di form ini akan hilang",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Ya!",
                      cancelButtonText: "Tidak",
                      closeOnConfirm: true,
                      closeOnCancel: true
                      },
                      function(isConfirm){
                        if (isConfirm) {
                          $('.form-pengalaman').css('visibility','hidden')
                          $('.tabel-pengalaman').show();
                           $('.form-pengalaman').hide();
                           resetPengalaman();
                      }
                      }) 

  
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
  //$('.selectFilter').select2();
  $('#spesialisasi').select2();
  $("#industri").select2();
  $('#tingkatan_posisi').select2();
  status();
  $('#tanggal_keluar').val('')
  $("#tanggal_keluar").prop("disabled", true);
  
  url = "<?=base_url();?>user/getRegencies";

   
   var options = {
      url: url,
      getValue:"name",
      list: {
        match: {
          enabled: true
        }
      },
      requestDelay: 400
    };

   $("#lokasi").easyAutocomplete(options);
   if(!model.statusPengalaman()){
     $('#tabel-pengalaman').load('<?=base_url();?>user/tabelPengalaman');
  }
  });
</script>