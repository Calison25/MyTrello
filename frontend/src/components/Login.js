import React, {Component} from 'react';
import { Button } from 'react-bootstrap';
import '../style/login.css';

class Login extends Component {
    render() {
        return (
            <div className="col-md-6 mb-4">
                <div className="card near-moon-gradient form-white">
                    <div className="card-body">
                        <form>
                            <p className="h5 text-center mb-4">Sign in</p>
                            <div className="md-form">
                                <i className="fa fa-envelope prefix white-tex"></i>
                                <input type="text" id="form35" className="form-control" />
                                    <label htmlFor="form35">Email</label>
                            </div>
                            <div className="md-form">
                                <i className="fa fa-lock prefix grey-tex"></i>
                                <input type="password" id="form25" className="form-control" />
                                <label htmlFor="form25">Password</label>
                            </div>
                            <div className="text-center py-4">
                                <Button className="btn btn-indigo">Sign in <i className="fa fa-paper-plane-o ml-1"></i></Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        );
    }
}

export default Login;
