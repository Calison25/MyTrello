import React, { Component } from 'react';
import { Route, Switch, HashRouter as Router } from 'react-router-dom';
import SignInAction from "./SignInAction";

class SignInButton extends Component {
    render() {
        return(
            <Router>
                <Switch>
                    <Route path='/signIn' component={SignInAction}/>
                </Switch>
            </Router>
        );
    }
}

export default SignInButton;
