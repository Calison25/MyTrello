import React, {Component} from 'react';
import Login from "../components/Form/Login";
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

class Home extends Component {
    render() {
        return (
            <div className="container">
                <ToastContainer
                    position="top-center"
                    autoClose={5000}
                    closeOnClick={true}
                    draggable
                    pauseOnHover
                />
                <Login />
            </div>
        );
    }
}

export default Home;
