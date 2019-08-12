<?php


Route::set('index.php', function(){
    Home_ctrl::CreateView('home');
});

Route::set('home', function(){
    Home_ctrl::CreateView('home');
});

Route::set('contact-us', function(){
    Contact_us_ctrl::CreateView('contact-us');    
});

Route::set('signup', function(){
    Users_ctrl::CreateView('signup');
});

Route::set('profile' , function(){
    Users_ctrl::CreateView('profile');
});

Route::set('dashboard' , function(){
    Users_ctrl::CreateView('dashboard');
});
?>