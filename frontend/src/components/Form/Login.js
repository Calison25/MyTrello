import React, {Component} from 'react';
import { BrowserRouter as Router, Route, Switch, Link } from "react-router-dom";
import { Button } from 'react-bootstrap';
import { toast } from 'react-toastify';
import styled from 'styled-components';
import { signIn } from "../../routes/access";
import Subscribe from './Subscribe.js';
import '../../style/login.css';

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

const errorMessage = (
    <div>
        <i className="fa fa-exclamation-triangle"/><strong> Ops!!</strong> Todos os campos são obrigatórios
    </div>
);

class Login extends Component {
    state = {
        form:{
            email: '',
            password: '',
        },
    };

    handleSubmit() {
        const { email, password } = this.state.form;
        if (email.length === 0 || password.length === 0){
            toast.error(errorMessage);
            return;
        }

        const data = {
            email: email,
            password: password
        };

        signIn(data);
    }


    render() {
        return (
            <Router>
               <Div className="btn btn-primary col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div className="panel panel-info">
                        <div className="panel-heading">
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
                                <p>New user? <Link to="/subscribe"><span style={{color: 'white'}}>create new account</span></Link></p>
                            </form>
                        </DivPanel>
                    </div>
                   <div>
                       <Switch>
                           <Route exact path="/subscribe" component={Subscribe}/>
                       </Switch>
                   </div>
               </Div>
            </Router>
        );
    }
}

export default Login;
