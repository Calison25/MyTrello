import React, { Component } from 'react';
import { Route, Switch, HashRouter as Router } from 'react-router-dom';
import ShowUser from "../../User/ShowUser";

class ShowUserButton extends Component {
    render() {
        return(
            <Router>
                <Switch>
                    <Route path='/user' component={ShowUser}/>
                </Switch>
            </Router>
        );
    }
}

export default ShowUserButton;
