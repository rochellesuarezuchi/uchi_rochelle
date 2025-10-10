<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Update User</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
  body {
    background: linear-gradient(135deg, #013220, #014421);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .card {
    background: #355E3B;
    border-radius: 1rem;
    box-shadow: 0 8px 25px rgba(0,0,0,0.6);
    padding: 2.5rem;
    max-width: 450px;
    width: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .card:hover {
    transform: translateY(-4px) scale(1.02);
    box-shadow: 0 12px 35px rgba(0,0,0,0.7);
  }

  h2 {
    color: #BCB88A;
    text-align: center;
  }

  .form-label {
    font-weight: 600;
    color: #E6ECD7;
    margin-bottom: 0.4rem;
    display: inline-block;
  }

  /* Themed textboxes for dark card */
input[type="text"],
input[type="email"] {
  width: 100%;
  padding: 0.65rem 0.75rem;
  border-radius: 0.5rem; /* slightly smaller radius for cleaner look */
  border: 1px solid #BCB88A;
  background: #E6ECD7; /* light background for contrast */
  color: #013220; /* dark text for readability */
  font-size: 1rem;
  font-weight: 500;
  outline: none;
  box-shadow: inset 0 2px 4px rgba(0,0,0,0.15);
  transition: all 0.3s ease;
}

input::placeholder {
  color: #8A9A5B; /* slightly darker placeholder */
  font-style: italic;
}

input:focus {
  border-color: #BCB88A;
  box-shadow: 0 0 0 3px rgba(188,184,138,0.3);
  background: #F2F6E9; /* slightly lighter on focus */
}


  /* Buttons */
  .btn {
    font-weight: 600;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    padding: 0.65rem 1.25rem;
    text-align: center;
  }
  .btn-primary {
    background: #014421;
    color: #BCB88A;
  }
  .btn-primary:hover {
    background: #013220;
    transform: scale(1.05);
    box-shadow: 0 0 12px rgba(188,184,138,0.4);
  }
  .btn-secondary {
    background: #8A9A5B;
    color: #013220;
  }
  .btn-secondary:hover {
    background: #BCB88A;
    transform: scale(1.05);
  }

  /* Error box */
  .error-box {
    background: #fee2e2;
    border: 1px solid #fca5a5;
    color: #b91c1c;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
    margin-bottom: 1rem;
    font-size: 0.95rem;
  }

  @media (max-width: 480px) {
    .card { padding: 1.5rem !important; }
    h2 { font-size: 1.5rem; }
  }
</style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">

<div class="card">
  <h2 class="text-3xl font-bold mb-6">Update User</h2>

  <?php if(isset($error)): ?>
    <div class="error-box">
      <?= html_escape($error); ?>
    </div>
  <?php endif; ?>

  <form action="<?=site_url('users/update/'.segment(4));?>" method="POST" class="space-y-5">
    <!-- Username -->
    <div>
      <label for="username" class="form-label">Username</label>
      <input 
        type="text" id="username" name="username"
        value="<?= html_escape($user['username']);?>" required
        placeholder="Enter username"
      />
    </div>

    <!-- Email -->
    <div>
      <label for="email" class="form-label">Email</label>
      <input 
        type="email" id="email" name="email"
        value="<?= html_escape($user['email']);?>" required
        placeholder="Enter email"
      />
    </div>

    <!-- Role (unchanged style) -->
    <div>
      <label for="role" class="form-label">Role</label>
      <select name="role" id="role" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
        <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
      </select>
    </div>

    <!-- Buttons -->
    <div class="flex gap-4">
      <button type="submit" class="btn btn-primary flex-1">Update User</button>
      <a href="<?= site_url('users'); ?>" class="btn btn-secondary flex-1">Cancel</a>
    </div>
  </form>
</div>

</body>
</html>
