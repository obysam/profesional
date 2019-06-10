<script type="text/javascript" defer="defer">
  var page  = <?= json_encode($page);?>;
  var model = {
        Processing: ko.observable(false),
        SelectedMenu: ko.observable(page.toString()),
        bidangPekerjaan: ko.observable(),
        status: ko.observableArray([]),
        persentase: ko.observable(''),
        ok: ko.observable(0)
      };

  var informasi = {
       bidangUtama : '',
       tingkatPengalaman : 0,
       objektif : '',
       gaji : '',
       showGaji : false,
       showPublik : true,
       preferensiLokasi1: '',
       preferensiLokasi2: '',
       preferensiLokasi3: '',
    }

    function getBidang(){
      var param = {};
      var url = "<?=base_url();?>base/getBidangPekerjaanAll";

      $.post(url,param, function(result){
        var data = jQuery.parseJSON(result);
         model.bidangPekerjaan(data);  
      })
    }

  $('#simpan-informasi').click(function(){
    if(model.informasi().objektif()==''){
      swal("Error", "Objektif belum terisi", "error");
      return false;
    }
    if(model.informasi().preferensiLokasi1()==''){
      swal("Error", "Preferensi Lokasi Minimal Satu", "error");
      return false;
    }
    if(model.informasi().bidangUtama()==''){
      swal("Error", "Bidang Utama pekerjaan belum terisi", "error");
      return false;
    }
    if(model.informasi().tingkatPengalaman()==0){
      swal("Error", "Tingkat pengalaman belum terpilih", "error");
      return false;
    }
    param = ko.mapping.toJS(model.informasi());
    url = "<?=base_url();?>user/updateInformasi";
    console.log(param)
    model.Processing(true);
    $.post(url, param, function(result){
    if(result=='lokasi'){
      swal("Error", "Data Lokasi Belum Valid", "Error")
    }else{
      swal("Berhasil","Data Sukses Terupdate","success");
    }
    model.Processing(false);
    
      });
  })

 informasi    = ko.mapping.fromJS(informasi);
 model.informasi = ko.observable(informasi);

 ko.applyBindings(model);


$('.sAktif').click(function(){
   model.Processing(true);
})

function getUserData(){
  url = '<?=base_url();?>user/getUserData';
  $.post(url,{},function(data){
    var res = jQuery.parseJSON(data);
    var gaji = false;
    if(res[0].showGaji==1){
      gaji = true;
    }
    var publik = false;
     if(res[0].showPublik==1){
      publik = true;
    }
    var lok2 = '';
    if(res[0].preferensiLokasi2!=0){
        lok2 = res[0].preferensiLokasi2;
    }

    var lok3 = '';
    if(res[0].preferensiLokasi3!=0){
        lok3 = res[0].preferensiLokasi3;
    }
       model.informasi().bidangUtama(res[0].bidangUtama)
       model.informasi().tingkatPengalaman(res[0].tingkatPengalaman)
       model.informasi().objektif(res[0].objektif)
       model.informasi().gaji(res[0].gaji)
       model.informasi().showGaji(gaji)
       model.informasi().showPublik(publik)
       model.informasi().preferensiLokasi1(res[0].preferensiLokasi1)
       model.informasi().preferensiLokasi2(lok2)
       model.informasi().preferensiLokasi3(lok3)
  })
}

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

  getUserData();
  getBidang();
  status();

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
   $("#preferensiLokasi1").easyAutocomplete(options);  
   $("#preferensiLokasi2").easyAutocomplete(options);  
   $("#preferensiLokasi3").easyAutocomplete(options);  
  });

</script>