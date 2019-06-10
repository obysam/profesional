<style>
 .animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
}

.stars
{
    margin: 20px 0;
    font-size: 24px;
    color: #d17581;
    margin-top: 0px !important;
}
.oby{
    padding-top: 0px !important;
    margin-bottom: 0px !important;
}
.red{
    color:red;
}

</style>

                <div class="row form-bahasa">
                <div class="col-md-8 col-xs-12 col-md-offset-2">
                     <div class="card">
                            <div class="header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="title">Bahasa</h4>
                                    <p class="category">Isikan data dengan 5 Kebahasaan terbaik anda.</p>
                                </div>
                                <div class="col-md-6 pull-right" style="padding-right: 30px;">
                                     <h3 class="pull-right"><span  data-bind="text: model.length()"></span>/5</h3>
                                     <h5 class="pull-right" class="oby red" data-bind="text:model.pesan()">></h5>
                                </div>
                            </div>
                            </div>
                            <div class="content">
                                <form class="form-horizontal" action="#" id="form-bahasa">
                                    <fieldset>
                                    <div class="col-md-12">
           <table class="table table-hover" id="worked">
                <thead>
                    <tr>
                        <th width="70%">Kebahasaan</th>
                        <th width="20%">Kemahiran</th>
                        <th width="10%">
                        </th>
                    </tr>
                </thead>
                <tbody style="background-color:#f5f5f5">
                    <tr>
                        <td>
                            <input class="form-control" type="text" data-bind="value:model.bahasa().bahasa"></td>
                        <td>
                            <input class="starvalue" id="ratings-hidden" name="rating" type="hidden" value="" data-bind="value:model.bahasa().kemampuan()"> 
                           <p class="oby" data-bind="text:model.level"><br></p>
                            <div class="stars starrr" data-rating="0"></div>
                            </td>
                        <td>
                            <button type="button" class="btn btn-primary add"><i class="fa fa-plus"></i></button></td>
                    </tr>
           
                </tbody>
            </table>

            <div id="tabel-bahasa"></div>
        </div>
                                    

                                    </fieldset>
                                    </form>

                            </div>
                        </div>
                </div>
            </div>

                </div>
        </div>

        
