<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .card {
            width: 450px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        * {
            font-family: sans-serif;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
        h1{
            color:red;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Oops! Something went wrong.</h1>
        <p style="background-color: red; padding: 8px; border-radius:4px; color:#fff;">Issue → {{ $error }}</p>
        <p style="color: #888;">Line Number: {{ $lineNumber }}</p>
        <p>We're sorry, but an unexpected error occurred. Don't worry, it can be fixed. Please contact the developer.</p>
        <a href="#" onclick="goBack()">Go Back</a>
        <a href="#" onclick="reloadPage()">Reload Page</a>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }

        function reloadPage() {
            location.reload();
        }
    </script>
</body>
</html>
