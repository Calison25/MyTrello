import React, { Component } from 'react';
import {SignInPath} from "./Login/SignIn.jsx";
import {SignUpPath} from "./Login/SignUp.jsx";
import { Switch, Route } from 'react-router-dom'

class LadingPage extends Component {
    render() {
        return(
            <div className="LandingPage">
              <SignInPath/>
              <SignUpPath/>
            </div>
        );
    }
}

export default LadingPage;
