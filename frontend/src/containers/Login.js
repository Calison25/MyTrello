import React, {Component} from 'react';
import styled from 'styled-components';
import '../style/login.css';
import SignIn from "../components/Access/Form/SignIn";
import {signIn} from "../routes/access";

const Div = styled.div`
    margin-top: 50px;
    margin-left: 200px;
`;


class Login extends Component {

    handleSubmit(values){
        signIn(values);
    }

    render() {
        return (
            <Div className="btn btn-primary col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div className="panel panel-info">
                    <div className="panel-heading">
                        <h3 className="panel-title"><i className="fa fa-user"/> Login</h3>
                    </div>

                    <SignIn onSubmit={this.handleSubmit}/>
                </div>
            </Div>
        );
    }
}

export default Login;
