import React, { Component } from 'react';
import { Route,  Link, Switch, HashRouter as Router } from 'react-router-dom';

const SignUpHeader = () => (
    <Router>
        <Link to='/signUp'>Sign Up</Link>
    </Router>
);

const SignUpRoute = () => (
    <Router>
       <Route path='/signUp' component={SignUp}/>
    </Router>
);

export const SignUpPath = () => (
    <div className="signUpPath">
        <SignUpHeader/>
        <SignUpRoute/>
    </div>
);

class SignUp extends Component {
    render() {
        return(
            <div className='signUp'>
                SignUp brother!
            </div>
        );
    }
}

export default SignUp;


