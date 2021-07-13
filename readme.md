# Wordpress Puligin Basic

Ini adalah sebuah plugin basic wordpress, disini akan dijelaskan bagaimana cara membuat sebuah plugin wordpress sederhana mulai dari a-z

## Update & Get Option

Di wordpress kita bisa menyimpan beberapa variabel yang bersifat dinamis dan tersimpan di database, jadi misalkan kita membuat form untuk menyimpan nomer hp, tapi data ini akan ditimpa apabila kita edit datanya. Kita bisa menggunakan update option seperti contoh berikut :
<blockquote> update_option('wa_nohp', $_POST['nohp']);</blockquote>

Nanti untuk bisa mendapatkan kembali value yang sudah kita simpan dari update option, kita bisa lakukan get option dengan perintah berikut :
<blockquote> get_option('wa_nohp'); </blockquote>