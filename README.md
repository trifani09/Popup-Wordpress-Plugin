# Popup-Wordpress-Plugin

Plugin ini adalah sebuah ekstensi untuk WordPress yang memungkinkan pengguna menampilkan pop-up berdasarkan halaman yang sedang dikunjungi. Plugin ini dikembangkan menggunakan WP Scaffold Plugin sebagai fondasi dan menerapkan Object-Oriented Programming (OOP) untuk memastikan kode yang terstruktur dan mudah dikelola.

Fitur
- Menggunakan OOP dengan PHP Namespace, Trait, dan Interface untuk struktur kode yang optimal.
- Menerapkan Singleton Pattern untuk memastikan hanya ada satu instance dari kelas utama.
- Custom Post Type (CPT) & Custom Fields untuk menyimpan data pop-up tanpa bantuan plugin tambahan.
- Menggunakan WordPress REST API untuk menampilkan pop-up dengan endpoint /wp-json/artistudio/v1/popup.
- Menggunakan SASS untuk styling yang lebih modular dan efisien.
- Frontend menggunakan Javascript (vanila) untuk menampilkan pop-up secara dinamis.
- Keamanan API hanya dapat diakses oleh pengguna yang sudah login.

Instalasi
1. Clone Repository
    git clone https://github.com/trifani09/Popup-Wordpress-Plugin.git
2. Create db_popup_plugin
3. Run on terminal php -S localhost:port or http://localhost/popup-plugin/
4. Run for admin wordpress 
    link : http://localhost/popup-plugin/wp-admin/
    username : admin
    password : PopupPlugin09
5. 