import axios from 'axios';
import { toast } from 'react-toastify';

export function signIn (data){
    axios.post('http://localhost:1000/trello/sign-in', { data })
        .then( response => {
             toast.success('Welcome to trello');
        }).catch(error => {
            toast.error(error.response.data.response);
        });
}

