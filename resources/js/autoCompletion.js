$(function() {
    $(".city").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "http://api.geonames.org/searchJSON",
                dataType: "json",
                data: {
                    q: request.term,
                    maxRows: 10,
                    username: "itscastoor",
                    country: "FR",
                    featureClass: "P"
                },
                success: function(data) {
                    response($.map(data.geonames, function(item) {
                        return {
                            label: item.name,
                            value: item.name
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            // Action à effectuer lors de la sélection d'une ville
        },
        change: function(event, ui) {
            if (!ui.item) {
                // Si aucune ville n'est sélectionnée, vider le champ
                $(this).val('');
            }
        }
    });
});
