import React, { Component } from 'react';
import SignInButton from "./Login/SignIn/SignInButton";
import SignUpButton from "./Login/SignUp/SignUpButton";
import SignOutButton from "./Login/SignOut/SignOutButton";

class LadingPage extends Component {
    render() {
        return(
            <div>
                <SignInButton/>
                <SignUpButton/>
                <SignOutButton/>
            </div>
        );
    }
}

export default LadingPage;
