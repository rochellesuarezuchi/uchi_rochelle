<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Page</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
/* Body */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #013220, #014421);
    min-height: 100vh;
    margin: 0;
    color: #E6ECD7;
}

/* Card */
.card {
    background: #355E3B;
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 8px 25px rgba(0,0,0,0.6);
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 35px rgba(0,0,0,0.7);
}

/* Header */
.header h1 {
    font-size: 2rem;
    font-weight: 700;
    color: #BCB88A;
}

.header p {
    color: #E6ECD7;
    margin-top: 0.3rem;
}

/* Buttons */
.btn-logout {
    background: #014421;
    color: #BCB88A;
    font-weight: 600;
    padding: 0.65rem 1.2rem;
    border-radius: 0.5rem;
    transition: background 0.3s, transform 0.2s, box-shadow 0.3s;
    text-align: center;
    display: inline-block;
}

.btn-logout:hover {
    background: #013220;
    transform: scale(1.03);
    box-shadow: 0 0 12px rgba(0,0,0,0.5);
}

/* Profile Avatar */
.profile-avatar {
    width: 50px;
    height: 50px;
    background: #014421;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.25rem;
    color: #BCB88A;
}

/* Text */
.card h3 {
    font-size: 1.2rem;
    font-weight: 600;
    color: #BCB88A;
}

.card p,
.card span {
    color: #E6ECD7;
}

/* Role badge */
.role-badge {
    display: inline-flex;
    padding: 0.2rem 0.6rem;
    border-radius: 0.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    background: #014421;
    color: #BCB88A;
}

/* Layout */
.flex-gap {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

@media(min-width: 768px) {
    .flex-gap {
        flex-direction: row;
    }
}

/* Footer */
footer {
    text-align: center;
    margin-top: 2rem;
    font-size: 0.85rem;
    color: #BCB88A;
}
</style>
</head>
<body>
<div class="container mx-auto px-4 py-8">

    <!-- Header -->
    <div class="card flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6 header">
        <div>
            <h1>Welcome, <?= html_escape($logged_in_user['username']); ?>!</h1>
            <p>Your dashboard overview</p>
        </div>
        <div>
            <a href="<?= site_url('auth/logout'); ?>" class="btn-logout">Logout</a>
        </div>
    </div>

    <!-- Combined Card: Profile + System Info -->
    <div class="card flex flex-col md:flex-row gap-8 p-6">
        <!-- Profile Section -->
        <div class="flex flex-col md:w-1/2 gap-4">
            <h3>Profile Information</h3>
            <div class="flex items-center gap-4">
                <div class="profile-avatar"><?= strtoupper(substr($logged_in_user['username'], 0, 1)); ?></div>
                <div>
                    <p><strong>Username:</strong> <?= html_escape($logged_in_user['username']); ?></p>
                    <p><strong>Email:</strong> <?= html_escape($logged_in_user['email']); ?></p>
                    <p><strong>Role:</strong> <span class="role-badge"><?= ucfirst(html_escape($logged_in_user['role'])); ?></span></p>
                </div>
            </div>
        </div>

        <!-- System Info Section -->
        <div class="flex flex-col md:w-1/2 gap-4">
            <h3>System Information</h3>
            <p>Welcome to your user dashboard!</p>
            <p>Here you can view your account details and role information.</p>
            <p>Your role determines the features and access available to you.</p>
            <p>If you encounter any issues or need assistance, please contact your administrator.</p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; <?= date('Y'); ?> User Account. All rights reserved.
    </footer>

</div>
</body>
</html>
