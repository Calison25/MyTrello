import React, { Component } from 'react';
import { Route, Redirect, Link, HashRouter as Router } from 'react-router-dom';
import ShowUser from "../../User/ShowUser";

class ShowUserButton extends Component {
    render() {
        return(
            <Router>
                <Route path='/user' component={ShowUser}/>
            </Router>
        );
    }
}

export default ShowUserButton;
