<?php


Route::set('index.php', function(){
    Home::CreateView('home');
});

Route::set('home', function(){
    Home::CreateView('home');
});

Route::set('contact-us', function(){
    Contact_us::CreateView('contact-us');    
});

Route::set('signup', function(){
    Users::CreateView('signup');
});

Route::set('profile' , function(){
    Users::CreateView('profile');
});

?>