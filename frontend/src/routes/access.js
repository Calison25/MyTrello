import axios from 'axios';
import { toast } from 'react-toastify';


const signIn = async data => {
    try {
        await axios.post("http://localhost:1000/trello/sign-in", { data });
        toast.success("'Welcome to trello");
    } catch (error) {
        toast.error(error.response.data.response);
    }
};
export {signIn};

