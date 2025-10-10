<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create User</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
/* Body */
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: linear-gradient(135deg, #013220, #014421);
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  margin: 0;
}

/* Form card */
.form-container {
  background: #355E3B;
  padding: 2.5rem;
  border-radius: 1rem;
  width: 100%;
  max-width: 400px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.6);
  text-align: center;
  transition: transform 0.3s, box-shadow 0.3s;
}

.form-container:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 35px rgba(0,0,0,0.7);
}

/* Title */
h2 {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 2rem;
  color: #BCB88A;
  text-shadow: 0 1px 2px rgba(0,0,0,0.3);
}

/* Error */
.error {
  background: #8A9A5B;
  color: #013220;
  padding: 0.7rem;
  border-radius: 0.5rem;
  font-size: 0.95rem;
  margin-bottom: 1.5rem;
  border: 1px solid #BCB88A;
  text-align: left;
}

/* Form */
form {
  display: flex;
  flex-direction: column;
  gap: 1.2rem;
}

.form-group {
  display: flex;
  flex-direction: column;
  text-align: left;
}

.form-group label {
  font-size: 1rem;
  font-weight: 600;
  color: #BCB88A;
  margin-bottom: 0.4rem;
}

/* Input wrappers */
.input-wrapper,
.password-wrapper,
.select-wrapper {
  position: relative;
  display: flex;
  align-items: center;
  width: 100%;
}

input,
select {
  width: 100%;
  padding: 0.65rem 0.8rem;
  border-radius: 0.5rem;
  border: 1px solid #8A9A5B;
  font-size: 1rem;
  outline: none;
  background: #E6ECD7;
  color: #013220;
  transition: border 0.3s, box-shadow 0.3s;
  box-sizing: border-box;
}

input::placeholder {
  color: #355E3B;
  font-style: italic;
}

input:focus,
select:focus {
  border-color: #BCB88A;
  box-shadow: 0 0 0 3px rgba(188,184,138,0.25);
}

/* Toggle password */
.toggle-password {
  position: absolute;
  right: 12px;
  cursor: pointer;
  color: #355E3B;
  font-size: 1rem;
  transition: color 0.3s;
}

.toggle-password:hover {
  color: #BCB88A;
}

/* Buttons */
button {
  background: #014421;
  color: #BCB88A;
  border: none;
  padding: 0.85rem;
  border-radius: 0.5rem;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s, transform 0.2s, box-shadow 0.3s;
}

button:hover {
  background: #013220;
  transform: scale(1.03);
  box-shadow: 0 0 12px rgba(0,0,0,0.5);
}

/* Cancel link */
.cancel-btn {
  display: inline-block;
  background: #8A9A5B;
  color: #013220;
  text-decoration: none;
  padding: 0.85rem;
  border-radius: 0.5rem;
  font-weight: 600;
  text-align: center;
  transition: background 0.3s, transform 0.2s, box-shadow 0.3s;
}

.cancel-btn:hover {
  background: #BCB88A;
  color: #013220;
  transform: scale(1.03);
  box-shadow: 0 0 12px rgba(0,0,0,0.5);
}
</style>
</head>
<body>
<div class="form-container">
  <h2>Create User</h2>

  <?php if(isset($error)): ?>
    <div class="error">
      <?= html_escape($error); ?>
    </div>
  <?php endif; ?>

  <form method="POST" action="<?= site_url('users/create'); ?>">

    <div class="form-group">
      <label for="username">Username</label>
      <div class="input-wrapper">
        <input type="text" name="username" id="username" placeholder="Enter username" required>
      </div>
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <div class="input-wrapper">
        <input type="email" name="email" id="email" placeholder="Enter email" required>
      </div>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <div class="password-wrapper">
        <input type="password" name="password" id="password" placeholder="Enter password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>
    </div>

    <div class="form-group">
      <label for="role">Role</label>
      <div class="select-wrapper">
        <select name="role" id="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>
    </div>

    <button type="submit">Create User</button>
    <a href="<?= site_url('users'); ?>" class="cancel-btn">Cancel</a>
  </form>
</div>

<script>
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function () {
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);

  this.classList.toggle('fa-eye');
  this.classList.toggle('fa-eye-slash');
});
</script>
</body>
</html>
