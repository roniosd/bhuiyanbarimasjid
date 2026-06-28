<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error {{ $statusCode ?? 'Error' }}</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #1f2937;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .error-container {
            max-width: 600px;
            padding: 2rem;
            background-color: #ffffff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-radius: 1rem;
        }

        .status-code {
            font-size: 6rem;
            font-weight: 700;
            color: #ef4444;
        }

        .message {
            font-size: 1.25rem;
            margin-top: 1rem;
        }

        .buttons {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            background-color: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2563eb;
        }

        .btn-secondary {
            background-color: #6b7280;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <div class="status-code">{{ $statusCode ?? 'Error' }}</div>
        <div class="message">
            {{ $exception->getMessage() ?: 'Something went wrong. Please try again later.' }}
        </div>
        <div class="buttons">
            <a href="{{ url('/') }}" class="btn">Go to Homepage</a>
            <a href="javascript:history.back()" class="btn btn-secondary">Go Back</a>
        </div>
    </div>
</body>

</html>