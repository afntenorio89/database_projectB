<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="form_project_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addprojectLabel">Add Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="projects/project_add.php" method="post">
          <div class="form-group row">
            <label for="project_lotNumber" class="col-sm-2 col-form-label">Lot Number</label>
            <div class="col-sm-10">
              <input type="project_lotNumber" class="form-control" name="project_lotNumber" placeholder="IR12190-04">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_projectID" class="col-sm-2 col-form-label">Project ID</label>
            <div class="col-sm-10">
              <input type="project_projectID" class="form-control" name="project_projectID" placeholder="DEM101">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_itemNumber" class="col-sm-2 col-form-label">Item Number</label>
            <div class="col-sm-10">
              <input type="project_itemNumber" class="form-control" name="project_itemNumber" placeholder="D.001">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <input type="project_description" class="form-control" name="project_description" placeholder="Rabbit Build">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_refDWG" class="col-sm-2 col-form-label">Ref. DWG</label>
            <div class="col-sm-10">
              <input type="project_refDWG" class="form-control" name="project_refDWG" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_refMP" class="col-sm-2 col-form-label">Ref. MP</label>
            <div class="col-sm-10">
              <input type="project_refMP" class="form-control" name="project_refMP" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_supplier" class="col-sm-2 col-form-label">Supplier</label>
            <div class="col-sm-10">
              <input type="project_supplier" class="form-control" name="project_supplier">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_assignedBy" class="col-sm-2 col-form-label">Assigned By:</label>
            <div class="col-sm-10">
              <input type="project_assignedBy" class="form-control" name="project_assignedBy">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_qty" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
              <input type="project_qty" class="form-control" name="project_qty">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_comment" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="project_comment" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="project_bomID" class="col-sm-2 col-form-label">BoM ID</label>
            <div class="col-sm-10">
              <input type="project_bomID" class="form-control" name="project_bomID">
            </div>
          </div>


          <div class="form-group row">
            <div class="col-sm-10">
              <button name="submit" value="submit" type="submit" class="btn btn-primary">Add project</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
