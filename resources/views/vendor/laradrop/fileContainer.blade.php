<div style="width:140px;height:150px;" class="laradrop-thumbnail thumbnail laradrop-droppable col-md-2 laradrop-draggable "  file-id="[[id]]">
    <div style="width:130px;height:140px;margin:0px;padding:0px;" class=" well" >
        
        
      
        <p>
          <a href="#" onclick="return false;" class="btn-warning laradrop-multi-file-select" rel="tooltip" title="{{ trans('laradrop::app.select') }}">
                <span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span></a>
            
            <a href="#" onclick="return false;" class="btn-success laradrop-file-insert" rel="tooltip" title="{{ trans('laradrop::app.select') }}">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
            <a href="#" onclick="return false;" class="btn-info laradrop-file-edit" rel="tooltip" title="{{ trans('laradrop::app.select') }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
            <a href="{{ route('laradrop.index') }}" class="btn-danger laradrop-file-delete" rel="tooltip" title="{{ trans('laradrop::app.delete') }}">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        </p>
<div  style="max-height:20px;overflow:hidden;" alt="[[alias]]" >[[alias]]</div>

        <img width="100px"src="[[fileSrc]]" alt="[[alias]]" >
    </div>
</div>