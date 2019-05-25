<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Importar Excel</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('serviciosimportar') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="archivo">Archivo</label>
            <input type="file" name="archivo" class="form-control">
          </div>
          <button class="btn btn-success">Importar</button>
        </form>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
      
    </div>
  </div>
</div>