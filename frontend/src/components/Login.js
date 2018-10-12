import React, {Component} from 'react';
import { Button } from 'react-bootstrap';
import styled from 'styled-components';
import '../style/login.css';

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
    render() {
        return (
            <div className="container">
               <Div className="btn btn-primary col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div className="panel panel-info">
                        <div className="panel-heading">
                            <h3 className="panel-title"><i className="fa fa-user"/> Login</h3>
                        </div>

                        <DivPanel className="btn panel-body">
                            <form className="form-horizontal">
                                <fieldset>
                                    <DivInput className="control-group">
                                        <label className="control-label" htmlFor="email"><i className="fa fa-envelope prefix white-text"/>  Email</label>
                                        <div className="controls">
                                           <input type="text" id="email" className="form-control"/>
                                        </div>
                                    </DivInput>
                                    <DivInput className="control-group">
                                        <label className="control-label" htmlFor="password"><i className="fa fa-lock prefix grey-tex"/> Password</label>
                                        <div className="controls">
                                           <input type="password" id="password" className="form-control"/>
                                        </div>
                                    </DivInput>
                                    <div className="text-center py-4">
                                        <Button className="btn btn-secondary">Sign in <i className="fa fa-paper-plane-o"/></Button>
                                    </div>
                                </fieldset>
                            </form>
                        </DivPanel>

                    </div>
               </Div>
            </div>
        );
    }
}

export default Login;
