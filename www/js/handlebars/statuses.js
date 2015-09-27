(function () {
    'use strict';

    function reRender(data) {
        var statuses = data.items;

        $("#block-list-statuses").remove();
        
        var listStatusesHandl = Handlebars.compile($("#list-statuses-tpl").html()); 
        $('#list-statuses').append(listStatusesHandl(statuses));

        $('article h2').hover(
            function() {
                $(this).find('.delete-status').css({'display': 'inline'}); 
            },
            function() {
                $(this).find('.delete-status').css({'display': 'none'});
        });
        deleteStatus();

    }

    function deleteStatus() {
        $('.delete-status').on('click', function (event) {
            // var target = $(event.currentTarget);
            var id = $(this).data('id');
            $.ajax({
                url: '/api/v1/statuses/' + id,
                type: 'delete',
                success: function (data) {
                    $.ajax({
                        url: '/api/v1/statuses',
                        type: 'get',
                        success: function (data) {
                            conn.send(JSON.stringify(data));
                            reRender(data);
                        }
                    });
                }
            });
        });
    }

    function render(data) {
        var statuses = data.items;
        // statuses.reverse();

        var listStatusesHandl = Handlebars.compile($("#list-statuses-tpl").html()); 
        $('#list-statuses').append(listStatusesHandl(statuses));

        $('article h2').hover(
            function() {
                $(this).find('.delete-status').css({'display': 'inline'}); 
            },
            function() {
                $(this).find('.delete-status').css({'display': 'none'});
        });
        deleteStatus();
        
    }



    var conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function(e) {
        console.log("Connection established!");
    };

    conn.onmessage = function(e) {
        reRender(JSON.parse(e.data));
    };



    $.ajax({
        url: '/api/v1/statuses',
        type: 'get',
        success: function (data) {
            render(data);
        }
    });

    $('#create-status-form').on('submit', function (event) {
        var form = $(this);
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        // var inputName = $('input[name="name"]');
        var inputName = form.find('input[name="name"]');
        var name = inputName.val();
        var isActive = form.find('#is_active').is(':checked') ? 1 : 0;
        var sendData = '_csrf=' + csrfToken + '&name=' + name + '&is_active=' + isActive;
        inputName.val('');
        // console.log(form.serialize());

        $.ajax({
            url: '/api/v1/statuses',
            type: 'post',
            data: sendData,
            success: function (data, jqXHR, settings) {
                console.log(data);
                // console.log(jqXHR);
                // console.log(settings);
                // console.log(settings.getAllResponseHeaders());
                $.ajax({
                    url: '/api/v1/statuses',
                    type: 'get',
                    success: function (data) {
                        conn.send(JSON.stringify(data));
                        reRender(data);
                    }
                });
                
            }
        }).fail(function (e) {
            console.log(e);
        });

        return false;
    });


    

}());


