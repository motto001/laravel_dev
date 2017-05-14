  
<!--push|||head|||laradrop|||
<script src="/vendor/jasekz/laradrop/js/enyo.dropzone.js"></script>
<script src="/vendor/jasekz/laradrop/js/laradrop.js"></script> 
-->
<!--push|||js_docready|||laradrop_docready|||
jQuery('.laradrop').laradrop({
            onInsertCallback: function (obj){
              /** Populate our id and src 
              currentModalBtn.closest('.input-group').find('.file-id').text(obj.id);
              currentModalBtn.closest('.input-group').find('input.file-src').val(obj.src);
              **/
              eval(mediaCallabackFunc+'(obj)');
              $('#myModal').modal('toggle');
            },
            onErrorCallback: function(jqXHR,textStatus,errorThrown){
                // if you need an error status indicator, implement here
                alert('An error occured: '+ errorThrown);
            },
            onSuccessCallback: function(serverData){
                // if you need a success status indicator, implement here
            }
        }); 
  
-->
 <script>
 var mediaCallabackFunc="mediaBasecallback";
 function mediaBasecallback(ob={}){
   if(ob[Object.keys(ob)[0]] == undefined){   
  alert("üres");
}else{
   $.each(ob, function(index, value) {
    alert(value.id);
	 
});
 


 }
 }
 
 </script> 

  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">My Media Manager</h4>
      </div>
      <div class="modal-body">
       
            <div class="laradrop" laradrop-csrf-token="{{ csrf_token() }}" ></div>    </div>
            <div class="clearfix"></div>
      </div>
    </div>
  </div>


	<!-- laradrop fileinput--------------------------------- 

  <div class="input-group form-group">
      <span class="input-group-addon" >
        File ID: <strong class="file-id">*</strong>
      </span>
      <input type="text" class="form-control file-src" id="file1"  placeholder="File Thumb Source">
      <span class="input-group-btn">
        <button class="btn btn-default modal-btn" type="button" data-toggle="modal" data-target="#myModal">Select File</button>
      </span>
  </div>
  -->