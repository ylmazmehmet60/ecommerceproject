<!--Header-part-->
<div id="header">
  <h1><a href="{{ url('/admin/dashboard') }}">Laravel Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Hoşgeldiniz</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="login.html"><i class="icon-key"></i> Çıkış</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="{{ url('/admin/settings') }}"><i class="icon icon-cog"></i> <span class="text">Ayarlar</span></a></li>
    <li class=""><a title="" href="{{ url('/logout')}}"><i class="icon icon-share-alt"></i> <span class="text">Çıkış</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Arayın..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->