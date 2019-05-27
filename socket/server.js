const express = require('express');
const cors = require('cors');
const fs = require('fs')
const https = require('https')
const PORT = 5000;


const app = express();

app.use(express.json());
app.use(express.urlencoded({
    extended: true
}));

app.use(cors());

app.use(express.json());

server = https.createServer({
    key: fs.readFileSync('server.key'),
    cert: fs.readFileSync('server.cert')
}, app);

const io = require('socket.io')(server, {
    origins: '*:*'
});

server.listen(PORT, function() {
    console.log('Listening on port 5000! Go to https://localhost:5000/')
})

app.get('/', (req, res) => {
    res.send('<h1>coucou</h1>');
})

io.on('connection', (socket) => {

    socket.on('message', (data) => {
        console.log(data);
        socket.to('room-' + data.roomId).emit('message-received', { id: data.userId, content: data.content, picture: data.picture });
    })
})