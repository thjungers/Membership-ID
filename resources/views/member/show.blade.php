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
            <h1>{{ $member->first_name }} <span style="font-variant: small-caps">{{ $member->last_name }}</span></h1>
            <form 
                action="/members/{{ $member->id }}" 
                method="POST" 
                class="btn-group" 
                x-data="{}" 
                x-on:submit="if(!confirm('Supprimer ce membre?')) $event.preventDefault()"
            >
                <a href="/members/{{ $member->id }}/edit" class="btn btn-primary" title="Modifier la fiche du membre">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <a href="/m/{{ $member->qr_key }}" class="btn btn-info" target="_blank" title="Afficher la carte du membre">
                    <i class="fa-regular fa-eye"></i>
                </a>
                @method("DELETE")
                <button class="btn btn-danger" type="submit" title="Supprimer le membre">
                    <i class="fa-regular fa-trash-can"></i>
                </button>
            </form>
        </div>
    </div>
</body>
</html>