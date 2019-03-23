@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Ana</a> <a href="#">Ürünler</a> <a href="#" class="current">Özellik Ekle</a> </div>
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
            <h5>Add Images</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-images/'.$productDetails->id) }}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
              <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
              <div class="control-group">
                <label class="control-label">Kategori İsmi</label>
                <label class="control-label">{{ $category_name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label">Ürün Adı</label>
                <label class="control-label">{{ $productDetails->product_name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label">Ürün Kodu</label>
                <label class="control-label">{{ $productDetails->product_code }}</label>
              </div>
              <div class="control-group">
                <label class="control-label">Ürünün Alt Resimleri</label>
                <div class="controls">
                  <div class="uploader" id="uniform-undefined"><input name="image[]" id="image" type="file" multiple="multiple"></div>
                </div>
              </div>
             
              <div class="form-actions">
                <input type="submit" value="Add Images" class="btn btn-success">
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
            <h5>Resimler</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Resim ID</th>
                  <th>Ürün ID</th>
                  <th>Resim</th>
                  <th>İşlemler</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productImages as $image)
                <tr class="gradeX">
                  <td class="center">{{ $image->id }}</td>
                  <td class="center">{{ $image->product_id }}</td>
                  <td class="center"><img width=130px src="{{ asset('images/backend_images/products/small/'.$image->image) }}"></td>
                  <td class="center"><a id="delImage" rel="{{ $image->id }}" rel1="delete-alt-image" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Sil</a></td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
