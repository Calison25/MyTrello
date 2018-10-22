import React, {Component} from 'react';
import styled from 'styled-components';
import '../../../style/login.css';


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
        // event.preventDefault();
        // const { email, password } = this.props;
        // if (email.length === 0 || password.length === 0){
        //     toast.error(errorMessage);
        //     return;
        // }
        //
        // const data = {
        //     email: email,
        //     password: password
        // };
        //
        // signIn(data);
    };


    render() {
        const { values } = this.state;
        return (
            <DivPanel className="btn panel-body">
                <form className="form-horizontal" onSubmit={this.handleSubmit}>
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
        );
    }
}

export default SignIn;
