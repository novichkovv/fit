/**
 * Created by asus1 on 29.08.2015.
 */
$ = jQuery.noConflict();
$(document).ready(function()
{
    $('body').css("background-color", "#B4D9E5;");
    $('body').fadeIn(200);
    $("#logout_button").click(function(e)
    {
        e.preventDefault();
        $("#log_out").submit();
    });
    $("#log-button").click(function()
    {
        $("#log").slideToggle();
    });
    $("#log").dblclick(function()
    {
        $(this).slideUp();
    });
    $(".sidebar-menu .expand").click(function()
    {
        $(this).parent().children('.sub-menu').slideToggle(100);
    });
});

function confirm_delete(id, table, success, before, fail, custom, action)
{
    $("#delete_id_input").val(id);
    $("#delete_table").val(table);
    if(typeof before == 'function') {
        before();
    }
    $('body').on('click', "#delete_item_btn", function()
    {
        confirmed_delete(id, table, success, fail, custom, action);
    });
}

function confirmed_delete(id, table, success, fail, custom, action) {
    action = action ? action : 'delete_item'
    var common = custom === false || custom === 0;
    var params = {
        'action': action,
        'common': common,
        'values': {id: id, table: table},
        'callback': function (msg) {
            ajax_respond(msg,
                function(respond)
                {
                    $("#delete_modal").modal('hide');
                    if(success) {
                        if(typeof success == 'function') {
                            success(respond);
                        } else {
                            Notifier.success(success, 'Успешно!');
                        }

                    } else {
                        Notifier.success('Удалено!');
                    }

                },
                function(respond) {
                    if(fail) {
                        if(typeof fail == 'function') {
                            fail(respond);
                        } else {
                            Notifier.warning(respond);
                        }
                    } else {
                        Notifier.warning('Что-то пошло не так', 'Отказ!');
                    }
                }
            );

        }
    };
    ajax(params);
}
