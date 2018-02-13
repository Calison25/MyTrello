import React, { Component } from 'react';
import { Route, Switch, HashRouter as Router } from 'react-router-dom';
import SignOutAction from "./SignOutAction";

class SignOutButton extends Component {
    render() {
        return(
            <Router>
                <Switch>
                    <Route path='/signOut' component={SignOutAction}/>
                </Switch>
            </Router>
        );
    }
}

export default SignOutButton;
