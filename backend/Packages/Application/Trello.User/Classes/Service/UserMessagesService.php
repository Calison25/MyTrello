<?php

namespace Trello\User\Service;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 30/12/17
 * Time: 23:29
 */



class UserMessagesService
{

    const CREATE_USER = 'Usuário criado com sucesso';

    const UPDATED_USER = 'Usuário foi atualizado com sucesso';

    const USER_EMAIL_INVALID = 'Por favor, informe um endereço de email válido';

    const USER_REGISTERED = 'Nome de usuário já existe';

    const USERNAME_REQUIRED = 'Nome de usuário e email são obrigatórios';

    const USER_DELETED = 'Usuário removido com sucesso';

    const USER_NOTFOUND = 'Username não encontrado no sistema';
}