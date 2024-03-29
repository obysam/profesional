<script type="text/javascript">
var page = <?= json_encode($page);?>;
  var model = {
      Processing: ko.observable(false),
      SelectedMenu: ko.observable(page),
      level: ko.observable(),
      length: ko.observable(),
      pesan: ko.observable(),
      status: ko.observableArray([]),
      persentase: ko.observable(''),
      ok: ko.observable(0)
    };
  model.Processing(true);   
 var bahasa = {
      id_user		: '',
      bahasa		    : '',
      kemampuan     : '',
      spesialisasiV	: '',
      id_bahasa	    : '',
      data_spesialisasi : []
  }

  function resetbahasa(){
      model.bahasa().id_user([]);
      model.bahasa().bahasa([]);
      model.bahasa().kemampuan([]);
      model.bahasa().spesialisasiV([]);
      model.bahasa().id_bahasa([]);
      model.bahasa().data_spesialisasi([]);
  }


  $('#worked .add-row').click(function () {
       var i = $('#length').val()
        var template = '<tr><td><input class="form-control" type="text"></td><td><select name="spesialisasi" id="spesialisasi" class="selectFilter form-control" data-bind="foreach: model.bahasa().data_spesialisasi, value: model.bahasa().spesialisasiV"><option data-bind="value:id_spesialisasi, text:spesialisasi"></option></select></td><td><input class="starvalue" id="ratings-hidden" name="rating" type="hidden" data-bind="value:model.bahasa().kemampuan()"><div class="stars starrr" data-rating="0"></div></td><td><button type="button" class="btn btn-danger delete-row"><i class="fa fa-trash"></i></button></td></tr>';
        $('#worked tbody').append(template);
        star();
        var dt = parseInt(i)+1;
        $('#length').val(dt);
    });

    $('#worked').on('click', '.delete-row', function () {
        $(this).parent().parent().remove();
    });


 bahasa = ko.mapping.fromJS(bahasa);
 model.bahasa = ko.observable(bahasa)



function spesialisasi() {
     var url = "<?=base_url();?>base/getSpesialisasiAll/";
     model.Processing(true);
     $.post(url, {}, function(result){
     var newData = jQuery.parseJSON(result); 
   
    var array = {'id_spesialisasi': 0, 'spesialisasi': '--Silahkan Pilih--'};
    newData.unshift(array);
    model.bahasa().data_spesialisasi(newData);   
    model.Processing(false);

      })
}
function star(){
(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

  $('#new-review').autosize({append: "\n"});

  var reviewBox = $('#post-review-box');
  var newReview = $('#new-review');
  var closeReviewBtn = $('#close-review-box');
  var ratingsField = $('#ratings-hidden');


  $('.starrr').on('starrr:change', function(e, value){
    ratingsField.val(value);
    model.bahasa().kemampuan(value);
  });
 
});
}

model.persentase.subscribe(function(value){
          if(value<30){
            $('.persentase').addClass('abang');
          }else if(value<60){
            $('.persentase').addClass('oren');
          }else if(value<90){
            $('.persentase').addClass('hijau');
          }else if(value>90){
            $('.persentase').addClass('biru');
          }
         })

 bahasa = ko.mapping.fromJS(bahasa);
 model.bahasa = ko.observable(bahasa)
 ko.applyBindings(model);

model.bahasa().kemampuan.subscribe(function(newVal){
  console.log(newVal)
  if(newVal==1){
    model.level('Belajar')
  }else if(newVal==2){
    model.level('Paham Dasar')
  }else if(newVal==3){
    model.level('Menguasai')
  }else if(newVal==4){
    model.level('Mahir')
  }else if(newVal==5){
    model.level('Profesional')
  }
})

model.length.subscribe(function(newVal){
  if(newVal==5){
    $('.add').hide();
    model.pesan('Maksimal 5 Kebahasaan')
  }else{
     $('.add').show();
    model.pesan('')
  }
  })
$(document).ready(function() {
  model.Processing(false);
  $('.selectFilter').select2();
  $('#tabel-bahasa').load("<?=base_url();?>user/tabelbahasa");
	spesialisasi();
  star();
  status();

	})

$('.sAktif').click(function(){
  model.Processing(true);
})

$('.add').click(function(){
  param = ko.mapping.toJS(model.bahasa());
  url = "<?=base_url();?>user/inputbahasa";
  if(model.bahasa().bahasa()==""){
    swal("Warning","Data Kebahasaan belum di isi","error");
    return false;
  }else if(model.bahasa().spesialisasiV()=="0" || model.bahasa().spesialisasiV()==undefined){
    swal("Warning","Data Bidang belum di isi","error");
    return false;
  }else if(model.bahasa().kemampuan()=="0" || model.bahasa().kemampuan()==""){
    swal("Warning","Data kemahiran belum di isi","error");
    return false;
  }
  $.post(url,param,function(res){
    swal("Success","Data kebahasaan telah tersimpan","success");
     var i = parseInt(model.bahasa().kemampuan()) - 1;
    $('.starrr .glyphicon')[i].click();
    resetbahasa();
    $('#tabel-bahasa').load("<?=base_url();?>user/tabelbahasa");
  })
})

</script>