<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> İşlemler</a>
  <ul>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>İşlemler</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Kategoriler</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-category') }}">Kategori Ekle</a></li>
        <li><a href="{{ url('/admin/view-categories') }}">Kategorileri Gör</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Ürünler</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-product') }}">Ürün Ekle</a></li>
        <li><a href="{{ url('/admin/view-products') }}">Ürünleri Gör</a></li>
      </ul>
    </li>
	<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Kuponlar</span> <span class="label label-important">0</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-coupon') }}">Kupon Ekle</a></li>
        <li><a href="{{ url('/admin/view-coupons') }}">Kuponları Gör</a></li>
      </ul>
    </li>
	<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Siparişler</span> <span class="label label-important">1</span></a>
      <ul>
        <li><a href="{{ url('/admin/view-orders') }}">Siparişleri Gör</a></li>
      </ul>
    </li>
	<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Banner</span> <span class="label label-important">0</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-banner') }}">Banner Ekle</a></li>
        <li><a href="{{ url('/admin/view-banners') }}">Bannerleri Gör</a></li>
      </ul>
    </li>
	<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Üyeler</span> <span class="label label-important">0</span></a>
      <ul>
        <li><a href="{{ url('/admin/view-users') }}">Üyeleri Görüntüle</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->

