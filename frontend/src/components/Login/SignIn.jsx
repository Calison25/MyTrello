import React, { Component } from 'react';
import { Route,  Link, Switch, HashRouter as Router } from 'react-router-dom';

export const SignHeader = () => (
    <Router>
        <Link to='/signIn'>Sign In</Link>
    </Router>
);

const SignRoute = () => (
    <Router>
        <Switch>
            <Route path='/signIn' component={SignIn}/>
        </Switch>
    </Router>
);

class SignIn extends Component {
    render() {
        return(
            <div className='signIn'>
                Sign brother!
            </div>
        );
    }
}

export default SignIn;


