// (function () {
//     'use strict';

//     $.get('/api/v1/statuses', function (data) {
//         var list = [];
//         for (var i in data) {
//             list.push($('<article>', {html: $('<h2>', {html: data[i].name +
//                 ' <span>Active: '+data[i].is_active+'</span>'})}));
//         }
//         $('.statuses').append(list);
//     });

//     // $.ajax({
//     //     url: '/statuses',
//     //     type: 'get',
//     //     success: function (data) {
//     //         var statuses = '';
//     //         for (var i = data.length - 1; i >= 0; i--) {
//     //             statuses += data[i].name + '. ';
//     //         }
//     //         $('.statuses').html(statuses);
//     //     }

//     // });

//     $.ajax({
//         url: '/api/v1/statuses/2',
//         type: 'patch',
//         data: {is_active: 0},
//         success: function (data, status) {
//             console.log(status);
//             console.log(data);
//         }

//     }).fail(function () {
//         console.log("fail");
//     }).done(function (data) {
//         console.log("DONE: " + JSON.stringify(data));
//     });
// }());