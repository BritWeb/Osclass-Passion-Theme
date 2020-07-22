$(document).ready(function(){
    $(".opt_delete_account a").click(function(){
        $("#dialog-delete-account").dialog('open');
    });

    $("#dialog-delete-account").dialog({
        autoOpen: false,
        modal: true,
        buttons: [
            {
                text: passion.langs.delete,
                click: function() {
                    window.location = passion.base_url + '?page=user&action=delete&id=' + passion.user.id  + '&secret=' + passion.user.secret;
                }
            },
            {
                text: passion.langs.cancel,
                click: function() {
                    $(this).dialog("close");
                }
            }
        ]
    });
});