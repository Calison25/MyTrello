import React, { Component } from 'react';
import { Route,  Link, Switch, HashRouter as Router } from 'react-router-dom';

const SignInHeader = () => (
    <Router>
        <Link to='/signIn'>Sign In</Link>
    </Router>
);

const SignInRoute = () => (
    <Router>
        <Route path='/signIn' component={SignIn}/>
    </Router>
);

export const SignInPath = () => (
    <div className="signInPath">
        <SignInHeader/>
        <SignInRoute/>
    </div>
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


