const mix = require("laravel-mix");

/**--------------BOOTSTRAP------------------- */
mix.copy(
    [
        "./resources/bootstrap/js/bootstrap.bundle.min.js",
        "./resources/bootstrap/js/bootstrap.min.js",
    ],
    "public/bootstrap/js"
);
mix.copy(
    [
        "./resources/bootstrap/css/bootstrap.min.css",
        "./resources/bootstrap/css/bootstrap-grid.min.css",
        "./resources/bootstrap/css/bootstrap-reboot.min.css",
        "./resources/bootstrap-icons/font/bootstrap-icons.min.css",
    ],
    "public/bootstrap/css"
);
mix.copy(
    [
        "./resources/bootstrap-icons/font/fonts/bootstrap-icons.woff",
        "./resources/bootstrap-icons/font/fonts/bootstrap-icons.woff2",
    ],
    "public/bootstrap/css/fonts"
);

/**--------------APP CSS------------------- */
mix.combine(["./resources/css/app.css",], "public/css/app.min.css");

