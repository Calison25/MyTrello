import React, { Component } from 'react';
import {SignInPath} from "./Login/SignIn.jsx";
import {SignUpPath} from "./Login/SignUp.jsx";
import { Switch, Route } from 'react-router-dom'

class LadingPage extends Component {
    render() {
        // return(
        //     <div className="LandingPage">
        //       <SignInPath/>
        //       <SignUpPath/>ta
        //     </div>
        // );
        var arrayTest = [];

        arrayTest["testando"] = ["isso funciona!"];
        arrayTest["testando"].push("isso funciona!2");
        arrayTest["testando"].push("isso funciona!3");
        arrayTest["testando"].push("isso funciona!4");
        arrayTest["testando2"] = ["isso funciona!3"];
        arrayTest["testando2"].push("isso funciona!4");
        arrayTest["testando2"].push("isso funciona!5");

        console.log(arrayTest);

    }
}

export default LadingPage;
