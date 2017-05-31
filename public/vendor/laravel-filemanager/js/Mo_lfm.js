var selectedAR = {};
var laradropContainer = jQuery('#laradrop-container-' + uid);


laradropContainer.find('.laradrop-multi-file-select').click(function () {

    var item = jQuery(this).closest('.Mo_lfm_id'),
    path = data("id"),
        id = item.attr('file-id');
    if (selectedAR[id] == undefined) {
        jQuery(this).html(' <span style="color:red" class="glyphicon glyphicon-ok" ></span>');

        selectedAR[id] = { 'id': id, 'src':path };
    }
    else {

        delete selectedAR[id];
        jQuery(this).html(' <span  class="glyphicon glyphicon-unchecked" ></span>');
    }

});

laradropContainer.find('.laradrop-multi-file-delete').click(function (e) {
    e.preventDefault();
    if (!confirm(actionConfirmationText)) {
        return false;
    }
    $.each(selectedAR, function (index, value) {
        //alert(value.id);
        imgdelete(value.id);
    });


});              
laradropContainer.find('.laradrop-multi-file-insert').click(function () {

    if (onInsertCallback) {
        eval(onInsertCallback(selectedAR));
        //alert('multiinsert');
    }

});