<script type="text/javascript" defer="defer">
  var page  = <?= json_encode($page);?>;
  var model = {
        Processing: ko.observable(false),
        SelectedMenu: ko.observable(page.toString()),
        status: ko.observableArray([]),
        persentase: ko.observable(''),
        ok: ko.observable(0)
      };

  var sosmed = {
       facebook: '',
       twitter: '',
       instagram: '',
       linkedin: ''
    }

  $('#simpan-sosmed').click(function(){
    if(model.sosmed().facebook() != ""){
      if(model.sosmed().facebook().indexOf('http://') == -1 && model.sosmed().facebook().indexOf('https://') == -1){
        swal('Error',"URL Facebook wajib menggunakan http://","error");
        return false;
      }
      if(model.sosmed().facebook().indexOf('facebook.com') == -1){
          swal('Error',"Sepertinya URL akun Facebook anda tidak valid","error");
          return false;
        }
    }

    if(model.sosmed().twitter() != ""){
        if(model.sosmed().twitter().indexOf('http://') == -1 && model.sosmed().twitter().indexOf('https://') == -1){
          swal('Error',"URL twitter wajib menggunakan http://","error");
          return false;
        }
        if(model.sosmed().twitter().indexOf('twitter.com') == -1){
          swal('Error',"Sepertinya URL akun twitter anda tidak valid","error");
          return false;
        }
    }

    if(model.sosmed().instagram() != ""){
        if(model.sosmed().instagram().indexOf('http://') == -1 && model.sosmed().instagram().indexOf('https://') == -1){
          swal('Error',"URL instagram wajib menggunakan http://","error");
          return false;
        }
        if(model.sosmed().instagram().indexOf('instagram.com') == -1){
          swal('Error',"Sepertinya URL akun instagram anda tidak valid","error");
          return false;
        }
    }

    if(model.sosmed().linkedin() != ""){
        if(model.sosmed().linkedin().indexOf('http://') == -1 && model.sosmed().linkedin().indexOf('https://') == -1){
          swal('Error',"URL linkedin wajib menggunakan http://","error");
          return false;
        }
        if(model.sosmed().linkedin().indexOf('linkedin.com') == -1){
          swal('Error',"Sepertinya URL akun linkedin anda tidak valid","error");
          return false;
        }
    }
    param = ko.mapping.toJS(model.sosmed());
    url = "<?=base_url();?>user/updatesosmed";
    model.Processing(true);
    $.post(url, param, function(result){
    model.Processing(false);
       swal('Sukses',"Update Akun Social Media Berhasil","success");
      });
  })

  function getUserData(){
  url = '<?=base_url();?>user/getUserData';
  $.post(url,{},function(data){
    var res = jQuery.parseJSON(data);
       model.sosmed().facebook(res[0].facebook);
       model.sosmed().twitter(res[0].twitter);
       model.sosmed().instagram(res[0].instagram);
       model.sosmed().linkedin(res[0].linkedin);
  })
}

  sosmed = ko.mapping.fromJS(sosmed);
  model.sosmed = ko.observable(sosmed);
  ko.applyBindings(model);

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

$('.sAktif').click(function(){
   model.Processing(true);
})

$(document).ready(function() {
   getUserData()
  status();

  });

</script>