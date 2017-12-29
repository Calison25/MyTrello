<?php
/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 09:59
 */

interface UserFactoryInterface
{

    /**
     * @param array $data
     * @return boolean
     */
    public function create(array $data);

    /**
     * @param string $username
     * @param array $data
     * @return boolean
     */
    public function edit($username, $data);

    /**
     * @param string $username
     * @return boolean
     */
    public function delete($username);
}