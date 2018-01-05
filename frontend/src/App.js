import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

let datacreate = {
    name: "Shirley",
    password: "123456",
    username: "shirleysf13",
    email: "shirley.florencio13@gmail.com"
};

let dataupdate = {
    name: "Antonio",
    password: "123456",
    username: "antonio",
    email: "antonio@gmail.com"
};

let userUpdate = ''

let urlcreate = "http://localhost:1000/trello/create-user";
let urlupdate = "http://localhost:1000/trello/update-user";
let formData = new FormData();

// formData.append('data', JSON.stringify(datacreate));


formData.append('user', 'dc125dea-f29a-40c5-89bf-e78da2e51fca');
formData.append('data', JSON.stringify(dataupdate));

class App extends Component {
    render() {
        // callUrlCreate();
        callUrlUpdate();
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
