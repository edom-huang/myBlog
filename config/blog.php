<?php
/**
 * Created by PhpStorm.
 * User: edom
 * Date: 15-12-13
 * Time: 下午7:54
 */

return [
    'name' => "Edom",
    'title' => "Edom`s Blog",
    'subtitle' => 'Edom_huang`s Blog',
    'description' => '学习用laravel开发一个简单到的博客',
    'author' => 'Edom_Huang',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 10,
    'rss_size' => 25,
    'uploads' => [
        'storage' => 'local',
        'webpath' => '/uploads/',
    ],
    'contact_email'=>env('MAIL_FROM'),
];
//
//return [
//    'title' => 'My Blog',
//    'posts_per_page' => 5,
//    'uploads' => [
//        'storage' => 'local',
//        'webpath' => '/uploads',
//    ],
//];