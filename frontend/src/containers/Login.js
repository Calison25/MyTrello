import React, {Component} from 'react';
import '../style/login.css';
import SignIn from "../components/Access/Form/SignIn";
import { signIn } from "../routes/access";

class Login extends Component {
    handleSubmit(values){
        signIn(values);
    }

    render() {
        return (
            <SignIn onSubmit={this.handleSubmit}/>
        );
    }
}

export default Login;
