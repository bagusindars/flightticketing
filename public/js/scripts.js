// navigation slide-in
$(window).on('load',function() {


  $('.nav_slide_button').click(function() {
    $('.pull').slideToggle();
  });

  $('.gambar-awal').click(function(){
        $('.container-homepage').fadeIn(500);
        $(this).hide(800);

  });
  	$('select[name=rute_from]').on('change', function() {
	   var self = this;
	   $('select[name=rute_to]').find('option').prop('disabled', function() {
	       return this.value == self.value
	   });
	});

	$('select[name=rute_to]').on('change', function() {
	  var self = this;
	  $('select[name=rute_from]').find('option').prop('disabled', function() {
	      return this.value == self.value
	  });
	});


	 $('[type="datetime-local"].min-today').prop('min', function(){
        return new Date().toJSON().split('T')[0];
    });


	 $('select[name="rute_from"]').on('change', function(){
        var countryId = $(this).val();
        if(countryId) {
            $.ajax({
                url: '/admin/create/rute/get1/'+countryId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="bandara1"]').empty();

                    $.each(data, function(key, value ){

                        $('select[name="bandara1"]').append('<option value="'+ value +'">' + key  + '</option>');
                        console.log($('select[name="bandara1"]').val());
                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="bandara1"]').empty();
        }

    });

	$('select[name="rute_to"]').on('change', function(){
        var countryId = $(this).val();
        if(countryId) {
            $.ajax({
                url: '/admin/create/rute/get2/'+countryId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="bandara2"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="bandara2"]').append('<option value="'+ value +'">' + key + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="bandara2"]').empty();
        }

    }); 

    $('select[name="plane"]').on('change', function(){
        var countryId = $(this).val();
        if(countryId) {
            $.ajax({
                url: '/admin/create/rute/get3/'+countryId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('input[name="kursi"]').empty();

                    $.each(data, function(key, value){

                        $('input[name="kursi"]').val(value);
                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('input[name="kursi"]').empty();
        }

    }); 


    $('.search-more').on('click',function(){
    	$('.form-search-tiket').stop().toggle(300);
    })


	 var imagesPreview = function(input, placeToInsertImagePreview) {

	        if (input.files) {
	            var filesAmount = input.files.length;

	            for (i = 0; i < filesAmount; i++) {
	                var reader = new FileReader();

	                reader.onload = function(event) {
	                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
	                }

	                reader.readAsDataURL(input.files[i]);
	            }
	        }

	    };

	    $('#logo-input-file').on('change', function() {
	        imagesPreview(this, 'div.imgPreview');
	    });


	     $('#bukti-input-file').on('change', function() {
	        imagesPreview(this, 'div.imgPreview');
	    });


	    $('.panah-bawah-reservasi').on('click',function(){
	    	$('.datapesan').stop().toggle(250);
	    })

	    $('.openseat').on('click',function(){
	    	$('.seat-see').stop().toggle(50);
	    	$(this).text(function(i,text){
	    		return text === "Sembunyikan" ? "Lihat Kursi" : "Sembunyikan";
	    	});
	    })


	    

});
