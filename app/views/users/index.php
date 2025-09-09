<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">User Records</h1>
            <a href="<?=site_url('users/create'); ?>" class="flex items-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Add Account
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                            <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="4" class="py-12 text-center text-gray-500">
                                    <p class="text-lg font-semibold">No user records found.</p>
                                    <p class="mt-2 text-sm">Click the "New User" button to add one!</p>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach (html_escape($users) as $user): ?>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 px-6 text-sm font-mono text-gray-700 whitespace-nowrap"><?=$user['id'];?></td>
                                    <td class="py-4 px-6 text-sm text-gray-900 font-medium whitespace-nowrap"><?=$user['username'];?></td>
                                    <td class="py-4 px-6 text-sm text-gray-600 whitespace-nowrap"><?=$user['email'];?></td>
                                    <td class="py-4 px-6 text-sm font-medium text-center whitespace-nowrap">
                                        <div class="flex items-center justify-center space-x-5">
                                            <a href="<?=site_url('users/update/'.$user['id']); ?>" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Edit</a>
                                            <a href="<?=site_url('users/delete/'.$user['id']); ?>" class="text-red-600 hover:text-red-800 transition-colors duration-200">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</body>
</html>