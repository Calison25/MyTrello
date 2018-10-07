import React, {Component} from 'react';
import '../style/login.css';

class Login extends Component {
    render() {
        return (
            <div className="row">
                <div className="col-md-6 mb-4">
                    <div className="card near-moon-gradient form-white">
                        <div className="card-body">
                            <form>
                                <h3 className="text-center indigo-text font-bold py-4"><strong>Subscribe</strong></h3>
                                <div className="md-form">
                                    <i className="fa fa-user prefix white-text"/>
                                    <input type="text" id="form35" className="form-control" />
                                        <label htmlFor="form35">Your name</label>
                                </div>
                                <div className="md-form">
                                    <i className="fa fa-envelope prefix white-text" />
                                    <input type="text" id="form25" className="form-control" />
                                        <label htmlFor="form25">Your email</label>
                                </div>
                                <div className="text-center py-4">
                                    <button className="btn btn-indigo">Send <i className="fa fa-paper-plane-o ml-1"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Login;
