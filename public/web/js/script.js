$('#btn-login-register').click(function() {
    $('#modal-login').modal('hide');
    $('#modal-register').modal('show');
});

$('#btn-register-login').click(function() {
    $('#modal-register').modal('hide');
    $('#modal-login').modal('show');
});

// INPUT RANGE
$( ".price-slider" ).slider({
    range: true,
    min: 0,
    max: 50,
    values: [ 1, 50 ],
    slide: function( event, ui ) {
        $( ".range-value-min" ).text( "" + ui.values[ 0 ] );
        $( ".range-value-max" ).text( "" + ui.values[ 1 ] );
    }
});
// $( ".price-value" ).text($( ".price-slider" ).slider( "values", 0 ) +
//         " - " + $(".price-slider" ).slider( "values", 1 ) );

$( ".range-value-min" ).text($( ".price-slider" ).slider( "values", 0 ));
$( ".range-value-max" ).text($( ".price-slider" ).slider( "values", 1 ) );
