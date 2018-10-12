import React, {Component} from 'react';
import { Button } from 'react-bootstrap';
import styled from 'styled-components';
import '../../style/login.css';
import LoginError from "./LoginError";

const Div = styled.div`
    margin-top: 50px;
    margin-left: 200px;
`;

const DivPanel = styled.div`
    padding-top: 30px;
`;

const DivInput = styled.div`
    margin-bottom: 20px;
`;



class Login extends Component {
    state = {
        form:{
            email: '',
            password: '',
        },
        hasError: false
    };

    handleSubmit() {
        const { email, password } = this.state.form;
        if (email.length === 0 || password.length === 0){
            this.setState({hasError: true});
        }
    }


    render() {
        return (
               <Div className="btn btn-primary col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div className="panel panel-info">
                        <div className="panel-heading">
                            {this.state.hasError &&  <LoginError />}
                            <h3 className="panel-title"><i className="fa fa-user"/> Login</h3>
                        </div>

                        <DivPanel className="btn panel-body">
                            <form className="form-horizontal">
                                    <DivInput className="control-group">
                                        <label className="control-label" htmlFor="email"><i className="fa fa-envelope prefix white-text"/> Email</label>
                                        <div className="controls">
                                           <input type="text" id="email" className="form-control"
                                                  value={this.state.email}
                                                  onChange={(event) => this.setState({form: { ...this.state.form, email: event.target.value}})}
                                           />
                                        </div>
                                    </DivInput>
                                    <DivInput className="control-group">
                                        <label className="control-label" htmlFor="password"><i className="fa fa-lock prefix grey-tex"/> Password</label>
                                        <div className="controls">
                                           <input type="password" id="password" className="form-control"
                                                  onChange={(event) => this.setState({form: { ...this.state.form, password: event.target.value}})}
                                           />
                                        </div>
                                    </DivInput>
                                    <div className="text-center py-4">
                                        <Button onClick={this.handleSubmit.bind(this)} className="btn btn-secondary">Sign in <i className="fa fa-paper-plane-o"/></Button>
                                    </div>
                            </form>
                        </DivPanel>
                    </div>
               </Div>
        );
    }
}

export default Login;
