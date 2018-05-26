<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="part_add_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addpartLabel">Add Parts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="sql/part_add_sql.php" method="post">
          <div class="form-group row">
            <label for="project_id" class="col-sm-2 col-form-label">Project ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="project_id" placeholder="Ex. EYE101">
            </div>
          </div>
          <div class="form-group row">
            <label for="part_number" class="col-sm-2 col-form-label">Part Number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="part_number" placeholder="Ex. B.001">
            </div>
          </div>
          <div class="form-group row">
            <label for="part_name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="part_name" placeholder="Ex. TexWipes">
            </div>
          </div>
          <div class="form-group row">
            <label for="part_primaryLocation" class="col-sm-2 col-form-label">Primary Locations</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="part_primaryLocation" placeholder="Ex. Flam 1">
            </div>
          </div>
          <div class="form-group row">
            <label for="part_secondaryLocation" class="col-sm-2 col-form-label">Secondary Locations</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="part_secondaryLocation" placeholder="Ex. GR A/B">
            </div>
          </div>
          <div class="form-group row">
            <label for="part_cleanroomLocation" class="col-sm-2 col-form-label">Cleanroom Locations</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="part_cleanroomLocation" placeholder="Ex. Bin A.001">
            </div>
          </div>
          <div class="form-group row">
            <label for="part_quantity" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
              <input type="number" step="0.01" class="form-control" name="part_quantity">
            </div>
          </div>
          <div class="form-group row">
            <label for="part_unitOfMeasurement" class="col-sm-2 col-form-label">Unit of Measurement</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="part_unitOfMeasurement">
            </div>
          </div>
          <div class="form-group row">
            <label for="part_expirationDate" class="col-sm-2 col-form-label">Expiration Date</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="part_expirationDate">
            </div>
          </div>
          <div class="form-group row">
            <label for="part_comment" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="part_comment" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">HazMat Info: </div>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="part_hazardous" value="yes"> Hazardous&#63;
                  <input id="testNameHidden" type="hidden" value="No" name="part_hazardous">
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="part_cers" value="yes"> CERS on file?
                  <input id="testNameHidden" type="hidden" value="No" name="part_cers">
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="part_msds" value="yes"> MSDS on file?
                  <input id="testNameHidden" type="hidden" value="No" name="part_msds">
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">Flamability: </div>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <select name="part_flamability" class="custom-select">
                  <option value="NA" selected>Flash Points</option>
                  <option value="0 Will not burn">0 Will not burn</option>
                  <option value="1 Above 200F">1 Above 200F</option>
                  <option value="2 Above 100F, below 200F">2 Above 100F, below 200F</option>
                  <option value="3 Below 100F">3 Below 100F</option>
                  <option value="4 73F">4 73F</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">Health Hazard: </div>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <select name="part_health" class="custom-select">
                  <option value="NA" selected>Health Hazard</option>
                  <option value="0 Normal part">0 Normal part</option>
                  <option value="1 Slightly Hazardous">1 Slightly Hazardous</option>
                  <option value="2 Hazardous">2 Hazardous</option>
                  <option value="3 Extreme Danger">3 Extreme Danger</option>
                  <option value="4 Deadly">4 Deadly</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">Instability Hazard</div>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <select name="part_instability" class="custom-select">
                  <option value="NA" selected>Instability</option>
                  <option value="0 Stable">0 Stable</option>
                  <option value="1 Unstable if heated">1 Unstable if heated</option>
                  <option value="2 Violent Chem. Change">2 Violent Chem. Change</option>
                  <option value="3 Shock & heat may detonate">3 Shock & heat may detonate</option>
                  <option value="4 4 May detonate">4 May detonate</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="part_specificHazard" class="col-sm-2 col-form-label">Specific Hazard</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="part_specificHazard" placeholder="ACID Acid ALK Alkali Radioactive...">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button name="submit" value="submit" type="submit" class="btn btn-primary">Add Part</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
