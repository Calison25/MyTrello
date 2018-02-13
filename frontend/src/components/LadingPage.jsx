import React, { Component } from 'react';
import {SignHeader} from "./Login/SignIn.jsx";
import { Switch, Route } from 'react-router-dom'

class LadingPage extends Component {
    render() {
        return(
            <div className="LandingPage">
                <SignHeader />
            </div>
        );
    }
}

export default LadingPage;
