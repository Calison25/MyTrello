import React, { Component } from 'react';
import { Route, Switch, HashRouter as Router } from 'react-router-dom';
import SignUpAction from "./SignUpAction";

class SignUpButton extends Component {
    render() {
        return(
            <Router>
                <Switch>
                    <Route path='/signUp' component={SignUpAction}/>
                </Switch>
            </Router>
        );
    }
}

export default SignUpButton;
