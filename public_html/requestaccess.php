<?php include_once('templates/header.php') ?>

    <section>

      <!-- jumbotron -->
      <div class="jumbotron">
          <h1>Welcome</h1>
          <iframe src="http://free.timeanddate.com/clock/i68hj74t/n137/fs24/tct/pct/tt0/tw1/tm1/tb4" frameborder="0" width="210" height="57" allowTransparency="true"></iframe>
          <p></p>
          <div class="row mx-auto">
            <h3 class="page-title mx-auto">Request Access</h3>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="container">
        <div class="col-md-8 mx-auto">
          <form action="sql/requestaccess_sql.php" method="POST">
          <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname"  placeholder="First Name">
          </div>
          <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname"  placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="user_email">Email</label>
            <input type="text" class="form-control" id="user_email" name="user_email"  placeholder="Email">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"  placeholder="User Name">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
          </div>
          <div class="form-group">
            <label for="initials">Initials</label>
            <input type="text" class="form-control" id="initials" name="initials"  placeholder="Initials">
          </div>

          <button type="submit" name="submit"  class="btn btn-primary">Request</button>
        </form>
        </div>

      </div>
    </section>



<?php include_once('templates/footer.php') ?>
