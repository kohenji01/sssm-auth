<?php
namespace Sssm\Auth\Models;

use Sssm\ModuleInstaller\Models\ModuleInstallerBase;

class Installer extends ModuleInstallerBase{
    
    protected $moduleFilePath = __FILE__;
    protected $moduleHasDB = true;
    
    protected $dbTables = [
        'users' => [
            'ENGINE'            => 'InnoDB' ,
            'DEFAULT CHARSET'   => 'utf8mb4' ,
            'COMMENT'           => 'ログインユーザ' ,
            'ROW_FORMAT'        => 'DYNAMIC' ,
        ],
    ];
    
    protected $dbSchema = [
        'users' => [
            'uid' => [
                'TYPE'              => 'INT' ,
                'CONSTRAINT'        => 11 ,
                'UNSIGNED'          => true ,
                'NULL'              => false ,
                'COMMENT'           => 'ユーザID' ,
                'AUTO_INCREMENT'    => true ,
            ],
            'login_id' => [
                'TYPE'              => 'VARCHAR' ,
                'CONSTRAINT'        => 255 ,
                'NULL'              => false ,
                'COMMENT'           => 'ログインID' ,
            ],
            'password_hash' => [
                'TYPE'              => 'VARCHAR' ,
                'CONSTRAINT'        => 255 ,
                'NULL'              => false ,
                'COMMENT'           => 'パスワードハッシュ' ,
            ],
            'allowed_ip_address' => [
                'TYPE'              => 'VARCHAR' ,
                'CONSTRAINT'        => 255 ,
                'DEFAULT'           => NULL ,
                'NULL'              => true ,
                'COMMENT'           => '許可IPアドレス' ,
            ],
            'last_logged_in_at' => [
                'TYPE'              => 'DATETIME' ,
                'DEFAULT'           => NULL ,
                'NULL'              => true ,
                'COMMENT'           => '最終ログイン日時' ,
            ],
            'enabled_at' => [
                'TYPE'              => 'DATETIME' ,
                'NULL'              => false ,
                'COMMENT'           => '利用開始日時' ,
            ],
            'expired_at' => [
                'TYPE'              => 'DATETIME' ,
                'NULL'              => false ,
                'COMMENT'           => '利用終了日時' ,
            ],
            'created_at' => [
                'TYPE'              => 'DATETIME' ,
                'NULL'              => false ,
                'COMMENT'           => '生成日時' ,
            ],
            'updated_at' => [
                'TYPE'              => 'DATETIME' ,
                'NULL'              => false ,
                'COMMENT'           => '更新日時' ,
            ],
            'deleted_at' => [
                'TYPE'              => 'DATETIME' ,
                'NULL'              => false ,
                'COMMENT'           => '削除日時' ,
            ],
            'active' => [
                'TYPE'              => 'TINYINT' ,
                'NULL'              => false ,
                'DEFAULT'           => 1 ,
                'COMMENT'           => '有効ユーザフラグ' ,
            ],
            'role' => [
                'TYPE'              => 'INT' ,
                'CONSTRAINT'        => 11 ,
                'NULL'              => false ,
                'DEFAULT'           => 0 ,
                'COMMENT'           => 'ユーザロール' ,
            ],
            'redirect_to' => [
                'TYPE'              => 'VARCHAR' ,
                'CONSTRAINT'        => 255 ,
                'NULL'              => true ,
                'DEFAULT'           => NULL ,
                'COMMENT'           => 'ログイン後リダイレクト先' ,
            ],
            'deleted' => [
                'TYPE'              => 'TINYINT' ,
                'NULL'              => false ,
                'DEFAULT'           => 0 ,
                'COMMENT'           => '削除フラグ' ,
            ],
        ],
    ];
    
    protected $dbPrimaryKey = [
        'users' => [
            'uid' ,
        ],
    ];
    
    protected $dbUniqueKey = [
        'users'=> [
            [ 'login_id' , 'deleted' ] ,
        ],
    ];
    
    protected $dbKey = [
        'active' ,
        'role' ,
        'enabled_at' ,
        'expired_at' ,
    ];
    
}