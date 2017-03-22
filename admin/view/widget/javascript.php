<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $url_dir ?>js/bootstrap.min.js"></script>
<!--Datetime-->
<script src="<?php echo $url_dir ?>plugins/datetimepicker/jquery.datetimepicker.js"></script>
<!--gọi plugin datetimepicker-->
<script>
$(document).ready(function(e) {
	$('.tim').datetimepicker({
			hours12: false,
			format: 'Y-d-m H:i',
			step: 1,
			opened: false,
			validateOnBlur: false,
			closeOnDateSelect: false,
			closeOnTimeSelect: false
	});
	//datetimepicker
	$('#birthday').datetimepicker({
			hours12: false,
			format: 'd-m-Y',
			step: 1,
			opened: false,
			validateOnBlur: false,
			closeOnDateSelect: false,
			closeOnTimeSelect: false
	});
	$('#timer').datetimepicker({
			hours12: false,
			format: 'H:i d-m-Y',
			step: 1,
			opened: false,
			validateOnBlur: false,
			closeOnDateSelect: false,
			closeOnTimeSelect: false
	});
	$('.form').each(function() {
		$(this).find('input').keypress(function(e) {
			// Enter pressed?
			if(e.which == 10 || e.which == 13) {
				this.form.submit();
			}
		});

	   
	});
	/* ================ #CHECK-ALL =================== */
	$('#check-all').click(function(){
		
		if($(this).prop('checked')){
			$('.check-all').prop('checked', true).parent().parent().find('td').addClass('select');
		}
		else{
			$('.check-all').prop('checked', false).parent().parent().find('td').removeClass('select');
		}
	});
	$('.check-all').click(function(){
		if($(this).prop('checked') == false){
			$(this).parent().parent().find('td').removeClass('select');
			$('#check-all').prop('checked', false);
		}
		else{
			$(this).parent().parent().find('td').addClass('select');
		}
		if($('.check-all:checked').length == $('.check-all').length){
			$('#check-all').prop('checked', true);
		}
	});
});
	
</script>	
<!-- Tích hợp tynimce vào CodeIgniter -->
<script type="text/javascript" src="<?php echo $url_dir; ?>plugins/tinymce_3.5.11/jscripts/tiny_mce/tiny_mce.js"></script> 	
<script type="text/javascript">
	//tinyMCE
   tinyMCE.init({
	  // General options
	  mode : "textareas",
	  width:1000,
	  height:250,
	  editor_selector : "wysiwygEditor", // Sử dụng với class
	  entity_encoding : "raw", // Thay Ch&agrave;o c&aacute;c bạn = Chào các bạn
	  theme : "advanced",
	  plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
	  file_browser_callback: 'openKCFinder',
	  
	  // Theme options
	  theme_advanced_buttons1 : "preview,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect,|,bullist,numlist,|,blockquote,|,sub,sup",
	  theme_advanced_buttons2 : "tablecontrols,|,link,unlink,anchor,image,|,forecolor,backcolor,|,charmap,emotions,iespell,media,advhr,|,hr,removeformat,visualaid,|,fullscreen,|,code",
	  theme_advanced_toolbar_location : "top",
	  theme_advanced_toolbar_align : "left",
	  theme_advanced_statusbar_location : "bottom",
	  theme_advanced_resizing : true,
  
	  // Skin options
	  skin : "o2k7",
	  skin_variant : "silver",
  
	  language : 'en',
  
	  // Example content CSS (should be your site CSS)
	  content_css : "",
	  
	  // Cấu hình để font-size to hơn
	  setup : function(ed){
		  ed.onInit.add(function(ed){
			  ed.getDoc().body.style.fontSize = '11px';
		  });
	  },
  
	  // Drop lists for link/image/media/template dialogs
	  template_external_list_url : "js/template_list.js",
	  external_link_list_url : "js/link_list.js",
	  external_image_list_url : "js/image_list.js",
	  media_external_list_url : "js/media_list.js",
  
	  // Replace values for the template plugin
	  template_replace_values : {
			  username : "Some User",
			  staffid : "991234"
	  },
  
	  // Link của chính nó
	  // Cấu hình link thực
	  relative_urls : 0,
	  remove_script_host : 0,
  });
  
  function openKCFinder(field_name, url, type, win) {
	  tinyMCE.activeEditor.windowManager.open({
		  file: '<?php echo $url_dir; ?>plugins/kcfinder_2.51/browse.php?opener=tinymce&lang=vi&type=' + type,
		  title: 'KCFinder',
		  width: 700,
		  height: 500,
		  resizable: "yes",
		  inline: true,
		  close_previous: "no",
		  popup_css: false
	  }, {
		  window: win,
		  input: field_name
	  });
	  return false;
  }
  
  
  function browseKCFinder(field, type) {
	  window.KCFinder = {
		  callBack: function(url) {
			  document.getElementById(field).value = url;
			 
			  window.KCFinder = null;
		  }
	  };
	  window.open('<?php echo $url_dir; ?>plugins/kcfinder_2.51/browse.php?type='+type+'&lang=vi', 'kcfinder_textbox',
		  'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
		  'resizable=1, scrollbars=0, width=800, height=600'
	  );
  }
  function ajaxImg(img,field,type) {
	  window.KCFinder = {
		  callBack: function(url) {
			  document.getElementById(field).value = url;
			  document.getElementById(img).src = url;
			 
			  window.KCFinder = null;
		  }
	  };
	  window.open('<?php echo $url_dir; ?>plugins/kcfinder_2.51/browse.php?type='+type+'&lang=vi', 'kcfinder_textbox',
		  'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
		  'resizable=1, scrollbars=0, width=800, height=600'
	  );
  }
  function srcCKFinder(field, type,input) {
	  window.KCFinder = {
		  callBack: function(url) {
			  document.getElementById(input).value ;
			$('#'+input).val($('#'+input).val()+url+';');  
			$('#'+field).append('<li class="add"><img  src="'+url+'" > </li>');
			  window.KCFinder = null;
		  }
	  };
	  window.open('<?php echo $url_dir; ?>plugins/kcfinder_2.51/browse.php?type='+type+'&lang=vi', 'kcfinder_textbox',
		  'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
		  'resizable=1, scrollbars=0, width=800, height=600'
	  );
	 
  }
</script>
<script src="<?php echo $url_dir ?>plugins/validate/jquery.validationEngine-vi.js"></script>
<script src="<?php echo $url_dir ?>plugins/validate/jquery.validationEngine.js"></script>
<script>
	$(document).ready(function(e) {
		$("form.frm").validationEngine();
	});
</script>
<script type="text/javascript">
	var yourtitle="<?php if(isset($title)) echo $title; ?>..:|:.. Chào mừng bạn đã truy cập phần mềm quản lý website ..:|:.. ";
	var tocdo=200;
	var laptitle=null;
	function rotulo_title()
	{
		document.title=yourtitle;
		yourtitle=yourtitle.substring(1,yourtitle.length)+yourtitle.charAt(0);
		laptitle=setTimeout("rotulo_title()",tocdo);
	}
	rotulo_title();
</script>