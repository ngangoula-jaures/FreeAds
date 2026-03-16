import './bootstrap'; // Laravel setup

// 1. On importe jQuery et on le rend GLOBAL tout de suite
import $ from 'jquery';
window.$ = window.jQuery = $;

// 2. On importe Popper (souvent requis par Bootstrap 4)
// Si tu l'as installé via npm, fais juste : import 'popper.js';
import './popper.min.js'; 

// 3. On importe le reste dans l'ordre de dépendance
import './bootstrap.min.js'; 
import './plugins.js'; 
import './active.js'; 

// SURTOUT PAS : d'import de jquery-2.2.4.min.js ici si tu l'as déjà fait en haut !

// import './bootstrap';
// import $ from 'jquery';
// window.$ = window.jQuery = $;
// import './popper.min.js';
// import './bootstrap.min.js';
// import './plugins.js';
// import './active.js';
// import './jquery/jquery-2.2.4.min.js';

