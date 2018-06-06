CKEDITOR.replace('post_content',{
    		autoGrow_onStartup: true,
    		//extraPlugins: 'autogrow',
			autoGrow_minHeight: 500,
			autoGrow_maxHeight: 800,
			autoGrow_bottomSpace: 50
    	});


// typeahead
		var citynames = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
		  prefetch: {
		    url: '/api/tags',
		    // url: 'assets/citynames.json',
		    filter: function(list) {
		      return $.map(list, function(cityname) {
		        return { name: cityname }; });
		    }
		  }
		});
		citynames.initialize();

		$('#tags').tagsinput({
		  typeaheadjs: {
		    name: 'citynames',
		    displayKey: 'name',
		    valueKey: 'name',
		    source: citynames.ttAdapter()
		  }
		});
	// end typeahead

		// khong submit khi enter
		document.getElementById("postform").onkeypress = function(e) {
			  var key = e.charCode || e.keyCode || 0;     
			  if (key == 13) {
			    // alert("I told you not to, why did you do it?");
			    e.preventDefault();
			  }
		}

		//test
		$('#test_tags').click(function(){
			// alert('ll');
			test = $("#tags").val();
			alert(test);
		});


		//featured image
		function openKCFinder(div) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
            div.innerHTML = '<div style="margin:5px">Loading...</div>';
            var img = new Image();
            img.src = url;
            img.onload = function() {
                div.innerHTML = '<img id="img" src="' + url + '" /><br>Click the image to edit or update';
                $('#featured_image').val(url);
                var img = document.getElementById('img');
                var o_w = img.offsetWidth;
                var o_h = img.offsetHeight;
                var f_w = div.offsetWidth;
                var f_h = div.offsetHeight;
                if ((o_w > f_w) || (o_h > f_h)) {
                    if ((f_w / f_h) > (o_w / o_h))
                        f_w = parseInt((o_w * f_h) / o_h);
                    else if ((f_w / f_h) < (o_w / o_h))
                        f_h = parseInt((o_h * f_w) / o_w);
                    img.style.width = f_w + "px";
                    img.style.height = f_h + "px";
                } else {
                    f_w = o_w;
                    f_h = o_h;
                }
                img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                img.style.visibility = "visible";
            }
        }
    };
    window.open('/libs/kcfinder/browse.php?type=images&dir=images/public',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}


/* Slug */
$('#title').focusout(function() {
	var slug = $('#slug').val();
	if (!slug) {
		createSlug();
	}
});

function createSlug(huy = 0)
{
	$.ajax({
        url : "/admin/posts/create-slug",
        type : "post", 
        dateType:"html", 
        data : { 
             title : $('#title').val(),
             new_slug : $('#new-post-slug').val(),
             slug : $('#slug').val(),
             fvl : huy,
             _token : $('#_token').val(),
        },
        beforeSend: function(){
            // $('#pic_load').removeClass('hide');
            // return false;
        },
        success : function (result){
            // $('#pic_load').addClass('hide');
            $('#edit-slug-box').html(result);
        }
    });
}

$('#edit-slug-box').delegate('#edit-slug-buttons', 'click', function() {
	var base_url1 = $('#edit-slug-box').data('url');
	var current_slug1 = $('#slug').val();
	var result1 = '<strong>Permalink:</strong>	<span id="sample-permalink">' + base_url1 + '/<span id="editable-post-name"><input type="text" id="new-post-slug" value="' + current_slug1 +'" autocomplete="off"></span>/</span>	&lrm;<span id="edit-slug-buttons"><button type="button" class="slug-button button button-small" id="ok_edit_slug">Ok</button> <a href="javascript:;" id="cancel_edit_slug" class="button-link">Hủy</a></span><input type="hidden" name="slug" id="slug" value="' + current_slug1 +'">';
	$('#edit-slug-box').html(result1);
});

$('#edit-slug-box').delegate('#ok_edit_slug', 'click', function() {
	createSlug();
});

$('#edit-slug-box').delegate('#new-post-slug', 'keypress', function(e) {
	if(e.which == 13) {
        createSlug();
    }
});

$('#edit-slug-box').delegate('#cancel_edit_slug', 'click', function() {
	createSlug(1);
});