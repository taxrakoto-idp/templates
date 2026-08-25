<?php
declare(strict_types=1);

function appEnvironment(string $name, string $fallback): string
{
    $value = getenv($name);

    return $value === false || $value === '' ? $fallback : $value;
}

function escapeHtml(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$appName = appEnvironment('APP_NAME', ${{ values.name | dump }});
$environment = appEnvironment('APP_ENV', ${{ values.environment | dump }});
$message = appEnvironment('APP_MESSAGE', 'Created with the Backstage PHP golden path');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= escapeHtml($appName) ?></title>
    <style>
        body {
            align-items: center;
            background: #f4f6f8;
            color: #172b4d;
            display: flex;
            font-family: system-ui, sans-serif;
            justify-content: center;
            margin: 0;
            min-height: 100vh;
        }

        main {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgb(23 43 77 / 12%);
            max-width: 640px;
            padding: 3rem;
            text-align: center;
        }

        .environment {
            color: #6554c0;
            font-weight: 700;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <main>
        <p class="environment"><?= escapeHtml($environment) ?></p>
        <h1><?= escapeHtml($appName) ?></h1>
        <p><?= escapeHtml($message) ?></p>
        <p>Replace <code>index.php</code> with your application and push it to Gitea.</p>
    </main>
</body>
</html>
