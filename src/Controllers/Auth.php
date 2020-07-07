<?php
/**
 * =============================================================================================
 *  Project: sssm-auth
 *  File: Auth.php
 *  Date: 2020/06/17 15:10
 *  Author: Shoji Ogura <kohenji@sarahsytems.com>
 *  Copyright (c) 2020. Shoji Ogura
 *  This software is released under the MIT License, see LICENSE.txt.
 * =============================================================================================
 */
/** @noinspection PhpUnhandledExceptionInspection */

namespace Sssm\Auth\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use Exception;
use Sssm\Auth\Models\User;
use CodeIgniter\Router\Exceptions\RedirectException;
use Sssm\Base\Controllers\UserBaseController;

class Auth extends UserBaseController{
    
    public function index(){
        try{
            $this->_check_cond();
        }catch( RedirectException $e ){
            throw $e;
        }
        $this->view( __METHOD__ );
    }
    
    /**
     * @return RedirectResponse|void
     * @throws Exception
     */
    public function login(){
        try{
            $this->_check_cond();
            $user = new User();
            $user->login_id = $_POST['login_id'] ?? '';
            $user->login_pw = $_POST['login_pw'] ?? '';
            
            $user->userLogin();
        }catch( Exception $e ){
            if( $e->getCode() > 900000 ){
                $this->systemErrorMessage = $e->getMessage();
                return $this->view( 'Auth::index' );
            }
            throw $e;
        }
        return redirect()->route( '/' );
    }
    
    /**
     * @return RedirectResponse
     * @throws Exception
     */
    public function logout(){
        try{
            $this->user->userLogout();
        }catch( Exception $e ){
            throw $e;
        }
    
        return redirect()->route( '/' );
    }
    
    
    /**
     * @throws RedirectException
     */
    private function _check_cond(){
        if( isset( $_SESSION[$this->sssm->systemName]['User']) ){
            if( $_SESSION[$this->sssm->systemName]['User']['redirect_to'] != '' ){
                throw new RedirectException( $_SESSION[$this->sssm->systemName]['User']['redirect_to'] );
            }else{
                throw new RedirectException( '/' );
            }
        }
    }
}