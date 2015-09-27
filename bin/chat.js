var http = require('http').Server();
var io = require('socket.io')(http);


var request = require('request');


var clients = [];
var m = new Map();

io.on('connection', function (socket) {

    socket.join('home');
    var token = 'vb0CRZfENb8C-FWBBBSvQVa_Aka1pMXu';
    request('http://yii-rest.dev/api/v1/statuses?access-token=' + token, function (error, response, body) {
      if (!error && response.statusCode == 200) {
        console.log(body);
        var statuses = JSON.parse(body);
        io.emit('statuses', statuses);
      } else {
        console.log(error);
      }
    });
    

    
    // socket.leave('home');
    io.emit('news', 'WELCOME', 'myarg');
    io.to('home').emit('start', 'Home room start');

    console.log(socket.id +' user connected');
    socket.on('disconnect', function () {
        console.log(socket.id + ' user disconnected');
    });

    socket.on('chat message', function (msg, formData) {
        request.post({
            url:'http://yii-rest.dev/api/v1/statuses?access-token=' + token, 
            form: formData
        }, function (err, httpResponse, body) {
            console.log(body);
            io.emit('add status', JSON.parse(body));
        });

        socket.broadcast.emit('news', 'WELCOME 2');
        console.log(socket.id + ' message: ' + msg);
        io.emit('chat message', msg);
    });

    io.emit('news', { post: 'First post' });
});

var news = io.of('/news');

news.on('connection', function (socket) {
    news.emit('news', 'NEWS');
});



http.listen(3000, function () {
  console.log('listening on *:3000');
});