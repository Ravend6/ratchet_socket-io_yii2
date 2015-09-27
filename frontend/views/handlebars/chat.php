<?php 
// header('Authorization: Bearer vb0CRZfENb8C-FWBBBSvQVa_Aka1pMXu');
?>
<style>
      * { margin: 0; padding: 0; box-sizing: border-box; }
      /*form { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }*/
      /*form input { border: 0; padding: 10px; width: 90%; margin-right: .5%; }*/
      /*form button { width: 9%; background: rgb(130, 224, 255); border: none; padding: 10px; }*/
      #messages { list-style-type: none; margin: 0; padding: 0; }
      #messages li { padding: 5px 10px; }
      #messages li:nth-child(odd) { background: #eee; }
      .form-control {display: inline; width: 400px;}
</style>
<div class="row">
    <div class="col-sm-6">
        <h1>Chat</h1>
    </div>
    <div class="col-sm-6">
        <h1>История чата</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <ul id="messages"></ul>
        <form action="">
            <div class="form-group">
                <input type="text" name="message" id="message" autocomplete="off" class="form-control">
                <button class="btn btn-info">Send</button>
            </div>
        </form>
    </div>
    <div class="col-sm-6">
        <div class="list-statuses">
            
        </div>
        <nav>
          <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous" class="prev">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next" class="next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- <script src="https://cdn.socket.io/socket.io-1.0.0.js"></script> -->
<script src="https://cdn.socket.io/socket.io-1.3.6.js"></script>

<script>
    var token = 'vb0CRZfENb8C-FWBBBSvQVa_Aka1pMXu';
    function getStatuses(data) {
        var list = [];
        data.items.forEach(function (status) {
           list.push($('<article>', {html: $('<h4>', {text: status.name})}));
        });

        $('.list-statuses').append(list);
    }

    var socket = io('http://89.252.49.108:3000', {
        transports: ['websocket']
    });
 
    socket.on('news', function (data, arg) {
        // console.log(data + '|' + arg);
    });

    socket.on('chat message', function (data) {
        $('#messages').append($('<li>').text(data));
    });

    socket.on('start', function (data) {
        // console.log(data);
    });

    socket.on('statuses', function (data) {
        getStatuses(data);
        // console.log(data._links);
    });

    socket.on('add status' , function (data) {
        // console.log(data);
        $('.list-statuses').prepend($('<article>', {html: $('<h4>', {text: data.name})}));
    });

    $('form').submit(function () {
        if ($('#message').val() !== '') {
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            var name = $('#message').val();
            var isActive = 1;
            var sendData = '_csrf=' + csrfToken + '&name=' + name + '&is_active=' + isActive;
            var formData = {name: name, _csrf: csrfToken, is_active: isActive};
            
            socket.emit('chat message', $('#message').val(), formData, token);
            socket.emit('start', $('#message').val());

            $('#message').val('');
        }
        return false;
    });

    var socketNews = io('http://89.252.49.108:3000/news', {
        transports: ['websocket']
    });

    socketNews.on('news', function (data) {
        // console.log(data);

    });

    // Pagination

    $.ajax({
        url: '/api/v1/statuses?access-token=' + token,
        type: 'get',
    }).done(function (data) {
        console.log(data);
        if (data._links.next !== undefined) {
            $('.next').on('click', function () {
                $.ajax({
                    url: data._links.next.href,
                    type: 'get',
                }).done(function (data) {
                    console.log(data);
                    $('.list-statuses').children().remove();
                    getStatuses(data);
                });

                return false; 
            });
        }
        if (data._links.prev !== undefined) {
            $('.prev').on('click', function () {
                $.ajax({
                    url: data._links.prev.href,
                    type: 'get',
                }).done(function (data) {
                    console.log(data);
                    $('.list-statuses').children().remove();
                    getStatuses(data);
                });

                return false; 
            });
        }
        
    });



</script>
