<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Welcome Section */
        .welcome-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome-container h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #007bff;
        }

        .welcome-container p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #555;
        }

        .logout-button {
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-button:hover {
            background-color: #c82333;
        }

        /* Filter Input */
        .filter-container {
            margin-bottom: 20px;
            text-align: right;
        }

        .filter-container input {
            padding: 10px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Learners Table */
        h2.text-center {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            color: #007bff;
        }

        .table-container {
            overflow-x: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            list-style: none;
            /* Remove black dots */
            padding: 0;
            /* Remove default padding */
        }

        .pagination li {
            display: inline-block;
            /* Ensure items are displayed inline */
            margin: 0 5px;
            /* Add spacing between pagination items */
        }

        .pagination a,
        .pagination span {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #007bff;
            transition: background-color 0.3s ease;
            /* Smooth hover effect */
        }

        .pagination a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .pagination .active span {
            background-color: rgba(0, 123, 255, 0.7);
            /* Blue with 70% opacity */
            color: #fff;
            border-color: transparent;
            /* Remove border for active item */
            cursor: default;
            /* Disable pointer cursor */
        }

        .pagination .disabled span {
            color: #ccc;
            /* Style for disabled links */
            pointer-events: none;
            /* Disable click events */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .welcome-container h1 {
                font-size: 20px;
            }

            .welcome-container p {
                font-size: 14px;
            }

            h2.text-center {
                font-size: 18px;
            }

            th,
            td {
                padding: 8px;
                font-size: 14px;
            }

            .filter-container {
                text-align: center;
            }

            .filter-container input {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-container">
            <h1>Welcome, {{ Auth::user()->name }}!</h1>
            <p>You are now logged in as an admin.</p>
            <form method="POST" action="{{ route('logout.admin') }}">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>

        <!-- Filter Input -->
        <div class="filter-container">
            <form method="GET" action="{{ route('admin.dashboard') }}">
                <input type="text" name="filter" placeholder="Search by name or email" value="{{ $filter }}">
                <button type="submit" style="display: none;"></button>
            </form>
        </div>

        <!-- Learners List -->
        <h2 class="text-center">Learners List</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Is Bahraini</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($learners as $learner)
                        <tr>
                            <td>{{ $learner->name }}</td>
                            <td>{{ $learner->email }}</td>
                            <td>{{ $learner->gender }}</td>
                            <td>{{ $learner->phone_number }}</td>
                            <td>{{ $learner->citizen ? 'Yes' : 'No'  }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $learners->appends(['filter' => $filter])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</body>

</html>
