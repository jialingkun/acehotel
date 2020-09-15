<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">

	<!-- Dropzone.css-->
	<link rel="stylesheet" href="<?=base_url("dist/css/dropzone.css");?>">
	

	<style type="text/css">
		.dz-preview .dz-image img{
			width: 100% !important;
			height: 100% !important;
			object-fit: cover;
		}

		.dz-message{
			text-align: center;
			font-size: 28px;
		}
	</style>
	<title>TEST</title>
</head>

<body>
	<h5>Upload</h5>
	<form class="dropzone" id="dropzone" action="<?php echo site_url('upload_foto/1') ?>" method='post'>
	</form>
</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>
<script src="<?=base_url("dist/js/function.js");?>"></script>


<!-- Dropzone.js-->
<script src="<?=base_url("dist/js/dropzone.js");?>"></script>



<script>
	Dropzone.options.dropzone = {
		init: function() { 
			myDropzone = this;
			refreshmockfile(myDropzone);
		},
		addRemoveLinks: true,
		removedfile: function(file) {
			var name = file.name;
			$.ajax({
				type: 'POST',
				url: "<?php echo site_url('delete_foto') ?>",
				data: {name: name},
				success: function(data){
					// location.reload()
				}
			});
			var _ref
			return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0
		},
		queuecomplete: function(file) {
			$('.dz-preview').remove();
			refreshmockfile(myDropzone);
		},
		maxThumbnailFilesize: 20,
		acceptedFiles: 'image/*,.jpg,.png,.jpeg',
		thumbnailWidth:"250",
		thumbnailHeight:"250",
		resizeWidth:"2048",
	};


	function refreshmockfile(myDropzone){
		$.ajax({
			url: "<?php echo site_url('show_foto/1') ?>",
			type: 'get',
			dataType: 'json',
			success: function(response){

				$.each(response, function(key,value) {
					let mockFile = { name: value.name, size: value.size };
					myDropzone.files.push( mockFile );
					myDropzone.emit("addedfile", mockFile);
					myDropzone.emit("thumbnail", mockFile, value.path);
						// myDropzone.emit("complete", mockFile);
						$('.dz-progress').hide();
						var center = document.createElement('center');
						var view = document.createElement('a');
						view.href = "<?php echo site_url('view_foto/') ?>"+mockFile.name;
						view.className = 'btn btn-primary btn-sm text-center';
						view.innerHTML = "View";
						view.target = "_blank";
						center.appendChild(view);
						mockFile.previewTemplate.appendChild(center);
					});
			}
		})
	}
</script>

</html>
