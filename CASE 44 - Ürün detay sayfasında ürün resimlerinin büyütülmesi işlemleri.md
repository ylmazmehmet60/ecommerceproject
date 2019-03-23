public\js\frontend_js\easyzoom.js


resources\views\layouts\frontLayout\front_design.blade.php
<link href="{{ asset('css/frontend_css/easyzoom.css') }}" rel="stylesheet">
<script src="{{ asset('js/frontend_js/easyzoom.js') }}"></script>


main.js
$(document).ready(function(){


	$(".changeImage").click(function(){
		var image = $(this).attr('src');
		$("#mainImg").attr("src", image);
	
	});

	
        var $easyzoom = $('.easyzoom').easyZoom();

   
        var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

        $('.thumbnails').on('click', 'a', function(e) {
            var $this = $(this);

            e.preventDefault();

            
            api1.swap($this.data('standard'), $this.attr('href'));
        });

      
        var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

        $('.toggle').on('click', function() {
            var $this = $(this);

            if ($this.data("active") === true) {
                $this.text("Switch on").data("active", false);
                api2.teardown();
            } else {
                $this.text("Switch off").data("active", true);
                api2._init();
            }
        });

});
