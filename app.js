/**
 * Created by Ilson Nóbrega on 25/08/2015.
 * Email: ilson@inobrega.com.br
 */

var socket = require( 'socket.io' );
var express = require( 'express' );
var http = require( 'http' );

var app = express();
var server = http.createServer( app );

var io = socket.listen( server );

io.sockets.on( 'connection', function( client ) {
    console.log( "New client !" );

    client.on( 'message', function( data ) {
        console.log( 'Message received ' + data.name + ":" + data.message );

        io.sockets.emit( 'message', { name: data.name, message: data.message } );
    });
});

server.listen( 8080 );
