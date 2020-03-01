@if($company_address)
    <p class="company-add">
        @if($company_address->addresses[0]['address_street_1'])
            {{$company_address->addresses[0]['address_street_1']}} <br />
        @endif

        @if($company_address->addresses[0]['address_street_2'])
            {{$company_address->addresses[0]['address_street_2']}} <br>
        @endif
        @if($company_address->addresses[0]['city'])
            {{$company_address->addresses[0]['city']}}
        @endif
        @if($company_address->addresses[0]['state'])
            {{$company_address->addresses[0]['state']}}
        @endif
        @if($company_address->addresses[0]['zip'])
            {{$company_address->addresses[0]['zip']}}
        @endif
        @if($company_address->addresses[0]['country'])
            {{$company_address->addresses[0]['country']->name}} <br>
        @endif
    </p>
@endif

@if($invoice->user->company)
    <h1 style="text-align: left; color:#7900D8"> {{$invoice->user->company->name}}</h1>
    <p class="company-add"><a href="mailto:odran@webforger.fr">odran@webforger.fr</a></p>
@endif
