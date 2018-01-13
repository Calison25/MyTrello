import React, { Component } from 'react';
import {Link, HashRouter as Router } from 'react-router-dom';

class Header extends Component {
    render() {
        return(
            <Router>
                <Link to='/user'>Mostrar Usuário</Link>
            </Router>
        );
    }
}

export default Header;
