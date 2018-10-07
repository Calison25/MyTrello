import React, {Component} from 'react';
import Login from "../components/Login";

class Home extends Component {
    render() {
        return (
            <div>
                <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css" type="text/css"></link>
                <Login />
            </div>
        );
    }
}

export default Home;
