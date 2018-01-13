import React, { Component } from 'react';
import { Route, Redirect, Link, HashRouter as Router } from 'react-router-dom';

class Header extends Component {
    render() {
        return(
            <header>
                <Router>
                    <Link to='/user'>Mostrar Usuário</Link>
                </Router>
            </header>
        );
    }
}

export default Header;
