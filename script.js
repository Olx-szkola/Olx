$(document).ready(function(){


	$('.like-btn').on('click', function(){
		var post_id = $(this).data('id');
		$clicked_btn = $(this);



		if ($clicked_btn.hasClass('fa-thumbs-up')) {
			var action = 'like';
		} else if ($clicked_btn.hasClass('fa-thumbs-down')){
			var action = 'unlike';
		}



		$.post("ogloszenia.php",{action:action,post_id:post_id}, 
			function(data){
				if(data !="")
			{
				alert(post_id);
				if (action == "like") {
					$clicked_btn.addClass('black');
					}else if (action == 'unlike'){
					$clicked_btn.addClass('black');
					
					}

			}
		}
		);



	});


});