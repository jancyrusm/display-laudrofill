const express = require('express');
const bodyParser = require('body-parser');
const { SerialPort } = require('serialport');
const { ReadlineParser } = require('@serialport/parser-readline');

const app = express();
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

app.use(express.static('public'));

app.post('/send', (req, res) => {
    const value = req.body.value;
    myPort.write(value + '\n', (err) => {
        if (err) {
            console.log('Error on write: ', err.message);
            res.status(500).send('Error writing to serial port');
        } else {
            console.log('Message written to serial port: ' + value);
            res.status(200).send('Message sent to serial port');
        }
    });
});

app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});