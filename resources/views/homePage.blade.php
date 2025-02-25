@extends('layout.layoutGroover')

@section('content')
<main id="home-main">
    <div id="home-left">
        <div class="concept-title">
            <h1>Groovie</h1>
            <h2>L'Expérience de la mobilité durable :</h2>
        </div>

        <div id="concept-content">
            <p> <b style="font-size: 34px">Groovie</b>, <br> est une application, conçue pour réduire l'impact environnemental des transports liés aux festivals. <br> 
                Elle centralise des offres de transport durable à pris réduit, grâce à des acteurs du secteur. <br>
                Cela permet aux festivaliers de réserver facilement des trajets tout en accumulant des crédits réutilisables 
                auprès des partenaires. <br> En intégrant des expériences ludiques, Groovie rend le transport plus attractif 
                et en fait une part intégrante de l'expérience du festival. <br> L'objectif est d'encourager des habitudes de mobilité 
                durable chez les utilisateurs, en commençant par les festivals avant de s'étendre à d'autres types d'événements.</p>
        </div>
    </div>

    <div id="home-right">
        <div id="home-actu">
            <div class="actu-title">
                <div id="actu-picto">
                    <svg width="26" height="21" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.2375 0H2.7625C1.2389 0 0 1.0465 0 2.33333V18.6667C0 19.9535 1.2389 21 2.7625 21H23.2375C24.7611 21 26 19.9535 26 18.6667V2.33333C26 1.0465 24.7611 0 23.2375 0ZM23.2375 18.6667H2.7625C2.6884 18.6667 2.6377 18.648 2.6156 18.648C2.61245 18.648 2.59998 18.6407 2.59998 18.6376L2.58458 2.57708C2.58446 2.45391 2.63933 2.33333 2.7625 2.33333H23.2375C23.2547 2.33353 23.4001 2.49341 23.4002 2.51061L23.4154 18.4229C23.4155 18.5461 23.3607 18.6667 23.2375 18.6667Z" fill="white"/>
                        <path d="M4.875 8.03792C4.875 5.99828 6.52846 4.34482 8.5681 4.34482H9.3069C11.3465 4.34482 13 5.99828 13 8.03792C13 10.0776 11.3465 11.731 9.3069 11.731H8.5681C6.52846 11.731 4.875 10.0776 4.875 8.03792ZM14.3542 14.1931H6.10604C5.42615 14.1931 4.875 14.7442 4.875 15.4241C4.875 16.104 5.42615 16.6552 6.10603 16.6552H19.894C20.5738 16.6552 21.125 16.104 21.125 15.4241C21.125 14.7442 20.5738 14.1931 19.894 14.1931H15.7083H14.3542ZM15.7083 10.5C15.7083 9.82011 16.2595 9.26896 16.9394 9.26896H19.894C20.5738 9.26896 21.125 9.82011 21.125 10.5C21.125 11.1799 20.5738 11.731 19.894 11.731H16.9394C16.2595 11.731 15.7083 11.1799 15.7083 10.5ZM15.7083 5.57585C15.7083 4.89597 16.2595 4.34482 16.9394 4.34482H19.894C20.5738 4.34482 21.125 4.89597 21.125 5.57585C21.125 6.25573 20.5738 6.80689 19.894 6.80689H16.9394C16.2595 6.80689 15.7083 6.25573 15.7083 5.57585Z" fill="white"/>
                    </svg>
                </div>
                <h2>Dernières actualités</h2>
            </div>
        </div>

        <div id="home-fest">
            <div class="fest-left">
                <div class="festival-picto">
                    <svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.17676 9.94113H22.8238M1.17676 9.94113V21.847C1.17676 23.3623 1.17676 24.12 1.4717 24.699C1.73112 25.2081 2.14505 25.6221 2.65417 25.8815C3.23188 26.1764 3.98952 26.1764 5.50211 26.1764H18.4998C20.0124 26.1764 20.7687 26.1764 21.3464 25.8815C21.8551 25.6217 22.2691 25.2077 22.5289 24.699C22.8238 24.12 22.8238 23.365 22.8238 21.8524V9.94113M1.17676 9.94113V8.85878C1.17676 7.34349 1.17676 6.58584 1.4717 6.00678C1.73146 5.49672 2.14411 5.08407 2.65417 4.82431C3.23323 4.52937 3.99088 4.52937 5.50617 4.52937H6.58852M22.8238 9.94113V8.85472C22.8238 7.34213 22.8238 6.58449 22.5289 6.00678C22.2695 5.49766 21.8555 5.08373 21.3464 4.82431C20.7673 4.52937 20.0097 4.52937 18.4944 4.52937H17.4121M6.58852 4.52937H17.4121M6.58852 4.52937V1.82349M17.4121 4.52937V1.82349M15.3826 18.0588H12.0003M12.0003 18.0588H8.61793M12.0003 18.0588V14.6764M12.0003 18.0588V21.4411" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2>Liste des festivals</h2>
            </div>
            <form action="{{route('festivals.index')}}" method="GET" class="arrow">
                <button type="submit" id="redirect-fest">
                    <svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.7307 0.727051L11.2724 2.23116L14.652 5.68383L0.59082 5.69762L0.592888 7.81907L14.6159 7.80528L11.293 11.2314L12.7576 12.7271L18.5908 6.71273L12.7307 0.727051Z" fill="#1E1E1E"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</main>
@endsection
