<?php
return [
          //缓存
        'cache'                   => [
                                      'account_change_type' => [
                                                                'key'         => 'account_change_type',
                                                                'expire_time' => 0,
                                                                'name'        => '帐变类型缓存',
                                                                'tags'        => 'account',
                                                               ],
                                      'static_jsons_common' => [
                                                                'key'         => 'static_jsons_common',
                                                                'expire_time' => 0,// unit in second  0 mean forever
                                                                'name'        => '静态json共用标记缓存',
                                                                'tags'        => 'static_jsons',
                                                               ],
                                     ],
           // Front-end user ID Redis key.
        'frontend_user_unique_id' => 'register_user_id',
       ];
