$( function() {    
    $( "#inicio" ).datepicker();        
    $( "#inicio" ).datepicker( "option", "showAnim", "slide" );
    $( "#inicio" ).datepicker( "option", "dateFormat", "dd/mm/yy" );

    $( "#fim" ).datepicker();        
    $( "#fim" ).datepicker( "option", "showAnim", "slide" );
    $( "#fim" ).datepicker( "option", "dateFormat", "dd/mm/yy" );

    $( "#search_titular" ).autocomplete({
        source: "../encontrar_pessoa",
        minLength: 4,
        select: function( event, ui ) {
            $('input[name="nusp"]').val(ui.item.id);
            $('input[name="membro"]').val(ui.item.value);
            $('input[name="email"]').val(ui.item.codema);
        }
    });
});