/**
 * Created by Samurai on 21.11.2017.
 */
jQuery('input[type="checkbox"]').on('click', function(){

    var data = {};
    data.action = 'picons_action';
    data.id = jQuery(this).attr('id');
    data.value = jQuery(this).is(':checked') ? 1 : 0;

    jQuery.post( ajaxurl, data, function(response) {});
});