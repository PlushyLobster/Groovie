@extends('layout.layoutGroover')

@section ('content')
<main id="detailFest-main">
    <div id="detailFest-left">
        <div id="detailFest-title">
            <div class="festival-picto">
                <svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.17676 9.94113H22.8238M1.17676 9.94113V21.847C1.17676 23.3623 1.17676 24.12 1.4717 24.699C1.73112 25.2081 2.14505 25.6221 2.65417 25.8815C3.23188 26.1764 3.98952 26.1764 5.50211 26.1764H18.4998C20.0124 26.1764 20.7687 26.1764 21.3464 25.8815C21.8551 25.6217 22.2691 25.2077 22.5289 24.699C22.8238 24.12 22.8238 23.365 22.8238 21.8524V9.94113M1.17676 9.94113V8.85878C1.17676 7.34349 1.17676 6.58584 1.4717 6.00678C1.73146 5.49672 2.14411 5.08407 2.65417 4.82431C3.23323 4.52937 3.99088 4.52937 5.50617 4.52937H6.58852M22.8238 9.94113V8.85472C22.8238 7.34213 22.8238 6.58449 22.5289 6.00678C22.2695 5.49766 21.8555 5.08373 21.3464 4.82431C20.7673 4.52937 20.0097 4.52937 18.4944 4.52937H17.4121M6.58852 4.52937H17.4121M6.58852 4.52937V1.82349M17.4121 4.52937V1.82349M15.3826 18.0588H12.0003M12.0003 18.0588H8.61793M12.0003 18.0588V14.6764M12.0003 18.0588V21.4411" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h2>Détails du festival</h2>
        </div>
        <hr>

        <div id="detailFest-infos">
            <div id="detailFest-bloc1">
                <div id="detailFest-nameDate">
                    <h1>{{ $festival->name }}</h1>
                    <p>Dates du {{ $festival->start_datetime }}</p>
                    {{-- <p>Du {{ $festival->start_datetime }} au {{ $festival->end_datetime }}</p> --}}
                </div>

                <div id="detailFest-image">
                    <img src="#" alt="Image du festival">
                </div>

                <div id="detailFest-genreMusic">
                    <p>Genre musical : <br>
                        @if($festival->musicalGenres)
                            @foreach($festival->musicalGenres as $genre)
                                {{ $genre->name }}
                            @endforeach
                        @else
                            Aucun genre musical disponible.
                        @endif
                    </p>
                </div>

                <div id="detailFest-artistes">
                    <p>Artistes présents : <br> XXXXXX, XXXXXXX, XXXXXXXXXXX, XXXXXXXXX</p>
                </div>
            </div>

            <div id="detailFest-bloc2">
                <div id="detailFest-progTitle">
                    <p>Programmation</p>
                </div>

                <div id="detailFest-progText">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum earum minus exercitationem et nesciunt veniam eius quaerat ipsa est ut iusto possimus laudantium, amet laboriosam necessitatibus deleniti accusamus quo dolores?
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="detailFest-right">
        <div id="validTicket-title">
            <div class="picto-ticket">
                <svg width="29" height="21" viewBox="0 0 29 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.0524 16.7474V19.6667M13.0524 1.17778V4.09708M13.0524 8.96258V11.8819M27.2889 1.17778H1.86666V7.01638C1.86666 7.01638 5.93421 7.01638 5.93421 10.4222C5.93421 13.8281 1.86666 13.8281 1.86666 13.8281V19.6667H27.2889V13.8281C27.2889 13.8281 23.2213 13.8281 23.2213 10.4222C23.2213 7.01638 27.2889 7.01638 27.2889 7.01638V1.17778Z"
                        stroke="#000B58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h2>Valider un billet</h2>
        </div>
        <hr>

        <div id="validTicket-formDiv">
            <p>Informations du billet</p>

            <form id="validTicket-form" method="POST">
                @method('POST')
                @csrf
                <div class="validBillet-div">
                    <input type="text" id="validTicket-code" name="validTicket-code" placeholder="Code billet" required>
                    @error('validTicket-code')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="dateScan-div">
                    <div class="validBillet-div">
                        <input type="text" id="validTicket-date" name="validTicket-date" placeholder="Date" required>
                        @error('validTicket-date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="validBillet-div">
                        <div id="validBillet-scanBtn">Scan</div>
                    </div>
                </div>

                <div class="validBillet-div">
                    <input type="password" id="validTicket-password" name="validTicket-password" placeholder="Mot de passe" required>
                    @error('validTicket-password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="validBilletBtn">
                    Confirmer l'inscription
                    <span>
                        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 7.09985L7.625 12.5999L17 1.59985" stroke="#9747FF" stroke-width="3"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button>

                <button id="buyBilletBtn">
                    Acheter
                    <svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 24.057V4.8114H4.9005C4.9005 3.48827 5.38034 2.35558 6.34002 1.41335C7.2997 0.471116 8.45336 0 9.801 0C11.1486 0 12.3023 0.471116 13.262 1.41335C14.2217 2.35558 14.7015 3.48827 14.7015 4.8114H19.602V24.057H0ZM2.45025 21.6513H17.1517V7.2171H14.7015V10.8256H12.2512V7.2171H7.35075V10.8256H4.9005V7.2171H2.45025V21.6513ZM7.35075 4.8114H12.2512C12.2512 4.14983 12.0115 3.58369 11.5321 3.11298C11.0527 2.64226 10.4756 2.4065 9.801 2.4057C9.12636 2.4049 8.54974 2.64066 8.07112 3.11298C7.59251 3.58529 7.35238 4.15144 7.35075 4.8114Z" fill="#010F5C"/>
                    </svg>
                </button>

                <div id="validTicket-scanDiv" class="hidden">
                    <p>Scanner le code barre</p>
                    <div id="validTicket-scan"></div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script>
    const scanBtn = document.getElementById('validBillet-scanBtn');
    const scanDiv = document.getElementById('validTicket-scanDiv');

    scanBtn.addEventListener('click', (event) => {
    event.stopPropagation();
    if (scanDiv.classList.contains('hidden')) {
        scanDiv.classList.remove('hidden');
        scanDiv.classList.add('flex');
    } else {
        scanDiv.classList.remove('flex');
        scanDiv.classList.add('hidden');
    }
});
</script>
@endsection
