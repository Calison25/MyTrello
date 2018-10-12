import React from 'react';
import { toast } from 'react-toastify';

const messageError = (
    <div>
       <strong>Ops!</strong> Todos os campos são obrigatórios.
    </div>
);


const LoginError = () => (
    toast.error(messageError)
);

export default LoginError;
