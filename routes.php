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

?>