$(function() {
    $(".city").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "https://us1.locationiq.com/v1/search.php",
                dataType: "json",
                data: {
                    key: "pk.e6a2932b7562c1ec9d24f42fcde09e74",  // Remplace par ta clé API LocationIQ
                    q: request.term,
                    format: "json",
                    countrycodes: "FR",  // Limiter aux villes en France
                    dedupe: 1  // Filtrer les résultats redondants
                },
                success: function(data) {
                    // Utiliser un objet pour garder une trace des villes déjà ajoutées
                    const uniqueCities = {};
                    const filteredResults = $.map(data, function (item) {
                        const cityName = item.display_name.split(",")[0];  // Extrait seulement le nom de la ville
                        if (!uniqueCities[cityName]) {
                            uniqueCities[cityName] = true;  // Marquer la ville comme ajoutée
                            return {
                                label: cityName,
                                value: cityName
                            };
                        }
                    });
                    response(filteredResults);  // Répondre avec les résultats filtrés
                }
            });
        },
        minLength: 2,  // Le nombre minimum de caractères avant d'effectuer la recherche
        select: function(event, ui) {
            // Action à effectuer lors de la sélection d'une ville
            console.log(ui.item.value);  // Afficher la ville sélectionnée dans la console
        },
        change: function(event, ui) {
            if (!ui.item) {
                // Si aucune ville n'est sélectionnée, vider le champ
                $(this).val('');
            }
        }
    });
});
