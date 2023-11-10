
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your App</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        strong {
            color: #009688;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, {{ucwords($name)}}!</h2>
        
        <p>Your account has been created successfully.</p>

        <p>
            <strong>Username:</strong> {{ ucwords($name) }}<br>
            <strong>Password:</strong> {{ $password }}<br>
            <strong>Role:</strong> {{ ucwords($role) }}<br>
        </p>

        <h3>Permissions:</h3>
        <ul>
            @foreach ($permissions as $permission)
                <li>{{ ucwords($permission) }}</li>
            @endforeach
        </ul>

        <h3>Menu Assignments:</h3>
        <ul>
            @foreach ($menuAssignments as $assignment)
                <li>Category Assigned : {{  getMenuName($assignment['category_id']) }}</li>
            @endforeach
        </ul>

        <p>Thank you for joining us!</p>

        <footer>
            This is an automated email. Please do not reply.
        </footer>
    </div>
</body>
</html>
