<?php
function testmenuadmin() {
    /*
    //Cara Pertama
    add_menu_page(
        'Setting Cert-test', //Tittle Web Plugin
        'Setting Cert-test', //Tittle Menu plugin
        'manage_options', //Kapabilitas menu, ini bisa diakses oleh siapa (disini diakses oleh admin)
        'certsetting', //Slug menu (url) dari apps di adminnya
        'fungsi_testmenu', //fungsi untuk menjalankan menu, jadi kalau menu di klik maka fungsi apa yang jalan
        'dashicons-welcome-learn-more' //Icon yang akan digunakan sc : https://developer.wordpress.org/resource/dashicons/#chart-line
    );
    add_submenu_page(
        'certsetting', //Judul Slug menu utama (url)
        'Sub Menu Setting', //Tittle Web Plugin
        'Sub Menu Setting', //Tittle Menu plugin
        'manage_options', //Kapabilitas menu, ini bisa diakses oleh siapa (disini diakses oleh admin)
        'subtesmenu', //url dari apps di adminnya
        'fungsi_submenu' //fungsi untuk menjalankan menu, jadi kalau menu di klik maka fungsi apa yang jalan
    );
    */
    
    //Cara lainnya jika menu utama hanya menjadi judul
    add_menu_page(
        'Setting Cert-test', //Tittle Web Plugin
        'Setting Cert-test', //Tittle Menu plugin
        '', //Kapabilitas menu, ini bisa diakses oleh siapa (disini diakses oleh admin)
        'certsetting', //Slug menu (url) dari apps di adminnya
        'fungsi_submenu', //fungsi diarahkan ke submenu
        'dashicons-welcome-learn-more' //Icon yang akan digunakan sc : https://developer.wordpress.org/resource/dashicons/#chart-line
    );
    add_submenu_page(
        'certsetting', //Judul Slug menu utama (url)
        'Sub Menu Setting', //Tittle Web Plugin
        'Sub Menu Setting', //Tittle Menu plugin
        'manage_options', //Kapabilitas menu, ini bisa diakses oleh siapa (disini diakses oleh admin)
        'subtesmenu', //url dari apps di adminnya
        'fungsi_submenu' //fungsi untuk menjalankan menu, jadi kalau menu di klik maka fungsi apa yang jalan
    );

    
}

function fungsi_testmenu(){
    echo '<h2>Setting Plugin Keren</h2>
    <p> Ini adalah fasilitas dari mengatur plugin</p>';
}

function fungsi_submenu(){
    echo '<h2>Setting Plugin sub menu</h2>
    <p> Ini adalah fasilitas dari sub menu</p>';
}

add_action('admin_menu','testmenuadmin'); //Memasukan fungsi yang sudah dibuat ke wordpress

//Membuat Shortcode di WP
function fungsi_iklan () {
    return 'Ini adalah shortcode pertama buatan tresna'; //Ini adalah text yang nanti akan muncul (pake echo juga bisa)
}
add_shortcode('iklan','fungsi_iklan'); //Memasukan fungsi shortcode ke wordpress dengan code 'iklan'

function fungsi_whatsapp ($atts) {
    $var = shortcode_atts(
        array(
            'nohp' => '6285722994333',
            'pesan' => 'Mohon info beli ikan cupang',
            'text' => 'Pesan disini'
        ),$atts 
    );

    return '<a href="https://wa.me/'.$var['nohp'].'?text='.urlencode($var['pesan']).'"target="_blank">'.$var['text'].'</a>';
}

add_shortcode('whatsappcode','fungsi_whatsapp');
?>