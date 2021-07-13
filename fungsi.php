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
    if ($_POST['nohp'] != '') {
        update_option('wa_nohp', $_POST['nohp']);
        update_option('wa_pesan', $_POST['pesan']);
        update_option('wa_text', $_POST['text']);
        echo 'Data berhasil di Update';
    }
    
    echo '<h2>Pengaturan Data Whatsapp</h2>
    <p>Silahkan mengisi informasi dibawah ini untuk melakukan costume WA Apps</p>
    <form action="" method="post">
    <table border=0>
    <tr>
        <td>Nomor Whatsapp  : </td>
        <td><input type="text" name="nohp" value="'.get_option('wa_nohp').'"/></td>
    </tr><tr>
        <td>Pesan Default   : </td>
        <td><input type="text" name="pesan" value="'.get_option('wa_pesan').'"/></td>
    </tr><tr>
        <td>Text            : </td>
        <td><input type="text" name="text" value="'.get_option('wa_text').'"/></td>
    </tr><tr>
        <td><input type="submit" value="Update"/></td>
        <td></td>
    </tr>
    </table>
    </form>
    ';
}

add_action('admin_menu','testmenuadmin'); //Memasukan fungsi yang sudah dibuat ke wordpress

//Membuat Shortcode di WP
function fungsi_iklan () {
    return 'Ini adalah shortcode pertama buatan tresna'; //Ini adalah text yang nanti akan muncul (pake echo juga bisa)
}
add_shortcode('iklan','fungsi_iklan'); //Memasukan fungsi shortcode ke wordpress dengan code 'iklan'

function fungsi_whatsapp ($atts) {
    $nohp = get_option('wa_nohp');
    $pesan = get_option('wa_pesan');
    $text = get_option('wa_text');
    $var = shortcode_atts(
        array(
            'nohp' => $nohp,
            'pesan' => $pesan,
            'text' => $text
        ),$atts 
    );

    return '<a href="https://wa.me/'.$var['nohp'].'?text='.urlencode($var['pesan']).'"target="_blank">'.$var['text'].'</a>';
}

add_shortcode('whatsappcode','fungsi_whatsapp');
?>