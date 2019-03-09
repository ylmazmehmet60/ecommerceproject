

	delete için
			rota zaten var
			
			
	sweet alert kütüphanelerini ekle (js ve css) zaten vAR
	
	view
	<a id="delCat" rel="{{ $product->id }}" rel1="delete-category" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Sil</a>	
		
			
	javascript
	$(document).on('click','.deleteRecord',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
          title: "Emin misiniz?",
          text: "Bu işlem geriye alınmayacak!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Evet, sil!",
          closeOnConfirm: false
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;
        });
    });	
			
			
			
			
			
			
			
			
			
		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			