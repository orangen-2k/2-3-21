<?php

use Illuminate\Support\Facades\Route;

// admin va user
Route::get('admin','PassportController@admin')->name('admin')->middleware('checklogin');
Route::get('admin/home','PassportController@admin')->name('admin.home')->middleware('checklogin');

Route::get('login','PassportController@getlogin')->name('login');
Route::post('login','PassportController@postlogin')->name('login');
Route::get('logout','PassportController@logout')->name('logout');
Route::get('forgot','PassportController@getforgot')->name('forgot');
Route::post('forgot','PassportController@postforgot')->name('forgot');

Route::get('check-forgot','PassportController@getcheckforgot')->name('check.forgot');
Route::post('check-forgot','PassportController@postcheckforgot')->name('check.forgot');

Route::get('update-forgot','PassportController@getupdateforgot')->name('update.forgot');
Route::post('update-forgot','PassportController@postupdateforgot')->name('update.forgot');

Route::get('register','PassportController@getregister')->name('register');
Route::post('register','PassportController@postregister')->name('register');

Route::post('add.email.new','PassportController@postemailnew')->name('add.email.new');

Route::group(['prefix'=>'admin','middleware'=>'checklogin'],function (){

    Route::group(['prefix'=>'category'],function (){
        Route::get('show','CategoryController@getshow')->name('show.category');

        Route::get('add','CategoryController@getadd')->name('add.category');
        Route::post('add','CategoryController@postadd')->name('add.category');

        Route::get('update/{id}','CategoryController@getupdate')->name('update.category');
        Route::post('update/{id}','CategoryController@postupdate')->name('update.category');

        Route::get('delete/{id}','CategoryController@getdelete')->name('delete.category');
    });

    Route::group(['prefix'=>'type_of_news'],function (){
        Route::get('show','LoaitinController@getshow')->name('show.type_of_news');

        Route::get('add','LoaitinController@getadd')->name('add.type_of_news');
        Route::post('add','LoaitinController@postadd')->name('add.type_of_news');

        Route::get('update/{id}','LoaitinController@getupdate')->name('update.type_of_news');
        Route::post('update/{id}','LoaitinController@postupdate')->name('update.type_of_news');

        Route::get('delete/{id}','LoaitinController@getdelete')->name('delete.type_of_news');
    });

    Route::group(['prefix'=>'news'],function (){
        Route::get('show','TintucController@getshow')->name('show.news');

        Route::get('add','TintucController@getadd')->name('add.news');
        Route::post('add','TintucController@postadd')->name('add.news');

        Route::get('update/{id}','TintucController@getupdate')->name('update.news');
        Route::post('update/{id}','TintucController@postupdate')->name('update.news');

        Route::get('delete/{id}','TintucController@getdelete')->name('delete.news');
    });

    Route::group(['prefix'=>'comment'],function (){
        Route::get('delete/{id}/{idtintuc}','CommentController@getdelete')->name('delete.comment');
    });

    Route::group(['prefix'=>'/news/admin/ajax'],function (){
        Route::get('loaitin/{idtheloai}','AjaxController@getloaitin')->name('show.ajax');
    });

    Route::group(['prefix'=>'slide'],function (){
        Route::get('show','SlideController@getshow')->name('show.slide');

        Route::get('add','SlideController@getadd')->name('add.slide');
        Route::post('add','SlideController@postadd')->name('add.slide');

        Route::get('update/{id}','SlideController@getupdate')->name('update.slide');
        Route::post('update/{id}','SlideController@postupdate')->name('update.slide');

        Route::get('delete/{id}','SlideController@getdelete')->name('delete.slide');
    });

    Route::group(['prefix'=>'dangky'],function (){
        Route::get('show','UserUpdateController@showxacnhandangky')->name('show.dangky');

        Route::get('update/{id}','UserUpdateController@getxacnhandangky')->name('update.dangky');
        Route::post('update/{id}','UserUpdateController@postxacnhandangky')->name('update.dangky');

        Route::get('delete/{id}','UserUpdateController@deletexacnhandangky')->name('delete.dangky');
    });

    Route::group(['prefix'=>'user'],function (){
        Route::get('show','UserController@getshow')->name('show.user');

        Route::get('add','UserController@getadd')->name('add.user');
        Route::post('add','UserController@postadd')->name('add.user');

        Route::get('update/{id}','UserController@getupdate')->name('update.user');
        Route::post('update/{id}','UserController@postupdate')->name('update.user');

        Route::get('delete/{id}','UserController@getdelete')->name('delete.user');
    });

    Route::group(['prefix'=>'user-update'],function (){
        Route::get('information','UserUpdateController@getinformation')->name('user.update.information');
        Route::post('information','UserUpdateController@postinformation')->name('user.update.information');
        Route::get('password','UserUpdateController@getpassword')->name('user.update.password');
        Route::post('password','UserUpdateController@postpassword')->name('user.update.password');
        Route::get('image','UserUpdateController@getimage')->name('user.update.image');
        Route::post('image','UserUpdateController@postimage')->name('user.update.image');
    });


});

Route::get('','ShowwebsiteController@gethome')->name('home');
Route::get('user/home','ShowwebsiteController@gethome')->name('show.home');
Route::get('timkiem','ShowwebsiteController@gettimkiem')->name('timkiem.home');
Route::post('timkiem','ShowwebsiteController@gettimkiem')->name('timkiem.home');

Route::get('detail/home/{id}/{tinkhongdau}.html','ShowwebsiteController@getdetail')->name('detail.home');

Route::post('comment/home/{id}','CommentController@postcomment')->name('comment.home');
Route::get('userhome/home','UserhomeController@getuserhome')->name('user.home')->middleware('checklogin');
Route::post('userhome/home','UserhomeController@postuserhome')->name('user.home')->middleware('checklogin');

Route::get('loaitin/home/{id}/{tenkhongdau}.html','ShowwebsiteController@getloaitin')->name('loaitin.home');
Route::get('tinmoi/home','ShowwebsiteController@gettinmoi')->name('tinmoi.home');
Route::get('tinnong/home','ShowwebsiteController@gettinnong')->name('tinnong.home');
Route::get('dondangky/home','TaodonController@getdondangky')->name('dondangky.home')->middleware('checklogin');
Route::post('dondangky/home','TaodonController@postdondangky')->name('dondangky.home')->middleware('checklogin');
Route::get('xacnhandon/home','TaodonController@getxacnhandon')->name('xacnhandon.home')->middleware('checklogin');
Route::post('xacnhandon/home','TaodonController@postxacnhandon')->name('xacnhandon.home')->middleware('checklogin');

Route::get('update-password/home/{id}','UserhomeController@getchangepassport')->name('change.passport')->middleware('checklogin');
Route::post('update-password/home/{id}','UserhomeController@postchangepassport')->name('change.passport')->middleware('checklogin');
Route::get('update-information/home/{id}','UserhomeController@getchangeinfomation')->name('change.information')->middleware('checklogin');
Route::post('update-information/home/{id}','UserhomeController@postchangeinfomation')->name('change.information')->middleware('checklogin');

?>
