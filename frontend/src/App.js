import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

const proxyUrl = 'https://cors-anywhere.herokuapp.com/';
const url = 'http://localhost:1000/trello/create-user';

class App extends Component {
    render() {
        callUrl();
        return 'Agora está caceta está funcionando!!!!!';
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
