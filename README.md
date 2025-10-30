# Fast Shipping - Web (Local XAMPP)
This package is preconfigured for local XAMPP (MySQL on localhost:3306, user root, no password).

## Quick setup
1. Copy the folder to XAMPP's htdocs (e.g. C:\xampp\htdocs\fast_shipping)
2. Import `sql/banco_fast_shipping.sql` into phpMyAdmin or run it via MySQL client.
3. Open browser: http://localhost/fast_shipping/index.html
4. Run once: http://localhost/fast_shipping/php/init_admin.php (this creates/updates admin user darcioramires@gmail.com with password 08242979)
5. Login at the index page with the admin credentials.
6. To enable maps, edit mapa.html and replace YOUR_MAPS_API_KEY with your API key or set it in .env and adjust the script include accordingly.

IMPORTANT: This is a demo template. Review security before deploying to production.
