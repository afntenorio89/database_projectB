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
        <form action="sql/project_add_sql.php" method="post">
          <div class="form-group row">
            <label for="project_id" class="col-sm-2 col-form-label">Project ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="project_id" placeholder="IR12190-04">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_name" class="col-sm-2 col-form-label">Project Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="project_name" placeholder="DEM101">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="project_description" rows="2"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="project_manager" class="col-sm-2 col-form-label">Manager</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="project_manager" placeholder="Dr. Feelgood">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_lead" class="col-sm-2 col-form-label">Lead</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="project_lead" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_members" class="col-sm-2 col-form-label">Members</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="project_members" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="project_comment" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="project_comment" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="project_status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="project_status" placeholder="">
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
