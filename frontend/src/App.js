import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

const proxyUrl = 'https://cors-anywhere.herokuapp.com/';
const url = 'http://localhost:1000/index.php/create-user';

class App extends Component {
    render() {
        callUrl();
        return 'passou';
    }
}

function callUrl(){
    fetch(url)
        .then(function() {
            console.log("ok");
        }).catch(function(error) {
        console.log(error);
    });
}

export default App;
