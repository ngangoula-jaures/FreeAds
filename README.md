<div align="center">
  <h1>🚀 FreeAds</h1>
  <p>Une plateforme complète, moderne et fluide d'annonces avec PHP / Laravel.</p>
</div>

---

## 📖 À propos du projet
**FreeAds** est un projet Etudiants réalisé à la **Coding Academy** (Epitech Promo 2026). L’objectif principal est de concevoir un système de petites annonces robuste, sécurisé et agréable à utiliser, de la publication de produit jusqu'à la gestion des administrateurs.

Grâce à notre refonte d'interface dynamique et notre architecture solide, nous avons produit une plateforme e-commerce Premium.

## 🛠️ Fonctionnalités Principales

### 🔒 Inscription Sécurisée (Mailing System)
Pour s'inscrire, Nous utilisons "l'Email-First Registration" un système d'authentification moderne où l'utilisateur entre son email pour une première vérification, par la suite un lien unique sécurisé lui est envoyé par email afin de finaliser la création de son profil et de valider définitivement son compte.
*[![Whats-App-Image-2026-03-20-at-23-52-58.jpg](https://i.postimg.cc/mgwFsHpD/Whats-App-Image-2026-03-20-at-23-52-58.jpg)](https://postimg.cc/xXXdGc2D)*

### 📦 Système d'Annonces Complet
Une fois connecté, l'utilisateur a le pouvoir de publier des annonces très détaillées :
* Titre et description de l'article.
* **Prix en FCFA** (idéal pour le marché local).
* Choix dynamique des catégories et de la localisation (Abidjan, etc.).
* État du produit : *Nouveau, Bon état, Usagé*.
* Upload multiple de photos d'illustration.
*[![Whats-App-Image-2026-03-20-at-23-55-14.jpg](https://i.postimg.cc/zBLLKPzp/Whats-App-Image-2026-03-20-at-23-55-14.jpg)](https://postimg.cc/0Ms2qnJJ)*

### 🔍 Recherche & Filtres Multi-critères
Trouver un produit est instantané sur FreeAds :
* Barre de recherche par mot-clé (Titre et description).
* Liste déroulante des catégories et des villes.
* Filtrage strict par prix maximum.
*[![Whats-App-Image-2026-03-20-at-23-56-37.jpg](https://i.postimg.cc/NGH90VCP/Whats-App-Image-2026-03-20-at-23-56-37.jpg)](https://postimg.cc/pyPXG0HD)*

### 📱 Dashboards Dédiés
#### Espace Utilisateur
Un espace privé, esthétique et clair pour que l'utilisateur, depuis son Dashboard, gère son avatar de profil, modifie et supprime ses propres annonces en toute liberté.
*[![Whats-App-Image-2026-03-20-at-23-58-56.jpg](https://i.postimg.cc/VkYdDNsC/Whats-App-Image-2026-03-20-at-23-58-56.jpg)](https://postimg.cc/xc4fdnzf)*

#### Espace Administrateur (Modérateur)
Panel de contrôle renforcé pour surveiller le bon fonctionnement du site :
* Statistiques en temps réels (Nombre d'annonces, etc.).
* Outils complets de modération : CRUD complet sur les catégories.
* Gestion du site : Édition/suppression d'annonces et bannissement/gestion de profils d'utilisateurs.
*[![Whats-App-Image-2026-03-21-at-00-00-55.jpg](https://i.postimg.cc/XJyJpGLw/Whats-App-Image-2026-03-21-at-00-00-55.jpg)](https://postimg.cc/qh40F79R)*

## ⚙️ Côté Technique

* **Framework Backend** : Laravel (PHP 8.x)
* **Architecture** : MVC (Model-View-Controller)
* **Frontend** : Blade Templating + **Bootstrap 5** (Design System Custom : Premium, shadows, rounded corners, transitions, responsive design).
* **Sécurité** : Validation drastique des formulaires, Middlewares d'authentification (`auth`, `admin`), Protection CSRF globale, hashage des mots de passe.
* **Traitement d'Erreurs** : En cas d'anomalie critique ou échec (pépin technique, scripts non valides), le programme est conditionné/configuré pour intercepter et renvoyer le code d'erreur `84` !

## 👥 Auteurs du Projet

Ce projet a été réalisé en groupe par :
*   **JAURES NGANGOULA**
*   **ANNE KOUAKOU**
*   **KADY TRAORE**

---

## 📥 Installation Rapide

Si vous souhaitez exécuter le projet en local sur votre environnement de développement : 

1. **Cloner le projet**
   ```bash
   git clone <url_de_ce_repo>
   cd freeads
   ```

2. **Installer les dépendances PHP & JS**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Environnement & BDD**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *N'oubliez pas de configurer vos accès à votre Base de données MySQL et SMTP dans le fichier `.env`.*

4. **Migrations et lancement**
   ```bash
   php artisan migrate
   php artisan serve
   ```
   > Accédez ensuite à `http://127.0.0.1:8000` sur votre navigateur.

---
*Réalisé avec ❤️ par la Team TNK-FreeAds.*
