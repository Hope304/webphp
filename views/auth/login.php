<h2>Login</h2>
<?php if (isset($error)) { ?>
<p style="color: red;"><?php echo $error; ?></p>
<?php } ?>
<form method="POST" action="index.php?controller=auth&action=login">
  <label>Email:</label>
  <input type="text" name="username" required>
  <br>
  <label>Password:</label>
  <input type="password" name="password" required>
  <br>
  <button type="submit">Login</button>
</form>