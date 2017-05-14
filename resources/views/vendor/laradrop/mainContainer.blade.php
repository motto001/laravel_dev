<div class="laradrop-container" id="laradrop-container-[[uid]]" >
    
 
    <div class="col-xs-12 col-sm-3">
    <a  class="btn btn-primary  btn-add-folder"">
        +add folder{{Auth::id()}}

        </a>        
    </div>
     <div class="col-xs-12 col-sm-9">
            <div class="form-group">             
               <input type="text" class="form-control"id="dirname" placeholder="folder name (date)" name="dirname">
            </div>
        </div>
  <!--      
  <div class="col-xs-12 col-sm-3">
    <a  class="btn btn-primary">
        +add link
        </a>        
    </div>
     <div class="col-xs-12 col-sm-9">
            <div class="form-group">             
               <input type="text" class="form-control"id="medialink" placeholder="video or image link" name="medialink">
            </div>
        </div>
-->
    <button type="button" style="width:100%" class="btn btn-default btn-add-files">{!! trans('laradrop::app.uploadFiles') !!}</button>
   <a>Action with selected:</a>
    <a href="#" onclick="return false;" class="label label-success laradrop-multi-file-insert" rel="tooltip" title="{{ trans('laradrop::app.select') }}">{{ trans('laradrop::app.select') }}</a>
            <a href="#" class="label label-danger laradrop-multi-file-delete" rel="tooltip" title="{{ trans('laradrop::app.delete') }}">{{ trans('laradrop::app.delete') }}</a>
   <button type="button" class="btn btn-success start" style="display:none;" >{!! trans('laradrop::app.startUpload') !!}</button>
       
    <div class="laradrop-breadcrumbs-container"></div><hr>
    <div class="laradrop-previews" ></div>
    <div class="laradrop-body" ></div>
</div>