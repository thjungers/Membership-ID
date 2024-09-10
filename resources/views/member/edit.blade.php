<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des cartes de membres Sport Ardent</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">Sport Ardent - Gestion des cartes de membres</a>
        </div>
    </nav>
    <div class="container text-center">
        <div class="m-5">
            <form
                action="/members/{{ $member?->id }}"
                method="POST"
            >
                @csrf
                @if ($member)
                    @method("PATCH")                    
                @endif
                <input 
                    type="text" class="form-control" required
                    name="first_name" value="{{ $member?->first_name }}"
                    placeholder="Prénom"
                >
                <input 
                    type="text" class="form-control" required
                    name="last_name" value="{{ $member?->last_name }}"
                    placeholder="Nom de famille"
                    style="font-variant: small-caps"
                >
                <input 
                    type="email" class="form-control" required
                    name="email" value="{{ $member?->email }}"
                    placeholder="Adresse e-mail"
                >
                <button type="submit" class="form-control btn btn-primary">{{ $member ? 'Modifier' : 'Créer' }}</button>
            </form>
        </div>
    </div>
</body>
</html>