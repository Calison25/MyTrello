import React, {Component} from 'react';
import { Row, Col, Button } from 'react-bootstrap';
import '../style/login.css';

class Login extends Component {
    render() {
        return (
            <Col md={6}>
                <div className="card form-white">
                    <div className="card-body">
                        <form>
                            <h3 className="text-center indigo-text font-bold py-4"><strong>Subscribe</strong></h3>
                            <div className="md-form">
                                <i className="fa fa-envelope prefix white-text"/>
                                <label htmlFor="form35">Email</label>
                                <input type="text" id="form35" className="form-control"/>
                            </div>
                            <div className="md-form">
                                <i className="fa fa-lock prefix grey-tex"/>
                                <label htmlFor="form25">Password</label>
                                <input type="password" id="form25" className="form-control"/>
                            </div>
                            <div className="text-center py-4">
                                <Button className="btn btn-indigo">Sign in <i className="fa fa-paper-plane-o"/></Button>
                            </div>
                        </form>
                    </div>
                </div>
            </Col>
        );
    }
}

export default Login;
