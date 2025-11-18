<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carte de membre Sport Ardent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        @font-face {
            font-family: 'SportArdent';
            src: url('/fonts/Esphimere-Bold.ttf.woff') format('woff'),
                url('/fonts/Esphimere-Bold.ttf.svg#Esphimere-Bold') format('svg'),
                url('/fonts/Esphimere-Bold.ttf.eot'),
                url('/fonts/Esphimere-Bold.ttf.eot?#iefix') format('embedded-opentype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Edition';
            src: url('/fonts/Edition.ttf.woff') format('woff'),
                url('/fonts/Edition.ttf.svg#Edition') format('svg'),
                url('/fonts/Edition.ttf.eot'),
                url('/fonts/Edition.ttf.eot?#iefix') format('embedded-opentype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            background-color: white;
        }

        .container {
            background-color: #ededed;
        }

        #logo-div {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        #logo-div img {
            margin-right: 10px;
            max-width: 32px;
            height: auto;
        }

        #logo-title {
            text-align: center;
        }

        #logo-title p {
            position: relative;
            top: 10px;
            margin: 0;
            font-family: SportArdent;
            font-size: 24px;
            font-weight: 600;
            color: rgb(235, 102, 56);
        }

        #logo-title small {
            position: relative;
            top: -3px;
            font-family: Edition;
            font-size: small;
            font-weight: 400;
            color: rgb(135, 17, 53);
        }

        .fa-regular {
            font-size: 5em;
        }

        .fa-circle-check {
            color: darkgreen;
        }

        .fa-circle-xmark {
            color: darkred;
        }
    </style>

    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="container my-5 p-4 rounded" style="max-width: 35em">
        {{ $slot }}
    </div>
</body>

</html>
