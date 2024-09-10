<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des cartes de membres Sport Ardent</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">Sport Ardent - Gestion des cartes de membres</a>
        </div>
    </nav>
    <div class="container text-center">
        <div class="m-5" x-data="{
            search: '',
            items: [
                @foreach ($members as $member)
                {text: '{{ $member->first_name }} {{ $member->last_name }}', id: {{ $member->id }}},
                @endforeach
            ],
            get filteredItems() {
                return this.items.filter(
                    item => item.text.toLowerCase().includes(this.search.toLowerCase())
                )
            }
        }">
            <div class="list-group text-left">
                <input type="search" class="list-group-item" x-model="search" autofocus>
                <template x-for="item in filteredItems">
                    <a class="list-group-item list-group-item-action" x-text="item.text" x-bind:href="'/members/' + item.id"></a>
                </template>
                {{-- @foreach ($members as $member)
                    <a href="/members/{{ $member->id }}" class="list-group-item list-group-item-action">{{ $member->first_name }} {{ $member->last_name }}</a>
                @endforeach --}}
            </div>
        </div>
    </div>
</body>
</html>