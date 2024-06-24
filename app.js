const express = require('express');
const bodyParser = require('body-parser');
const axios = require('axios');
const { SerialPort } = require('serialport');
const { ReadlineParser } = require('@serialport/parser-readline');
const http = require('http');
const socketIo = require('socket.io');
const multer = require('multer'); // Import multer to handle FormData
const { exec } = require('child_process'); // Import child_process for executing PHP scripts

const upload = multer();
const app = express();
const server = http.createServer(app);
const io = socketIo(server);

const port = 3000; // Port for the web server
const serialPortName = 'COM6'; // Ensure this is the correct port name

// Serial Port setup
const myPort = new SerialPort({ path: serialPortName, baudRate: 9600 });
const parser = myPort.pipe(new ReadlineParser({ delimiter: '\r\n' }));

myPort.on('open', onOpen);
myPort.on('error', onError);
parser.on('data', onData);

function onOpen() {
    console.log('Open Connection');
}

function onData(data) {
    console.log('on Data: ' + data);
}

function onError(err) {
    console.error('Error: ', err.message);
}

// Express setup
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(express.static('USER'));

// Handle PHP files
// app.use((req, res, next) => {
//     if (req.url.endsWith('.php')) {
//         // Execute PHP script using php-cgi
//         exec(`php-cgi ${__dirname}/USER${req.url}`, (error, stdout, stderr) => {
//             if (error) {
//                 console.error('Error executing PHP script:', error);
//                 res.status(500).send('Internal Server Error');
//             } else {
//                 // Set appropriate headers for PHP response
//                 res.setHeader('Content-Type', 'text/html'); // Adjust as needed
//                 res.send(stdout);
//             }
//         });
//     } else {
//         next(); // Continue with other routes
//     }
// });

// Handle form submission
app.post('/saveTransaction', upload.none(), (req, res) => {
    const formData = req.body;
    
    console.log("formData in Node.js:", formData);
    
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

    socket.on('sendValue', (value) => {
        myPort.write(value + '\n', (err) => {
            if (err) {
                console.error('Error on write: ', err.message);
            } else {
                console.log('SERIAL INPUT: ' + value);
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
