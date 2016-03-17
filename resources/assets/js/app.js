Dropzone.options.addImages = {

	maxFileSize :2,
	acceptedFiles: 'image/*',
	/*success: function(file, response){
		
		if(file.status == 'success')
		{
			handleDropzoneFileUpload.handleSuccess(response);
		}
		else
		{
			handleDropzoneFileUpload.handleError(response);
		}

	}*/
	 init: function() {
    this.on("queuecomplete", function(file) { 
    	//alert("Added file."); 
     window.location= baseUrl+ '/gallery/list';
     console.log("complete added")});
  }
	

};
 
/*var handleDropzoneFileUpload = {
	handleError: function(response){
		console.log(response);
	},
	handleSuccess: function(response){
		console.log(response);

		var imageList = $('#gallery-image2');
		//var imageSrc = baseUrl + '/' +response.file_path;
		var imageSrc = baseUrl + '/gallery/images/thumbs/' +response.file_name;
		console.log(imageSrc);
		console.log("hehe"+imageList);

		$(imageList).append('<li id="gallery-imag3"><a href="'+ imageSrc +'"><img id="gallery-images1" src="' + imageSrc +'" alt=""/></a></li>');
		
	}
}*/

$(document).ready(function(){
	console.log("Document is ready!");
});

