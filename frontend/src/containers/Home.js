import React, {Component} from 'react';
import { BrowserRouter as Router, Route, Switch, Link } from "react-router-dom";
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import Subscribe from "../components/Access/Form/Subscribe";
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
                <Router>
                    <div>
                        <Switch>
                            <Route exact path="/" component={Login}/>
                            <Route exact path="/subscribe" render={() => <Subscribe/>}/>
                        </Switch>
                        <p>New user? <Link to="/subscribe"><span>create new account</span></Link></p>
                    </div>
                </Router>
            </div>
        );
    }
}

export default Home;
