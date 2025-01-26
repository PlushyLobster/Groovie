@extends('layout.layoutGroover')

@section('content')
<main id="mesFestivals-main">
    <div id="mesFestivals-left">
        <div id="mesFestivals-header">
            <div id="mesFestivals-title">
                <span>
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.18182 26C1.75303 24.3967 2.13239 22.7448 2.31991 21.0444C2.50742 19.344 2.62048 17.6375 2.65909 15.925C1.89091 15.6 1.25588 15.0583 0.754 14.3C0.252121 13.5417 0.000787879 12.675 0 11.7V9.1C2.26515 8.27667 4.57482 7.02 6.929 5.33C9.28318 3.64 11.3068 1.86333 13 0C14.6939 1.86333 16.718 3.64 19.0722 5.33C21.4264 7.02 23.7356 8.27667 26 9.1V11.7C26 12.675 25.7487 13.5417 25.246 14.3C24.7433 15.0583 24.1083 15.6 23.3409 15.925C23.3803 17.6367 23.4938 19.3431 23.6813 21.0444C23.8688 22.7457 24.2478 24.3975 24.8182 26H1.18182ZM5.79091 9.1H20.2091C18.6727 8.14667 17.2892 7.16647 16.0585 6.1594C14.8279 5.15233 13.8084 4.2692 13 3.51C12.1924 4.26833 11.1729 5.15147 9.94145 6.1594C8.71 7.16733 7.32648 8.14753 5.79091 9.1ZM15.9545 13.65C16.447 13.65 16.8657 13.4606 17.2108 13.0819C17.5559 12.7032 17.7281 12.2425 17.7273 11.7H14.1818C14.1818 12.2417 14.3544 12.7023 14.6995 13.0819C15.0445 13.4615 15.4629 13.6509 15.9545 13.65ZM10.0455 13.65C10.5379 13.65 10.9566 13.4606 11.3017 13.0819C11.6468 12.7032 11.819 12.2425 11.8182 11.7H8.27273C8.27273 12.2417 8.44527 12.7023 8.79036 13.0819C9.13545 13.4615 9.55382 13.6509 10.0455 13.65ZM4.13636 13.65C4.62879 13.65 5.04755 13.4606 5.39264 13.0819C5.73773 12.7032 5.90988 12.2425 5.90909 11.7H2.36364C2.36364 12.2417 2.53618 12.7023 2.88127 13.0819C3.22636 13.4615 3.64473 13.6509 4.13636 13.65ZM4.31364 23.4H7.475C7.65227 22.1 7.79015 20.8108 7.88864 19.5325C7.98712 18.2542 8.06591 16.965 8.125 15.665C7.94773 15.5567 7.77045 15.4427 7.59318 15.3231C7.41591 15.2035 7.24848 15.0575 7.09091 14.885C6.79545 15.21 6.47558 15.4756 6.13127 15.6819C5.78697 15.8882 5.41745 16.045 5.02273 16.1525C4.98333 17.3875 4.91439 18.6065 4.81591 19.8094C4.71742 21.0123 4.55 22.2092 4.31364 23.4ZM9.86818 23.4H16.1318C15.9742 22.2083 15.8513 21.0167 15.7631 19.825C15.6748 18.6333 15.6008 17.4308 15.5409 16.2175C15.0288 16.1742 14.5612 16.039 14.1381 15.8119C13.715 15.5848 13.3356 15.2867 13 14.9175C12.6652 15.2858 12.2763 15.584 11.8335 15.8119C11.3908 16.0398 10.9326 16.175 10.4591 16.2175C10.4 17.4308 10.3263 18.6333 10.2381 19.825C10.1498 21.0167 10.0265 22.2083 9.86818 23.4ZM18.525 23.4H21.6864C21.45 22.2083 21.2826 21.0115 21.1841 19.8094C21.0856 18.6073 21.0167 17.3884 20.9773 16.1525C20.5833 16.0442 20.2091 15.8869 19.8545 15.6806C19.5 15.4743 19.1848 15.2091 18.9091 14.885C18.7515 15.0583 18.5841 15.2048 18.4068 15.3244C18.2295 15.444 18.0523 15.5575 17.875 15.665C17.9341 16.965 18.018 18.2542 18.1267 19.5325C18.2355 20.8108 18.3682 22.1 18.525 23.4ZM21.8636 13.65C22.3561 13.65 22.7748 13.4606 23.1199 13.0819C23.465 12.7032 23.6372 12.2425 23.6364 11.7H20.0909C20.0909 12.2417 20.2635 12.7023 20.6085 13.0819C20.9536 13.4615 21.372 13.6509 21.8636 13.65Z" fill="white"/>
                    </svg>                       
                </span>
                <h2>Mes festivals</h2>
            </div>
            <div id="mesFestivals-filter">
                <button class="festFilter">
                    A venir
                </button>

                <button class="festFilter">
                    En cours
                </button>

                <button class="festFilter">
                    Historique
                </button>
            </div>
        </div>
        <div id="mesFestivals-festContainer">
            <hr id="mesFestivals-hr">
            <div class="mesFestivals-fest">
                <div class="mesFestivals-fest-mainInfoContainer">
                    <div class="mesFestivals-fest-mainInfo">
                        <div class="mesFestivals-festName">
                            <p>Nom Festival</p>
                            <h3>Nom du festival</h3>
                        </div>

                        <div class="mesFestivals-festGenre">
                            <p>Genre Musical</p>
                            <h4>Hard rock</h4>
                        </div>

                        <div class="mesFestivals-festDate">
                            <p>Dates</p>
                            <h4>Du 17 au 28 mars 2025</h4>
                        </div>

                        <div class="mesFestivals-arrow">
                            <span>
                                <svg width="24" height="18" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6863 12.6818L11.2169 11.1264L14.6222 7.55604L0.454456 7.54178L0.45654 5.348L14.5857 5.36226L11.2378 1.81932L12.7134 0.272705L18.5908 6.49206L12.6863 12.6818Z" fill="#1E1E1E"/>
                                </svg>        
                            </span>                          
                        </div>
                    </div>
                </div>    
            </div>
            <hr>

            <div class="mesFestivals-fest">
                <div class="mesFestivals-fest-mainInfoContainer">
                    <div class="mesFestivals-fest-mainInfo">
                        <div class="mesFestivals-festName">
                            <p>Nom Festival</p>
                            <h3>Nom du festival</h3>
                        </div>

                        <div class="mesFestivals-festGenre">
                            <p>Genre Musical</p>
                            <h4>Hard rock</h4>
                        </div>

                        <div class="mesFestivals-festDate">
                            <p>Dates</p>
                            <h4>Du 17 au 28 mars 2025</h4>
                        </div>

                        <div class="mesFestivals-arrow">
                            <span>
                                <svg width="24" height="18" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6863 12.6818L11.2169 11.1264L14.6222 7.55604L0.454456 7.54178L0.45654 5.348L14.5857 5.36226L11.2378 1.81932L12.7134 0.272705L18.5908 6.49206L12.6863 12.6818Z" fill="#1E1E1E"/>
                                </svg>        
                            </span>                          
                        </div>
                    </div>
                </div>
                
            </div>
            <hr>

            <div class="mesFestivals-fest">
                <div class="mesFestivals-fest-mainInfoContainer">
                    <div class="mesFestivals-fest-mainInfo">
                        <div class="mesFestivals-festName">
                            <p>Nom Festival</p>
                            <h3>Nom du festival</h3>
                        </div>

                        <div class="mesFestivals-festGenre">
                            <p>Genre Musical</p>
                            <h4>Hard rock</h4>
                        </div>

                        <div class="mesFestivals-festDate">
                            <p>Dates</p>
                            <h4>Du 17 au 28 mars 2025</h4>
                        </div>

                        <div class="mesFestivals-arrow">
                            <span>
                                <svg width="24" height="18" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6863 12.6818L11.2169 11.1264L14.6222 7.55604L0.454456 7.54178L0.45654 5.348L14.5857 5.36226L11.2378 1.81932L12.7134 0.272705L18.5908 6.49206L12.6863 12.6818Z" fill="#1E1E1E"/>
                                </svg>        
                            </span>                          
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="mesFestivals-fest">
                <div class="mesFestivals-fest-mainInfoContainer">
                    <div class="mesFestivals-fest-mainInfo">
                        <div class="mesFestivals-festName">
                            <p>Nom Festival</p>
                            <h3>Nom du festival</h3>
                        </div>

                        <div class="mesFestivals-festGenre">
                            <p>Genre Musical</p>
                            <h4>Hard rock</h4>
                        </div>

                        <div class="mesFestivals-festDate">
                            <p>Dates</p>
                            <h4>Du 17 au 28 mars 2025</h4>
                        </div>

                        <div class="mesFestivals-arrow">
                            <span>
                                <svg width="24" height="18" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6863 12.6818L11.2169 11.1264L14.6222 7.55604L0.454456 7.54178L0.45654 5.348L14.5857 5.36226L11.2378 1.81932L12.7134 0.272705L18.5908 6.49206L12.6863 12.6818Z" fill="#1E1E1E"/>
                                </svg>        
                            </span>                          
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="mesFestivals-fest">
                <div class="mesFestivals-fest-mainInfoContainer">
                    <div class="mesFestivals-fest-mainInfo">
                        <div class="mesFestivals-festName">
                            <p>Nom Festival</p>
                            <h3>Nom du festival</h3>
                        </div>

                        <div class="mesFestivals-festGenre">
                            <p>Genre Musical</p>
                            <h4>Hard rock</h4>
                        </div>

                        <div class="mesFestivals-festDate">
                            <p>Dates</p>
                            <h4>Du 17 au 28 mars 2025</h4>
                        </div>

                        <div class="mesFestivals-arrow">
                            <span>
                                <svg width="24" height="18" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6863 12.6818L11.2169 11.1264L14.6222 7.55604L0.454456 7.54178L0.45654 5.348L14.5857 5.36226L11.2378 1.81932L12.7134 0.272705L18.5908 6.49206L12.6863 12.6818Z" fill="#1E1E1E"/>
                                </svg>        
                            </span>                          
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="mesFestivals-fest">
                <div class="mesFestivals-fest-mainInfoContainer">
                    <div class="mesFestivals-fest-mainInfo">
                        <div class="mesFestivals-festName">
                            <p>Nom Festival</p>
                            <h3>Nom du festival</h3>
                        </div>

                        <div class="mesFestivals-festGenre">
                            <p>Genre Musical</p>
                            <h4>Hard rock</h4>
                        </div>

                        <div class="mesFestivals-festDate">
                            <p>Dates</p>
                            <h4>Du 17 au 28 mars 2025</h4>
                        </div>

                        <div class="mesFestivals-arrow">
                            <span>
                                <svg width="24" height="18" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6863 12.6818L11.2169 11.1264L14.6222 7.55604L0.454456 7.54178L0.45654 5.348L14.5857 5.36226L11.2378 1.81932L12.7134 0.272705L18.5908 6.49206L12.6863 12.6818Z" fill="#1E1E1E"/>
                                </svg>        
                            </span>                          
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="mesFestivals-fest">
                <div class="mesFestivals-fest-mainInfoContainer">
                    <div class="mesFestivals-fest-mainInfo">
                        <div class="mesFestivals-festName">
                            <p>Nom Festival</p>
                            <h3>Nom du festival</h3>
                        </div>

                        <div class="mesFestivals-festGenre">
                            <p>Genre Musical</p>
                            <h4>Hard rock</h4>
                        </div>

                        <div class="mesFestivals-festDate">
                            <p>Dates</p>
                            <h4>Du 17 au 28 mars 2025</h4>
                        </div>

                        <div class="mesFestivals-arrow">
                            <span>
                                <svg width="24" height="18" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6863 12.6818L11.2169 11.1264L14.6222 7.55604L0.454456 7.54178L0.45654 5.348L14.5857 5.36226L11.2378 1.81932L12.7134 0.272705L18.5908 6.49206L12.6863 12.6818Z" fill="#1E1E1E"/>
                                </svg>        
                            </span>                          
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div id="mesFestivals-right">
        <div class="mesFestivals-aside">
            <div class="mesFestivals-asideTitle">
                <h3>Prolongez votre expérience Groovie en ajoutant un évènement</h3>
            </div>

            <div class="mesFestivals-asideBtn">
                <form action="{{route('festival.index')}}" method="GET">
                    <button type="submit" id="redirect-fest">
                        Tout les festivals
                        <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.1684 8.298C20.3807 8.08634 20.5 7.7993 20.5 7.5C20.5 7.20071 20.3807 6.91366 20.1684 6.702L13.7606 0.316846C13.547 0.111241 13.2609 -0.00252692 12.9639 4.41639e-05C12.6669 0.0026162 12.3828 0.121323 12.1728 0.330596C11.9628 0.53987 11.8436 0.822966 11.8411 1.11891C11.8385 1.41486 11.9526 1.69997 12.159 1.91285L16.6332 6.37128L1.63271 6.37128C1.33229 6.37128 1.04418 6.4902 0.831759 6.70188C0.619336 6.91355 0.499997 7.20065 0.499997 7.5C0.499997 7.79935 0.619336 8.08645 0.831759 8.29812C1.04418 8.5098 1.33229 8.62872 1.63271 8.62872L16.6332 8.62872L12.159 13.0871C11.9526 13.3 11.8385 13.5851 11.8411 13.8811C11.8436 14.177 11.9628 14.4601 12.1728 14.6694C12.3828 14.8787 12.6669 14.9974 12.9639 15C13.2609 15.0025 13.547 14.8888 13.7606 14.6832L20.1684 8.298Z" fill="#1E1E1E"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="mesFestivals-aside">
            <div class="mesFestivals-asideTitle">
                <h3>Profitez des offres promotionnelles de nos partenaires</h3>
            </div>

            <div class="mesFestivals-asideBtn">
                <form action="{{route('festival.index')}}" method="GET">
                    <button type="submit" id="redirect-fest">
                        Utiliser mes Groovies
                        <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.1684 8.298C20.3807 8.08634 20.5 7.7993 20.5 7.5C20.5 7.20071 20.3807 6.91366 20.1684 6.702L13.7606 0.316846C13.547 0.111241 13.2609 -0.00252692 12.9639 4.41639e-05C12.6669 0.0026162 12.3828 0.121323 12.1728 0.330596C11.9628 0.53987 11.8436 0.822966 11.8411 1.11891C11.8385 1.41486 11.9526 1.69997 12.159 1.91285L16.6332 6.37128L1.63271 6.37128C1.33229 6.37128 1.04418 6.4902 0.831759 6.70188C0.619336 6.91355 0.499997 7.20065 0.499997 7.5C0.499997 7.79935 0.619336 8.08645 0.831759 8.29812C1.04418 8.5098 1.33229 8.62872 1.63271 8.62872L16.6332 8.62872L12.159 13.0871C11.9526 13.3 11.8385 13.5851 11.8411 13.8811C11.8436 14.177 11.9628 14.4601 12.1728 14.6694C12.3828 14.8787 12.6669 14.9974 12.9639 15C13.2609 15.0025 13.547 14.8888 13.7606 14.6832L20.1684 8.298Z" fill="#1E1E1E"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection