import React, { Component } from 'react';

let urlshow = "http://localhost:1000/trello/show-user";
let formData = new FormData();

formData.append('username', 'calison25');

const getUserData = () => fetch(urlshow, {
    method: "POST",
    body: formData
})
    .then(response => response.json())
    .then(result => result.user)
    .catch(error => console.log(error));

const getCredentialData = () => fetch(urlshow, {
    method: "POST",
    body: formData
})
    .then(response => response.json())
    .then(result => result.user.credential)
    .catch(error => console.log(error));

class ShowUser extends Component {
    state = {
        user:'',
        credential: ''
    };

    componentDidMount = () => {
        getUserData().then(user => this.setState({user}))
        getCredentialData().then(credential => this.setState({credential}))
    };

    render() {
        const {user} = this.state;
        const {credential} = this.state;
        return(
            <div className='user'>
                <div className='name'>
                    Nome: {user.name}
                </div>
                <div className='username'>
                    Username: {credential.username}
                </div>
                <div className='email'>
                    Email: {credential.email}
                </div>
            </div>
        );
    }
}

export default ShowUser;