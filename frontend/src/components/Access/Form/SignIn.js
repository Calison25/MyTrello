import React, {Component} from 'react';
import { toast } from 'react-toastify';
import styled from 'styled-components';
import '../../../style/login.css';


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

const errorMessage = (propertyName) => (
    <div>
        <i className="fa fa-exclamation-triangle"/><strong> Ops!!</strong> {propertyName} é obrigatório.
    </div>
);

class SignIn extends Component {
    constructor(props) {
        super(props);
        this.state = {
            values: {
                email: '',
                password: '',
            },
        };
    }

    handleChange({ target }){
        this.setState({values: {
            ...this.state.values,
            [target.name]: target.value,
        }});
    };

    handleSubmit = event => {
        event.preventDefault();
        const { email, password } = this.state.values;
        if (email.length === 0){
            toast.error(errorMessage('email'));
            return;
        }

        if (password.length === 0){
            toast.error(errorMessage('password'));
            return;
        }

        this.props.onSubmit(this.state.values);
    };


    render() {
        const { values } = this.state;
        return (
            <Div className="btn btn-primary col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <DivPanel className="btn panel-body">
                    <form className="form-horizontal" onSubmit={this.handleSubmit}>
                        <div className="panel-heading">
                            <h3 className="panel-title"><i className="fa fa-user"/> Login</h3>
                        </div>
                        <DivInput className="control-group">
                            <label className="control-label" htmlFor="email"><i className="fa fa-envelope prefix white-text"/> Email</label>
                            <div className="controls">
                                <input type="text"
                                       className="form-control"
                                       name="email"
                                       onChange={this.handleChange.bind(this)}
                                       value={values.email}
                                />
                            </div>
                        </DivInput>
                        <DivInput className="control-group">
                            <label className="control-label" htmlFor="password"><i className="fa fa-lock prefix grey-tex"/> Password</label>
                            <div className="controls">
                                <input type="password"
                                       name="password"
                                       className="form-control"
                                       onChange={this.handleChange.bind(this)}
                                />
                            </div>
                        </DivInput>
                        <div className="text-center py-4">
                            <button type="submit" className="btn btn-secondary">Sign in <i className="fa fa-paper-plane-o"/></button>
                        </div>
                    </form>
                </DivPanel>
            </Div>
        );
    }
}

export default SignIn;
