@extends('layouts.app2')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-speech font-green"></i>
                    <span class="caption-subject bold font-green uppercase">Detail Produk</span>
                </div>
                
            </div>

            <div class="portlet-body form">
            	
                <form role="form" method="POST" action="{{ url('product/update') }}" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama produk</label>
                        <div class="col-md-4">
                            <input type="text" value="{{ $data->id }}" class="form-control" name="id" required style="display:none" />
                            <input type="text" value="{{ $data->nama_produk }}" class="form-control" name="productname" required disabled/> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Grup produk</label>
                        <div class="col-md-4" >
                            <select class="form-control input-small" name="group" disabled>
                                @foreach ( $group as $u)
                                <option value="{{ $u->idgroup }}" <?php if ( $u->idgroup == $data->grup_produk ) echo 'selected' ?> >{{ $u->nama_grup }}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Deskripsi produk</label>
                        <div class="col-md-4">
                            <textarea class="form-control" rows="3" placeholder="Tepung berbahan gandum" name="productdesc" disabled>{{ $data->deskripsi_produk }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Kandungan</label>     
                        <div class="col-md-9">
                            <div class="mt-repeater">
                                <div data-repeater-list="content">
                                    @foreach( $spec as $sp )
                                    <div data-repeater-item class="row" style="margin-bottom: 10px;">
                                        <div class="col-md-3">
                                            <input type="text" placeholder="Protein" class="form-control" name="parameter" value="{{ $sp->parameter }}" disabled/> </div>
                                        <div class="col-md-2">
                                            <input type="text" placeholder="Min 12.50%" class="form-control" name="value" value="{{ $sp->value }}" disabled /> </div>
                                        
                                    </div>
                                    @endforeach
                                </div>

                                <hr>
                                <br>
                                <br> 
                            </div>
                        </div>
                    </div>
                    <hr>
                                      
                    
                    <div class="form-actions" >
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <a type="button" class="btn btn-circle grey-salsa btn-outline" href="{{ url('/approval/product') }}">Kembali</a>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('public/assets/global/plugins/jquery-repeater/jquery.repeater.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/pages/scripts/form-repeater.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/pages/scripts/components-date-time-pickers.min.js') }}" type="text/javascript"></script>
@endsection