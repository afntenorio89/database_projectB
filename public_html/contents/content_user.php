<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link secondary active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Parts</a>
        <a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Projects</a>
        <a class="nav-link" id="v-pills-partslists-tab" data-toggle="pill" href="#v-pills-partslists" role="tab" aria-controls="v-pills-partslists" aria-selected="false">Parts Lists</a>
        <a class="nav-link" id="v-pills-products-tab" data-toggle="pill" href="#v-pills-products" role="tab" aria-controls="v-pills-products" aria-selected="false">Products</a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Work Orders</a>
      </div>
    </div>
    <div class="col-sm-10">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="page-header clearfix">
                              <h2 class="pull-left">Inventory</h2>
                              <a href="#" data-toggle="modal" data-target="#part_add_form" class="btn btn-success pull-right">Add New parts</a>
                          </div>
                          <?php
                          // Include config file
                          require_once 'configs/database.php';

                          // Attempt select query execution
                          $sql = "SELECT * FROM parts";
                          if($result = mysqli_query($conn, $sql)){
                              if(mysqli_num_rows($result) > 0){
                                  echo "<table class='table table-bordered table-striped'>";
                                      echo "<thead>";
                                          echo "<tr>";
                                              echo "<th>Project ID</th>";
                                              echo "<th>Part Number</th>";
                                              echo "<th>Part Name</th>";
                                              echo "<th>Primary Loc.</th>";
                                              echo "<th>Total Qty.</th>";
                                              echo "<th>Unit</th>";
                                              echo "<th>Secondary Loc.</th>";
                                              echo "<th>Secondary Qty.</th>";
                                              echo "<th>Action</th>";
                                          echo "</tr>";
                                      echo "</thead>";
                                      echo "<tbody>";
                                      while($row = mysqli_fetch_array($result)){
                                          echo "<tr>";
                                              echo "<td>" . $row['project_id'] . "</td>";
                                              echo "<td>" . $row['part_number'] . "</td>";
                                              echo "<td>" . $row['part_name'] . "</td>";
                                              echo "<td>" . $row['part_primaryLocation'] . "</td>";
                                              echo "<td>" . $row['part_quantity'] . "</td>";
                                              echo "<td>" . $row['part_unitOfMeasurement'] . "</td>";
                                              echo "<td>" . $row['part_secondaryLocation'] . "</td>";
                                              echo "<td>" . $row['part_secondaryQuantity'] . "</td>";
                                              echo "<td>";
                                                  echo "<a href='actions/part_read_action.php?part_id=". $row['part_id'] ."' title='Additional Information' data-toggle='tooltip'><span class='fab fa-readme fa-lg'></span></a>";
                                                  echo "<a href='actions/part_update_action.php?part_id=". $row['part_id'] ."' title='Update Record' data-toggle='tooltip'><span class='fas fa-edit fa-lg'></span></a>";
                                                  echo "<a href='actions/part_delete_action.php?part_id=". $row['part_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fas fa-minus-circle fa-lg'></span></a>";
                                              echo "</td>";
                                          echo "</tr>";
                                      }
                                      echo "</tbody>";
                                  echo "</table>";
                                  // Free result set
                                  //mysqli_free_result($result);
                              } else{
                                  echo "<p class='lead'><em>No records were found.</em></p>";
                              }
                          } else{
                              echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                          }

                          // Close connection
                        //  mysqli_close($conn);
                          ?>
                      </div>

                  </div>
              </div>
        </div>

        <!-- Projects -->
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="page-header clearfix">
                          <h2 class="pull-left">Projects</h2>
                          <a href="#" data-toggle="modal" data-target="#form_project_add" class="btn btn-success pull-right">Add Project</a>
                      </div>
                      <?php
                      // Include config file
                      //require_once 'includes/database_inc.php';

                      // Attempt select query execution
                      $sqlb = "SELECT * FROM projects";
                      if($resultb = mysqli_query($conn, $sqlb)){
                          if(mysqli_num_rows($resultb) > 0){
                              echo "<table class='table table-bordered table-striped'>";
                                  echo "<thead>";
                                      echo "<tr>";
                                          echo "<th>Project ID</th>";
                                          echo "<th>Name</th>";
                                          echo "<th>Description</th>";
                                          echo "<th>Manager</th>";
                                          echo "<th>Lead</th>";
                                          echo "<th>Members</th>";
                                          echo "<th>Comment</th>";
                                          echo "<th>Status</th>";
                                          echo "<th>Action</th>";
                                      echo "</tr>";
                                  echo "</thead>";
                                  echo "<tbody>";
                                  while($rowb = mysqli_fetch_array($resultb)){
                                      echo "<tr>";
                                          echo "<td>" . $rowb['project_id'] . "</td>";
                                          echo "<td>" . $rowb['project_name'] . "</td>";
                                          echo "<td>" . $rowb['project_description'] . "</td>";
                                          echo "<td>" . $rowb['project_manager'] . "</td>";
                                          echo "<td>" . $rowb['project_lead'] . "</td>";
                                          echo "<td>" . $rowb['project_members'] . "</td>";
                                          echo "<td>" . $rowb['project_comment'] . "</td>";
                                          echo "<td>" . $rowb['project_status'] . "</td>";
                                          echo "<td>";
                                              echo "<a href='actions/project_read_action.php?project_id=". $rowb['project_id'] ."' title='Additional Information' data-toggle='tooltip'><span class='fab fa-readme fa-lg'></span></a>";
                                              echo "<a href='actions/project_update_action.php?project_id=". $rowb['project_id'] ."' title='Update Record' data-toggle='tooltip'><span class='fas fa-edit fa-lg'></span></a>";
                                              echo "<a href='actions/project_delete_action.php?project_id=". $rowb['project_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fas fa-minus-circle fa-lg'></span></a>";
                                          echo "</td>";
                                      echo "</tr>";
                                  }
                                  echo "</tbody>";
                              echo "</table>";
                              // Free result set
                              mysqli_free_result($resultb);
                          } else{
                              echo "<p class='lead'><em>No records were found.</em></p>";
                          }
                      } else{
                          echo "ERROR: Could not able to execute $sqlb. " . mysqli_error($conn);
                      }

                      // Close connection
                //  mysqli_close($conn);
                      ?>
                  </div>
              </div>
          </div>
        </div>
        <!--PROJECTS END -->

        <!--BoMs Start -->
        <div class="tab-pane fade" id="v-pills-partslists" role="tabpanel" aria-labelledby="v-pills-partslists-tab">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="page-header clearfix">
                          <h2 class="pull-left">Bill of parts</h2>
                          <a href="#" data-toggle="modal" data-target="#form_bom_add" class="btn btn-success pull-right">Add BoM</a>
                      </div>
                      <?php
                      // Include config file
                      //require_once 'includes/database_inc.php';
                      // Attempt select query execution
                      $sqlc = "SELECT * FROM boms";
                      if($resultc = mysqli_query($conn, $sqlc)){
                          if(mysqli_num_rows($resultc) > 0){
                              echo "<table class='table table-bordered table-striped'>";
                                  echo "<thead>";
                                      echo "<tr>";
                                          echo "<th>BoM ID</th>";
                                          echo "<th>Project ID</th>";
                                          echo "<th>Part Number</th>";
                                          echo "<th>Qty. </th>";
                                          echo "<th>Notes</th>";
                                          echo "<th>Action</th>";
                                      echo "</tr>";
                                  echo "</thead>";
                                  echo "<tbody>";
                                  while($rowc = mysqli_fetch_array($resultc)){
                                      echo "<tr>";
                                          echo "<td>" . $rowc['bom_id'] . "</td>";
                                          echo "<td>" . $rowc['bom_projectID'] . "</td>";
                                          echo "<td>" . $rowc['bom_partNumber'] . "</td>";
                                          echo "<td>" . $rowc['bom_qty'] . "</td>";
                                          echo "<td>" . $rowc['bom_notes'] . "</td>";
                                          echo "<td>";
                                              echo "<a href='parts_read.php?part_id=". $rowc['bom_id'] ."' title='Additional Information' data-toggle='tooltip'><span class='fab fa-readme fa-lg'></span></a>";
                                              echo "<a href='update.php?part_id=". $rowc['bom_id'] ."' title='Update Record' data-toggle='tooltip'><span class='fas fa-edit fa-lg'></span></a>";
                                              echo "<a href='parts_delete.php?part_id=". $rowc['bom_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fas fa-minus-circle fa-lg'></span></a>";
                                          echo "</td>";
                                      echo "</tr>";
                                  }
                                  echo "</tbody>";
                              echo "</table>";
                              // Free result set
                              mysqli_free_result($resultc);
                          } else{
                              echo "<p class='lead'><em>No records were found.</em></p>";
                          }
                      } else{
                          echo "ERROR: Could not able to execute $sqlc. " . mysqli_error($conn);
                      }

                      // Close connection
                    mysqli_close($conn);
                      ?>
                  </div>
              </div>
          </div>
        </div>        <!--BOM END -->


        <div class="tab-pane fade" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab">
          <h1>products</h1>

        </div>

        <div class="tab-pane fade" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab">


        </div>
      </div>
    </div>


  </div>
</div>
