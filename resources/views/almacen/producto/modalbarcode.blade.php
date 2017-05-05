<div class="modal fade modal-slide-in-right" role="dialog" tabindex="-1" id="modal-barcode-{{$prod->idproducto}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#f0ad4e">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" style="color:white">Codigo de Barra</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-4 text-center">
                       {!! DNS1D::getBarcodeHTML("$prod->codigobarra", "C128",2,150) !!}
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3 text-center">
                        <h4> {{$prod->codigobarra}} </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3 text-center">
                        <a href="{{url('printbarcode/') . '/' . $prod->idproducto}} " class="btn bg-green waves-effect btn-xs"><i class="material-icons" aria-hidden="true">print</i>Imprimir
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="material-icons" aria-hidden="true">close</i> Cerrar
                </button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>