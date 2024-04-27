<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $app['title']; ?></title>

    <link rel="stylesheet" href="app/style/bootstrap.min.css">
    <link rel="stylesheet" href="app/style/bootstrap-icons.css">
    <link rel="stylesheet" href="app/style/datatables.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=News+Cycle:wght@400;700&family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="app/style/default.css">

    <style>
        body {
            font-family: "News Cycle", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        img {
            max-width: 100%;
        }

        a {
            text-decoration: none;
        }

        ul.pagination {
            margin: 2rem auto !important;
            justify-content: center !important;
        }

        time {
            font-weight: bold;
        }
    </style>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MZSSKV52P7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-MZSSKV52P7');
    </script>
</head>