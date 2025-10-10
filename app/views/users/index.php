<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>User Management</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
/* Body */
body {
  background: linear-gradient(135deg, #013220, #014421);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Card container */
.card {
  background: #355E3B;
  border-radius: 1rem;
  box-shadow: 0 6px 20px rgba(0,0,0,0.6);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  padding: 2rem;
}
.card:hover {
  transform: translateY(-4px) scale(1.01);
  box-shadow: 0 8px 28px rgba(0,0,0,0.7);
}

/* Buttons */
.btn-primary {
  background: #014421;
  color: #BCB88A;
  font-weight: 600;
  padding: 0.55rem 1.25rem;
  border-radius: 0.5rem;
  transition: transform 0.2s ease, background 0.2s ease;
}
.btn-primary:hover {
  background: #013220;
  transform: scale(1.05);
}
.btn-danger {
  background: #8A9A5B;
  color: #013220;
  font-weight: 600;
  padding: 0.55rem 1.25rem;
  border-radius: 0.5rem;
  transition: transform 0.2s ease, background 0.2s ease;
}
.btn-danger:hover {
  background: #BCB88A;
  transform: scale(1.05);
}

.btn-edit {
  background: #014421;
  color: #BCB88A;
  padding: 0.35rem 0.9rem;
  border-radius: 9999px;
  font-size: 0.85rem;
  font-weight: 500;
  transition: all 0.2s;
}
.btn-edit:hover { background: #013220; transform: scale(1.05); }

.btn-delete {
  background: #8A9A5B;
  color: #013220;
  padding: 0.35rem 0.9rem;
  border-radius: 9999px;
  font-size: 0.85rem;
  font-weight: 500;
  transition: all 0.2s;
}
.btn-delete:hover { background: #BCB88A; transform: scale(1.05); }

<<<<<<< HEAD
/* Table */
table {
  width: 100%;
  border-collapse: collapse;
}
table thead {
  background: #014421;
}
table thead th {
  color: #BCB88A;
  font-weight: 700;
  text-transform: uppercase;
  font-size: 0.75rem;
  letter-spacing: 0.05em;
  padding: 0.75rem 1rem;
  text-align: left;
}
table tbody tr {
  border-bottom: 1px solid rgba(188,184,138,0.3);
}
table tbody tr:hover {
  background: rgba(188,184,138,0.15);
}
table tbody tr td {
  color: #E6ECD7; /* Light color for readability */
  padding: 0.75rem 1rem;
  font-size: 0.9rem;
}

/* Role Tags (pill/oblong) */
.tag-admin, .tag-user {
  display: inline-block;
  padding: 0.25rem 0.75rem;
  border-radius: 9999px; /* pill shape */
  font-size: 0.75rem;
  font-weight: 600;
  text-align: center;
}
/* Welcome box */
.welcome-box {
  display: inline-block;
  background: linear-gradient(to right, #355E3B, #014421);
  color: #BCB88A;
  font-weight: 600;
  padding: 0.6rem 1.2rem;
  border-radius: 0.75rem;
  box-shadow: 0 4px 12px rgba(0,0,0,0.4);
  font-size: 1rem;
  transition: transform 0.2s ease;
}
.welcome-box:hover { transform: scale(1.05); }

/* Search input */
.search-box input {
  width: 100%;
  max-width: 18rem;
  padding: 0.5rem 0.75rem;
  border-radius: 0.5rem;
  border: 1px solid #8A9A5B;
  background: #E6ECD7;
  color: #013220;
  font-size: 0.95rem;
  outline: none;
  transition: border 0.3s, box-shadow 0.3s;
}
.search-box input::placeholder {
  color: #355E3B;
  font-style: italic;
}
.search-box input:focus {
  border-color: #BCB88A;
  box-shadow: 0 0 0 3px rgba(188,184,138,0.25);
}

/* Responsive adjustments */
@media (max-width: 640px) {
  .search-box { max-width: 100%; }
}
=======
  .welcome-box {
    display: inline-block;
    background: linear-gradient(to right, #3b82f6, #6366f1);
    color: white;
    font-weight: 600;
    padding: 0.6rem 1.2rem;
    border-radius: 0.75rem;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.6);
    font-size: 1rem;
    transition: transform 0.2s ease;
  }
  .welcome-box:hover { transform: scale(1.05); }

  
.pagination a {
    min-width: 2.5rem; 
    text-align: center;
}

>>>>>>> 33995cc561271d7c69569d71fbcfb96fab02b1fc
</style>
</head>
<body class="flex justify-center p-4 min-h-screen">

<div class="container card mx-auto w-full">

  <!-- Dashboard Header -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
    <h2 class="text-2xl font-bold text-BCB88A">
      <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
    </h2>
    <a href="<?=site_url('auth/logout'); ?>" class="btn-danger w-full md:w-auto text-center">Logout</a>
  </div>

  <!-- Welcome Box -->
  <?php if(!empty($logged_in_user)): ?>
    <div class="mb-6">
      <span class="welcome-box">
        Welcome: <?= html_escape($logged_in_user['username']); ?>
      </span>
    </div>
  <?php else: ?>
    <p class="mb-6 text-red-600 font-semibold">Logged in user not found</p>
  <?php endif; ?>

  <!-- Search + Add -->
  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4 flex-wrap">
    <form action="<?=site_url('users');?>" method="get" class="flex flex-col sm:flex-row items-start sm:items-center gap-3 w-full sm:w-auto">
      <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
      <div class="search-box">
        <input type="text" name="q" placeholder="Search users..." value="<?=html_escape($q);?>">
      </div>
      <button type="submit" class="btn-primary w-full sm:w-auto">Search</button>
    </form>

    <a href="<?=site_url('users/create'); ?>" class="btn-primary flex items-center justify-center shadow-md hover:scale-105 w-full sm:w-auto">
      Add Account
    </a>
  </div>

  <!-- Table -->
  <div class="rounded-xl overflow-hidden shadow-lg">
    <div class="overflow-x-auto">
      <table class="min-w-full">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($users)): ?>
            <tr>
              <td colspan="4" class="py-12 text-center font-semibold text-E6ECD7">
                No user records found.
              </td>
            </tr>
          <?php else: ?>
            <?php foreach (html_escape($users) as $user): ?>
              <tr>
                <td><?=$user['username'];?></td>
                <td><?=$user['email'];?></td>
                <td>
                  <span class="<?= $user['role'] === 'admin' ? 'tag-admin' : 'tag-user'; ?>">
                    <?= ucfirst(html_escape($user['role'])); ?>
                  </span>
                </td>
                <td class="text-center">
                  <div class="flex flex-col sm:flex-row items-center justify-center gap-2 sm:gap-3">
                    <a href="<?=site_url('users/update/'.$user['id']); ?>" class="btn-edit">Edit</a>
                    <a href="<?=site_url('users/delete/'.$user['id']); ?>" class="btn-delete"
                       onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">Delete</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>

      <!-- Pagination -->
      <div class="flex justify-center items-center py-6 space-x-2 flex-wrap">
        <?= $page; ?>
      </div>
    </div>
  </div>

</div>
</body>
</html>
