'use strict';

const functions = require('firebase-functions');
const admin = require('firebase-admin');

admin.initializeApp(functions.config().firebase);

exports.add_to_cart = functions.analytics.event('add_to_cart').onLog(event => {
		var http = require("http");
		var needle = require('needle');
		const email_id = event.data.params.email_id;
		const logTime = event.data.logTime;

var options = {
	headers: {'Content-Type': 'application/x-www-form-urlencoded'}
};

needle.post('<YOUR SERVER DNS/IP>/facebook_add_audience.php', email_id, options, function(err, resp) {
});

});
