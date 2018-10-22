import React, {Component} from 'react';
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import Login from "./Login";

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
