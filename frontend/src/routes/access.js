import axios from 'axios';

export function signIn (data){
    console.log(data);
    axios.post('http://localhost:1000/trello/sign-in', { data });
}

