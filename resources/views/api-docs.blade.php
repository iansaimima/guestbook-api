<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook API Documentation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github-dark.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <style>
        .markdown-body {
            box-sizing: border-box;
            min-width: 200px;
            max-width: 980px;
            margin: 0 auto;
            padding: 45px;
        }

        .markdown-body h1 {
            font-size: 2em;
            font-weight: 600;
            padding-bottom: 0.3em;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 16px;
        }

        .markdown-body h2 {
            font-size: 1.5em;
            font-weight: 600;
            padding-bottom: 0.3em;
            border-bottom: 1px solid #e5e7eb;
            margin-top: 24px;
            margin-bottom: 16px;
        }

        .markdown-body h3 {
            font-size: 1.25em;
            font-weight: 600;
            margin-top: 24px;
            margin-bottom: 16px;
        }

        .markdown-body pre {
            background-color: #1f2937;
            border-radius: 6px;
            padding: 16px;
            overflow: auto;
            margin-bottom: 16px;
        }

        .markdown-body code {
            background-color: rgba(175, 184, 193, 0.2);
            padding: 0.2em 0.4em;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
        }

        .markdown-body pre code {
            background-color: transparent;
            padding: 0;
        }

        .markdown-body p {
            margin-bottom: 16px;
        }

        .markdown-body ul, .markdown-body ol {
            padding-left: 2em;
            margin-bottom: 16px;
        }

        .markdown-body li {
            margin-bottom: 0.25em;
        }

        .markdown-body strong {
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="markdown-body bg-white shadow-lg">
        {!! $content !!}
    </div>

    <script>
        hljs.highlightAll();
    </script>
</body>
</html>
