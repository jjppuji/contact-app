<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function() {
    return "<h1> Daftar Kontak</h1>";
});
Route::get('/contacts/create', function()  {
    return "<h1>Tambah Kontak Baru</h1>";
});
Route::get('/contacts/{id}', function($id) {
    return "Ini Kontak ke- ". $id;
});
Route::get('/companies/{name?}', function($name=null) {
    if($name) {
        return "Nama Perusahaan: " . $name;
    } else {
        return "Nama Perusahaan Kosong";
    }
});
Route::get('/contacts/{id}', function($id) {
    return "Ini Kontak ke-" . $id;
})->where('id', '[0-9]+');
Route::get('/companies/{name?}', function($name=null) {
    if($name) {
        return "Nama Perusahaan: " . $name;
    } else {
        return "Nama Perusahaan Kosong";
    }
})->where('name, [a-zA-Z]+');
Route::get('/contacts/{id}', function($id) {
    return "Ini Kontak ke-" . $id;
})->whereNumber('id');
Route::get('/companies/{name?}', function($name=null) {
    if($name) {
        return "Nama Perusahaan: " . $name;
    } else {
        return "Nama Perusahaan Kosong";
    }
})->whereAlphaNumeric('name');
Route::get('/', function () {
    $html = "
    <h1>Contact App</h1>
    <div>
         <a href='/contacts'>All contacts</>
         <a href='/contacts/create'>Add contacts</>
         <a href='/contact/1'>Show contacts</>
    </div>
    ";
    return $html;
    // return view('welcome');
});
Route::get('/contact', function() {
    return "<h1>Daftar Kontak</h1>";
});
Route::get('/contact', function() {
    return "<h1>Daftar Kontak</h1>";
})->name('contact.index');
Route::get('/contacts/create', function() {
    return "<h1>Tambah Kontak Baru</h1>";
})->name('contacts.create');
Route::get('/contacts/{id}', function($id) {
    return "Ini Kontak ke-" . $id;
})->whereNumber('id')->name('contacts.show');
Route::get('/', function () {
    $html = "
    <h1>Contact App</h1>
    <div>
         <a href='" . route('contacts.index') . "'>All contacts</>
         <a href='" . route('contacts.create') . "'>add contacts</>
         <a href='" . route('contacts.show', 1) . "'>Show contacts</>
    </div>
    ";
    return $html;
    // return view('welcome');
});
Route::get('/contacts', function() {
    return "<h1>Daftar Kontak</h1";
})->name('contacts.index');
Route::get('/admin/contacts', function() {
    return "<h1>Daftar Kontak</h1>";
 })->name('contacts.index');
 
 Route::get('/admin/contacts/create', function() {
    return "<h1>Tambah Kontak Baru</h1>";
 })->name('contacts.create');
 Route::get('/admin/contacts/{id}', function($id) {
    return "Ini Kontak ke-" . $id;
 })->whereNumber('id')->name('contacts.show');
 
 Route::get('/admin/companies/{name?}', function($name=null) {
    if($name) {
        return "Nama Perusahaan: " . $name;
    } else {
        return "Nama Perusahaan Kosong";
    }
 })->whereAlphaNumeric('name');
 Route::prefix('admin')->group(function() {
    Route::get('/contacts', function() {
        return "<h1>Daftar Kontak</h1>";
    })->name('contacts.index');
    Route::get('/contacts/create', function() {
        return "<h1>Tambah Kontak Baru</h1>";
    })->name('contacts.create');
    Route::get('/contacts/{id}', function($id) {
        return "Ini Kontak ke-" . $id;
    })->whereNumber('id')->name('contacts.show');
    Route::get('/companies/{name?}', function($name=null) {
        if($name) {
            return "Nama Perusahaan: " . $name;
        } else {
            return "Nama Perusahaan Kosong";
        }
    })->whereAlphaNumeric('name');
 });
 Route::get('/', function () {
    $html = "
    <h1>Contact App</h1>
    <div>
        <a href='" . route('admin.contacts.index') . "'>All contacts</>
        <a href='" . route('admin.contacts.create') . "'>Add contacts</>
        <a href='" . route('admin.contacts.show', 1) . "'>Show contacts</>
    </div>
    ";
    return $html;
    // return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/contacts', function() {
        return "<h1>Daftar Kontak</h1>";
    })->name('contacts.index');
    
    Route::get('/contacts/create', function() {
        return "<h1>Tambah Kontak Baru</h1>";
    })->name('contacts.create');
    
    Route::get('/contacts/{id}', function($id) {
        return "Ini Kontak ke-" . $id;
    })->whereNumber('id')->name('contacts.show');
    
    Route::get('/companies/{name?}', function($name=null) {
        if($name) {
            return "Nama Perusahaan: " . $name;
        } else {
            return "Nama Perusahaan Kosong";
        }
    })->whereAlphaNumeric('name')->name('companies');
});
Route::fallback(function() {
    return "<h1>Maaf, halaman yang anda tuju tidak ada</h1>";
});
