
const express = require('express');
const request = require('request');
const session = require('express-session');

const app = express();
const port = 3000;

app.use(
    session({
        secret: 'miappsegura',
        resave: false,
        saveUninitialized: true
    })
);

// app.use(express.static("public"));

app.use(express.urlencoded({ extended: true }));
app.set('view engine', 'ejs');

let api = {
    // Esta key nos da acceso a toda la API.
    // ¡No compartas esta llave con nadie!
    key: "88665751-288d-4175-852f-6519d79fdf1f"
};

// Ruta principal
app.get('/', (req, res) => {
    req.session.destroy();
    res.render('index');
});

// Ruta de bienvenida
app.get('/welcome', (req, res) => {
    if (req.session.username) {
        res.render('welcome', {
            username: req.session.username
        });
    } else {
        res.send('No está autorizado para ver este contenido.');
    }
});

// Procesamiento del inicio de sesión
app.post('/', (req, res) => {
    // Obtenemos el dominio en el que el usuario nos visita,
    // pues tenemos varios en el clúster.
    let host = req.get('host');

    // Verificamos que la API esté operativa.
    if (request(`http://${host}/codigos?api_key=${api.key}`)) {
        console.log('Funcionando');
    } else {
        console.log('No está funcionando la API');
        return res.render('index', {
            username: 'username'
        });
    }

    let username = req.body.username;
    let password = req.body.password;

    // Contactamos a nuestra API para obtener los usuarios.
    request(
        `http://${host}/codigos?api_key=${api.key}`,
        function (error, response, body) {
            let users = JSON.parse(body);

            // Encuentra el usuario que coincide con las credenciales.
            var user = users.find(
                u => u.name === username && u.code === password
            );

            if (user) {
                req.session.username = username;
                res.redirect('/welcome');
            } else {
                res.render('index', {
                    username: 'username'
                });
            }
        }
    );
});

// Ruta protegida con la API key
app.get('/codigos', (req, res) => {
    // Validamos que tenga permiso para leer estos datos.
    if (req.query.api_key == api.key) {
        res.json(codigos);
    } else {
        res.status(401).send('Sin autorización');
    }
});

// Iniciamos el servidor
app.listen(port, () => {
    console.log(
        `Aplicación de ejemplo escuchando en el puerto ${port}`
    );
});

// Lista de usuarios y códigos de acceso
var codigos = [
    {
        name: 'admin',
        code: "patito"
    },
    {
        name: 'user',
        code: "34fiufdeQ@5"
    },
    {
        name: 'guest',
        code: "uyy8787##$JK"
    }
];