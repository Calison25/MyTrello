import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

let datacreate = {
    name: "Calison",
    password: "123456",
    username: "calison25",
    email: "calisonsi@gmail.com"
};

let dataupdate = {
    name: "Shirley",
    password: "123456",
    username: "shirleysf13",
    email: "shill13@gmail.com"
};

let urlcreate = "http://localhost:1000/trello/create-user";
let urlshow = "http://localhost:1000/trello/show-user";
let urlupdate = "http://localhost:1000/trello/update-user";
let urldelete = "http://localhost:1000/trello/delete-user";
let formData = new FormData();

// formData.append('data', JSON.stringify(datacreate));

formData.append('username', 'calison25');

// formData.append('user', '25f75983-fcda-4624-97d2-d8fd63a30eca');
// formData.append('data', JSON.stringify(dataupdate));

class App extends Component {
    render() {
        // callUrlDelete();
        // callUrlCreate();
        // callUrlUpdate();
        callUrlShow();
        return 'Agora está caceta está funcionando!!!!!';
    }
}

function callUrlCreate(){
    fetch(urlcreate,{
      method: "POST",
      body: formData
    }).then(function(response) {
            console.log("ok");
            response.json().then(function(result){
                console.log(result.message);
                console.log(result.success);
            });
    }).catch(function(error) {
        console.log("erro");
        console.log(error);
    });
}

function callUrlShow(){
    fetch(urlshow,{
        method: "POST",
        body: formData
    }).then(function(response) {
        console.log("ok");
        response.json().then(function(result){
            console.log(result.message);
            console.log(result.success);
        });
    }).catch(function(error) {
        console.log("erro");
        console.log(error);
    });
}

function callUrlDelete(){
    fetch(urldelete,{
        method: "POST",
        body: formData
    }).then(function(response) {
        console.log("ok");
        response.json().then(function(result){
            console.log(result.message);
            console.log(result.success);
        });
    }).catch(function(error) {
        console.log("erro");
        console.log(error);
    });
}

function callUrlUpdate(){
    fetch(urlupdate,{
        method: "POST",
        body: formData
    }).then(function(response) {
        console.log("ok");
        response.json().then(function(result){
            console.log(result.message);
            console.log(result.success);
        });
    }).catch(function(error) {
        console.log("erro");
        console.log(error);
    });
}

export default App;
