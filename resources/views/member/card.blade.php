<x-facing-layout>
    <div class="d-flex flex-wrap pb-3 justify-content-around">
        <div id="logo-div">
            <img src="/img/logo.png">
            <div id="logo-title">
                <p class="text-nowrap">Sport Ardent</p>
                <small>Club inclusif</small>
            </div>
        </div>
        <h2 class="text-nowrap" style="position: relative; top: 10px;">Saison {{ $season }}</h2>
    </div>
    <h5 class="text-center fst-italic pb-4">Carte de membre</h5>
    <div class="text-center">
        @php $paid = $member->has_paid_registration() @endphp
        <h3>{{ $member->first_name }} <span style="font-variant: small-caps">{{ $member->last_name }}</span>
        </h3>
        <p>
            @if ($paid)
                est en ordre d'inscription
            @else
                n'est pas en ordre d'inscription
            @endif
        </p>
        <div>
            @if ($paid)
                <i class="fa-regular fa-circle-check"></i>
            @else
                <i class="fa-regular fa-circle-xmark"></i>
            @endif
        </div>
        @if (!$details && $paid)
            <a href="{{ route('card.details', ['member' => $member]) }}" class="btn btn-secondary mt-4">
                Afficher les détails
            </a>
        @endif
        @if ($details && $paid)
            <ul class="text-start mt-3 mx-5 list-unstyled">
                @foreach (['cotisation', 'badminton', 'natation'] as $section)
                    @php $payment_method = $member->current_payment_method($section) @endphp
                    @if ($payment_method !== null)
                        <li class="mb-1">
                            {{ ucfirst($section) }}
                            @if ($payment_method->type === App\PaymentMethodType::Subscription)
                                – abonnement
                            @elseif ($payment_method->type === App\PaymentMethodType::Card)
                                – carte :
                                @if ($payment_method->sessions_left >= 0)
                                    {{ $payment_method->sessions_left }} séances restantes
                                @else
                                    <a href="https://sportardent.be/inscription" target="_blank"
                                        class="text-danger">
                                        {{ -$payment_method->sessions_left }} séances impayées
                                    </a>
                                @endif
                            @endif
                            @if (!($payment_method->type === App\PaymentMethodType::Card && $payment_method->sessions_left < 0))
                                <div class="fst-italic ps-3" style="font-size: 13px">
                                    valable jusqu'au {{ $payment_method->valid_until->format('d/m/Y') }}
                                    </div>
                                @endif
                            </li>
                        @endif
                    @endforeach
            @endif
        </div>
</x-facing-layout>
