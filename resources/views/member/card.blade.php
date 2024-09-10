<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carte de membre Sport Ardent</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        @font-face {
            font-family: 'SportArdent';
            src:url('/fonts/Esphimere-Bold.ttf.woff') format('woff'),
                url('/fonts/Esphimere-Bold.ttf.svg#Esphimere-Bold') format('svg'),
                url('/fonts/Esphimere-Bold.ttf.eot'),
                url('/fonts/Esphimere-Bold.ttf.eot?#iefix') format('embedded-opentype'); 
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Edition';
            src:url('/fonts/Edition.ttf.woff') format('woff'),
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
            display:flex; 
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
</head>
<body>
    <div class="container my-5 p-4 rounded" style="max-width: 35em">
        <div class="d-flex flex-wrap pb-3 justify-content-around">
            <div id="logo-div">
                <img src="/img/logo.png">
                <div id="logo-title">
                    <p class="text-nowrap">Sport Ardent</p>
                    <small>Club inclusif</small>
                </div>
            </div>
            <h2 class="text-nowrap" style="position: relative; top: 10px;">Saison 2023-2024</h2>
        </div>
        <h5 class="text-center font-italic pb-4">Carte de membre</h3>
        <div class="text-center">
            @php 
                $paid = $member->has_paid_registration() 
            @endphp
            <h3>{{ $member->first_name }} <span style="font-variant: small-caps">{{ $member->last_name }}</span></h3>
            <p>
                @if($paid)
                est en ordre d'inscription
                @else
                n'est pas en ordre d'inscription
                @endif
            </p>
            <div>
                @if($paid) 
                <i class="fa-regular fa-circle-check"></i>
                @else
                <i class="fa-regular fa-circle-xmark"></i>
                @endif
            </div>
        </div>
    </div>
</body>
</html>