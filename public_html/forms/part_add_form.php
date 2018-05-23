<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="form_mat_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMaterialLabel">Add Material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="materials/material_add.php" method="post">
          <div class="form-group row">
            <label for="material_projectID" class="col-sm-2 col-form-label">Project ID</label>
            <div class="col-sm-10">
              <input type="material_projectID" class="form-control" name="material_projectID" placeholder="Ex. EYE101">
            </div>
          </div>
          <div class="form-group row">
            <label for="material_partNumber" class="col-sm-2 col-form-label">Part Number</label>
            <div class="col-sm-10">
              <input type="material_partNumber" class="form-control" name="material_partNumber" placeholder="Ex. B.001">
            </div>
          </div>
          <div class="form-group row">
            <label for="material_name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="material_name" class="form-control" name="material_partName" placeholder="Ex. TexWipes">
            </div>
          </div>
          <div class="form-group row">
            <label for="material_primaryLocation" class="col-sm-2 col-form-label">Primary Locations</label>
            <div class="col-sm-10">
              <input type="material_primaryLocation" class="form-control" name="material_primaryLocation" placeholder="Ex. Flam 1">
            </div>
          </div>
          <div class="form-group row">
            <label for="material_secondaryLocation" class="col-sm-2 col-form-label">Secondary Locations</label>
            <div class="col-sm-10">
              <input type="material_secondaryLocation" class="form-control" name="material_secondaryLocation" placeholder="Ex. GR A/B">
            </div>
          </div>
          <div class="form-group row">
            <label for="material_cleanroomLocation" class="col-sm-2 col-form-label">Cleanroom Locations</label>
            <div class="col-sm-10">
              <input type="material_cleanroomLocation" class="form-control" name="material_cleanroomLocation" placeholder="Ex. Bin A.001">
            </div>
          </div>
          <div class="form-group row">
            <label for="material_totalQty" class="col-sm-2 col-form-label">Total Qty</label>
            <div class="col-sm-10">
              <input type="material_totalQty" class="form-control" name="material_totalQty">
            </div>
          </div>
          <div class="form-group row">
            <label for="material_uom" class="col-sm-2 col-form-label">Unit of Measurement</label>
            <div class="col-sm-10">
              <input type="material_uom" class="form-control" name="material_uom">
            </div>
          </div>
          <div class="form-group row">
            <label for="material_comment" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="material_comment" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">HazMat Info: </div>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="material_hazardous" value="1"> Hazardous&#63;
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="material_cers" value="1"> CERS on file?
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="material_msds" value="1"> MSDS on file?
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">Flamability: </div>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <select name="material_flamability" class="custom-select">
                  <option selected>Flash Points</option>
                  <option value="0">0 Will not burn</option>
                  <option value="1">1 Above 200F</option>
                  <option value="2">2 Above 100F, below 200F</option>
                  <option value="3">3 Below 100F</option>
                  <option value="4">4 73F</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">Health Hazard: </div>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <select name="material_health" class="custom-select">
                  <option selected>Health Hazard</option>
                  <option value="0">0 Normal material</option>
                  <option value="1">1 Slightly Hazardous</option>
                  <option value="2">2 Hazardous</option>
                  <option value="3">3 Extreme Danger</option>
                  <option value="4">4 Deadly</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">Instability Hazard</div>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <select name="material_instability" class="custom-select">
                  <option selected>Instability</option>
                  <option value="0">0 Stable</option>
                  <option value="1">1 Unstable if heated</option>
                  <option value="2">2 Violent Chem. Change</option>
                  <option value="3">3 Shock & heat may detonate</option>
                  <option value="4">4 May detonate</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="material_specificHazard" class="col-sm-2 col-form-label">Specific Hazard</label>
            <div class="col-sm-10">
              <input type="material_specificHazard" class="form-control" name="material_specificHazard" placeholder="ACID Acid ALK Alkali Radioactive...">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button name="submit" value="submit" type="submit" class="btn btn-primary">Add Material</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
