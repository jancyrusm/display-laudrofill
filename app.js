const express = require('express');
const bodyParser = require('body-parser');
const axios = require('axios');
const { SerialPort } = require('serialport');
const { ReadlineParser } = require('@serialport/parser-readline');
const http = require('http');
const socketIo = require('socket.io');
const multer = require('multer'); // Import multer to handle FormData
const { exec } = require('child_process'); // Import child_process for executing PHP scripts
const fs = require('fs'); //for JSON

const upload = multer();
const app = express();
const server = http.createServer(app);
const io = socketIo(server);

const port = 3000; // Port for the web server
const serialPortName = 'COM7';

// Serial Port setup
const myPort = new SerialPort({ path: serialPortName, baudRate: 9600 });
const parser = myPort.pipe(new ReadlineParser({ delimiter: '\r\n' }));

myPort.on('open', onOpen);
myPort.on('error', onError);
parser.on('data', onData);

function onOpen() {
    console.log('Open Connection');
}

function parseSerialData(data) {
    const coinInsertedPattern = /^Coins Inserted: (\d+)$/;
    const distancePattern = /^Distance (\d+): (\d+)cm$/;
    
    if (coinInsertedPattern.test(data)) {
        const match = data.match(coinInsertedPattern);
        const coinValue = parseInt(match[1], 10);
        return { type: 'coinInserted', value: coinValue };
    } else if (distancePattern.test(data)) {
        const match = data.match(distancePattern);
        const module = parseInt(match[1], 10);
        const distanceValue = parseInt(match[2], 10);
        return { type: `distance${module}`, value: distanceValue };
    }
    
    return { type: 'unknown', value: data };
}

function onData(data) {
    console.log('on Data: ' + data);
    const parsedData = parseSerialData(data);
    if (parsedData.type === 'coinInserted') {
        io.emit('coinInserted', parsedData.value);
    } else if (parsedData.type.startsWith('distance')) {
        io.emit(parsedData.type, parsedData.value);
    }
}

function onError(err) {
    console.error('Error: ', err.message);
}

// Express setup
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(express.static('USER'));

// Handle form submission
app.post('/saveTransaction', upload.none(), (req, res) => {
    const formData = req.body;
    
    axios.post('http://localhost/display-laudrofill/USER/data.php', formData)
        .then(response => {
            res.json({ success: true });
        })
        .catch(error => {
            console.error('Error forwarding to PHP script:', error);
            res.status(500).json({ success: false, error: 'Failed to forward to PHP script' });
        });
});


// Handle the SaveDistance
app.post('/saveDistances', (req, res) => {
    const formData = req.body;
    console.log('Received formData:', formData);
    
    axios.post('http://localhost/display-laudrofill/USER/data.php', formData)
        .then(response => {
            res.json({ success: true });
        })
        .catch(error => {
            console.error('Error forwarding to PHP script:', error);
            res.status(500).json({ success: false, error: 'Failed to forward to PHP script' });
        });
});

// Socket.io setup
io.on('connection', (socket) => {
    console.log('A user connected');

    socket.on('sendValue', (value, callback) => {
        myPort.write(value + '\n', (err) => {
            if (err) {
                console.error('Error on write: ', err.message);
                if (callback) callback(err);
            } else {
                console.log('SERIAL INPUT: ' + value);
                if (callback) callback();
            }
        });
    });

    socket.on('disconnect', () => {
        console.log('User disconnected');
    });
});

server.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});
