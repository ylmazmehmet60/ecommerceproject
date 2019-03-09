@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Ana Ekran</a> <a href="#">Kategoriler</a> <a href="#" class="current">Kategorileri Gör</a> </div>
    <h1>Kategoriler</h1>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Kategorilerİ Gör</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Kategori ID</th>
                  <th>Kategori Adı</th>
                  <th>Kategori Seviyesi</th>
				  
                  <th>Kategori URL</th>
                  <th>İşlemler</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($categories as $category)
                <tr class="gradeX">
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->parent_id }}</td>
				  
                  <td>{{ $category->url }}</td>
                  <td class="center">
				  <a href="{{ url('/admin/edit-category/'.$category->id) }}" class="btn btn-primary btn-mini">Düzenle</a> 
				  <a id="delCat" rel="{{ $category->id }}" rel1="delete-category" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Sil</a>	
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