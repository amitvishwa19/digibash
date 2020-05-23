window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    //window.$ = window.jQuery = require('jquery');

    //require('bootstrap');
} catch (e) { }


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

// import React from 'react';
// import ReactDOM from 'react-dom';
//import App from './App';

// ReactDOM.render(<App />, document.getElementById('root')
// );





require('../components/Example');


require('./custom');