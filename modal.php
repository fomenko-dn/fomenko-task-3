<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <label for="first_name">
              First name
              <input type="text" name="first_name" id="first_name" class="form-item" value="">
          </label><br>
          <label for="last_name">
              Last name
              <input type="text" name="last_name" id="last_name" class="form-item" value="">
          </label><br>
          <label for="role">
              <div class="select-box">
                  Role 
              <select name="role" id="role">
                  <option value="user">user</option>
                  <option value="admin">admin</option>
              </select>
              </div>
          </label><br>
          <label  for="status" class="status">
              <div>Status</div>
              <label class="switch">
                <input type="checkbox" name="status" class="status" id="status" value="0">
                <span class="slider round"></span>
              </label>
          </label>  
          <input type="hidden" id="id_user" value="">
          <div class="alert alert-danger mt-2" id="errorBlock"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <button type="button" id="add_edit" class="btn btn-primary"></button>
      </div>
    </div>
  </div>
</div>

<!-- Comfirm delete Modal -->
<div class="modal fade" id="comfirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="comfirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="comfirmDeleteModalLabel">
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="comfirmDeleteBody"></div>
          <div id="for_delete" hidden=""></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <button type="button" id="comfirm_delete" class="btn btn-primary" ></button>
      </div>
    </div>
  </div>
</div>

<!-- Comfirm Modal -->
<div class="modal fade" id="comfirmModal" tabindex="-1" role="dialog" aria-labelledby="comfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="comfirmModalLabel">
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="comfirmBody">
          <!-- <div id="comfirmBody"></div> -->
          <div id="for_delete" hidden=""></div>
      </div>
      <div class="modal-footer">
        <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <button type="button" id="comfirm" class="btn btn-primary" >Ок</button>
      </div>
    </div>
  </div>
</div>