<?php include 'header.php'?>

<form class="d-flex justify-content-center align-items-center flex-column" style="max-width: 500px; margin: 0 auto;">
  <div class="form-group">
    <label for="firstName">First Name</label>
    <input type="text" class="form-control" id="firstName" placeholder="Enter First Name">
  </div>
  <div class="form-group">
    <label for="lastName">Last Name</label>
    <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control-file" id="image">
  </div>
  <div class="form-group">
    <label for="role">Role</label>
    <select class="form-control" id="role">
      <option>Administrator</option>
      <option>User</option>
      <option>Guest</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include 'footer.php'?>