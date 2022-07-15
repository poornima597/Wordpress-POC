/* global jQuery, _caffCustomizerReset, ajaxurl, wp */

jQuery(function ($) {
    var elements = [
        ["#customize-save-button-wrapper", "reset-all", "theme-options-reset", "theme-options-reset-main", _caffCustomizerReset.confirm, _caffCustomizerReset.reset],
        ["#customize-control-caff_gototop_hover_bg_color div.customize-control-content", "colors", "theme-options-colors-reset", "theme-options-reset-section theme-options-reset-colors", _caffCustomizerReset.confirmSection, _caffCustomizerReset.resetSection],
        ["#_customize-input-caff_headings_font", "fonts", "theme-options-fonts-reset", "theme-options-reset-section theme-options-reset-fonts", _caffCustomizerReset.confirmSection, _caffCustomizerReset.resetSection],
    ];

    $.each( elements, function( key, value ) {
        var $container = $( value[0] );

        var $button = $('<input type="submit" name="' + value[2] + '" id="' + value[2] + '" class="theme-options-reset ' + value[3] + ' button-secondary button">')
        .attr('value', value[5]);

        $button.on('click', function (event) {
            event.preventDefault();

            var data = {
                wp_customize: 'on',
                action: 'customizer_reset',
                nonce: _caffCustomizerReset.nonce.reset,
                section: value[1]
            };

            var r = confirm(value[4]);

            if (!r) return;

            $(".spinner").css('visibility', 'visible');

            $button.attr('disabled', 'disabled');

            $.post(ajaxurl, data, function () {
                wp.customize.state('saved').set(true);
                location.reload();
            });
        });

        $container.after($button);
    });
});
