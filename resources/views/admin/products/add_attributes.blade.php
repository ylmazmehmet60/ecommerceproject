@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Ana</a> <a href="#">Ürünler</a> <a href="#" class="current">Ürün Özelliği Ekle</a> </div>
    <h1>Products</h1>
    @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Özellik Ekle</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-attributes/'.$productDetails->id) }}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
              <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
              <div class="control-group">
                <label class="control-label">Kategori Adı</label>
                
              </div>
              <div class="control-group">
                <label class="control-label">Ürün Adı</label>
               
              </div>
              <div class="control-group">
                <label class="control-label">Ürün Kodu</label>
               
              </div>
              <div class="control-group">
                <label class="control-label">Ürün Rengi</label>
                
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls field_wrapper">
                  <input required title="Required" type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;">
                  <input required title="Required" type="text" name="size[]" id="size" placeholder="Size" style="width:120px;">
                  <input required title="Required" type="text" name="price[]" id="price" placeholder="Price" style="width:120px;"> 
                  <input required title="Required" type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;">
                  <a href="javascript:void(0);" class="add_button" title="Add field">Ekle</a>
                </div>
              </div>
             
              <div class="form-actions">
                <input type="submit" value="Add Attributes" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Özellikler</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{ url('admin/edit-attributes/'.$productDetails->id) }}" method="post">{{ csrf_field() }}
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Özellik ID</th>
                    <th>SKU</th>
                    <th>Boyut</th>
                    <th>Fiyat</th>
                    <th>Stok</th>
                    <th>İşlemler</th>
                  </tr>
                </thead>
                <tbody>

              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection