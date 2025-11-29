<x-mail::message>
Bonjour {{ $member->first_name }},

Toute l'équipe de Sport Ardent est ravie de te compter parmi nous pour cette nouvelle
saison {{ $season }} !

Pour officialiser ton inscription, tu trouveras en pièce jointe ta nouvelle carte de 
membre virtuelle.

Cette carte, au format PDF, est ton passeport pour la saison. On te conseille de 
l'enregistrer directement sur ton téléphone pour l'avoir toujours à portée de main !

Elle remplit deux fonctions essentielles.

# Avantages Partenaires

Elle te permet de prouver ton affiliation à Sport Ardent. Montre-la simplement à nos 
partenaires pour bénéficier des réductions et avantages négociés pour toi !

Un QR code sur la carte permet à nos partenaires de vérifier instantanément sa validité.

# Suivi de tes abonnements et cartes

Tu peux y consulter la date de validité de ta cotisation annuelle, tes abonnements, 
ainsi que le solde restant sur tes cartes de plusieurs séances.

Pour accéder à tes informations personnelles, tu auras besoin de ton code PIN.

<x-mail::panel>
- Ton code PIN : {{ $member->pin }}
- URL vers ta carte : [{{ $url }}]({{ $url }})
</x-mail::panel>

<x-mail::button :url="$url">
Essaye maintenant
</x-mail::button>

Pour consulter l'état de tes paiements, clique sur le lien ci-dessus (ou scanne le QR 
code de ta carte), puis entre ton code PIN.

Nous sommes impatients de te retrouver dans nos sections. On te souhaite une excellente 
saison {{ $season }}, pleine de succès sportifs et de bons moments !

Sportivement,<br>
L'équipe Sport Ardent
</x-mail::message>
