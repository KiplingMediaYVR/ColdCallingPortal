/**
 * Select3 Spanish translation
 */
(function ($) {
    "use strict";

    $.fn.select3.locales['es'] = {
    	formatMatches: function (matches) { if (matches === 1) { return "Un resultado disponible, presione enter para seleccionarlo."; } return matches + " resultados disponibles, use las teclas de dirección para navegar."; },
        formatNoMatches: function () { return "No se encontraron resultados"; },
        formatInputTooShort: function (input, min) { var n = min - input.length; return "Por favor, introduzca " + n + " car" + (n == 1? "ácter" : "acteres"); },
        formatInputTooLong: function (input, max) { var n = input.length - max; return "Por favor, elimine " + n + " car" + (n == 1? "ácter" : "acteres"); },
        formatSelectionTooBig: function (limit) { return "Sólo puede seleccionar " + limit + " elemento" + (limit == 1 ? "" : "s"); },
        formatLoadMore: function (pageNumber) { return "Cargando más resultados…"; },
        formatSearching: function () { return "Buscando…"; },
        formatAjaxError: function() { return "La carga falló"; }
    };

    $.extend($.fn.select3.defaults, $.fn.select3.locales['es']);
})(jQuery);
