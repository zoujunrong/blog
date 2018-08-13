<?php

return [

    /*
    |--------------------------------------------------------------------------
    | folders 分表逻辑: 按用户量分表
    |--------------------------------------------------------------------------
    | 5W个用户一个表
    | 每个用户平均100个文件夹算 
    |
    */

    'bookmark_max_user' => 10000,

    /*
    |--------------------------------------------------------------------------
    | notebook 分表逻辑: 按用户量分表
    |--------------------------------------------------------------------------
    | 5W个用户一个表
    | 每个用户平均100个笔记本算 
    |
    */

    
    'notebook_max_user' => 100000,

    /*
    |--------------------------------------------------------------------------
    | notebook 分表逻辑: 按笔记本量分表
    |--------------------------------------------------------------------------
    | 5W个笔记本
    | 每个笔记本平均100个文件算 
    |
    */

    'notebook_file_max_notebook' => 50000,

    

    /*
    |--------------------------------------------------------------------------
    | folders 分表逻辑: 按用户量分表
    |--------------------------------------------------------------------------
    | 5W个用户一个表
    | 每个用户平均100个文件夹算 
    |
    */

    'folder_max_user' => 50000,

    /*
    |--------------------------------------------------------------------------
    | folder_map_files 分表逻辑：按文件夹量分表
    |--------------------------------------------------------------------------
    | 5W个文件夹一个表
    | 每个文件夹平均100个文件算 
    |
    */

    'folder_map_files_max_folder' => 50000,

    /*
    |--------------------------------------------------------------------------
    | files 分表逻辑：按文件本身数量分表
    |--------------------------------------------------------------------------
    | 5W个文件夹一个表
    | 每个文件夹平均100个文件夹算 
    |
    */

    'file_max' => 5000000,

    /*
    |--------------------------------------------------------------------------
    | subscribes 分表逻辑：按照用户分表
    |--------------------------------------------------------------------------
    | 10W个用户一张表
    | 每个用户平均订阅100个文件夹 
    |  
    */

    'subscribe_max_user' => 50000,

    /*
    |--------------------------------------------------------------------------
    | tag_maps 分表逻辑：按照对象（文件，文件夹）分表
    |--------------------------------------------------------------------------
    | 50W个对象一张表
    | 每个对象平均5个标签 
    |
    */

    'tag_map_max_obj' => 500000,

    /*
    |--------------------------------------------------------------------------
    | reviews 分表逻辑：按照对象（文件，文件夹）分表
    |--------------------------------------------------------------------------
    | 5W个对象一张表
    | 每个对象平均100条评论 
    |
    */

    'review_max_obj' => 50000,
];
