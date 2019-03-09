  \resources\views\admin\products\view_products.blade.php

  <td class="center"><a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini">Gör</a> <a href="{{ url('/admin/edit-product/'.$product->id) }}" class="btn btn-primary btn-mini">Düzenle</a> <a id="delCat" href="{{ url('/admin/delete-product/'.$product->id) }}" class="btn btn-danger btn-mini">Sil</a></td>
                </tr>
                    <div id="myModal{{ $product->id }}" class="modal hide">
                      <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3>{{ $product->product_name }} Tam Detaylar</h3>
                      </div>
                      <div class="modal-body">
                        <p>Ürün ID: {{ $product->id }}</p>
                        <p>Kategori ID: {{ $product->category_id }}</p>
                        <p>Ürün Kodu: {{ $product->product_code }}</p>
                        <p>Ürün Rengi: {{ $product->product_color }}</p>
                        <p>Fiyat: {{ $product->price }}</p>
                        <p>Kumaşı: </p>
                        <p>Materyali: </p>
                        <p>Açıklama: {{ $product->description }}</p>
                      </div>
                    </div>