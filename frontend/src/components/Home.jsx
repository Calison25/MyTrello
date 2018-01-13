import React, { Component } from 'react';
import Header from './User/Header.jsx';
import ShowUserButton from './Button/User/ShowUserButton';

class Home extends Component {
    render() {
        return(
            <div>
                <Header/>
                <ShowUserButton/>
            </div>
        );
    }
}

export default Home;
