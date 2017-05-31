
<!--  source: http://unisharp.github.io/laravel-filemanager/integration -->
 
 <!--   Ckeditor -->

<textarea id="my-editor" name="content" class="form-control">{!! old('content', 'test editor content') !!}</textarea>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

<script>
$('textarea.my-editor').ckeditor(options);
</script>  


<!--   standalone -->
 <script src="/vendor/laravel-filemanager/js/lfm.js"></script>

<div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
   <input id="thumbnail" class="form-control" type="text" name="filepath">
 </div>
 <img id="holder" style="margin-top:15px;max-height:100px;">
 <script>
$('#lfm').filemanager('image');
$('#lfm').filemanager('file');

</script>