
# WishBaby

When children are born, it is often customary to draw up a baby list with useful gifts to please the parents.
Shops often offer this as a service.
Friends and family of the brand new parents can then view and purchase items directly from the shop's baby list.
But, you are limited to that one shop, you cannot say that you want something from the competitor.

The purpose of the application is the following:
Parents need an easy tool to select items from various shops in one place and add them to their wish list.
That wishlist can then be sent to a list of friends and family members,
or can be accessed through a password-protected page.
Friends & family can see what is on the wishlist and purchase the item through the app.
A payment process follows with the possibility of adding a personal message.


## Author

- [@Andries-DB - Github](https://github.com/Andries-DB)
- [@andriesdebaere - Instagram](https://www.instagram.com/andriesdebaere/?hl=nl)


## Cloning

Install my-project with npm

```bash
  git clone https://github.com/gdmgent-webdev2/werkstuk---geboortelijst-Andries-DB
  cd Eindopdracht-laravel
```
    
## Installation

```bash
  0: Visual Studio Code + extensions
  1: Laravel (Laravel Breeze, ...)
  2: Composer
  3: Tailwind CSS
  4: MySQL
  5: Mollie
  5: DEPLOYMENT ...................
```
    
## Feature Overview

#### Prototype via Adobe XD
Before I started with coding the app, I've made an Adobe XD FIle. 
It is a visual way to design how the app needs to look.
You don't program anything, you just design the look of the page.
It's like making the User Experience

#### Database Scheme
After designing the look of the app, I started working on the database scheme. 
Of course, it wasn't quite right from the start, but as I got further into 
coding, the schema began to take shape.

The columns I made are 

```bash
  Users
  Categories
  Articles
  Wishlists
  Wishtlist_article
  Orders
```

#### The app

You can visit the site in 3 forms. Either you are invited and must enter a wish list with a certain code, where you can then buy articles. You can also create your own account. With this account you can create wishlists and add articles. This wishlist has a certain secret and unique code. With this unique code, visitors can enter your wishlist.

Admins can see all articles, wishlists and users.
## Deployment

I've deployed the site with digitalOcean:
The link is:
```bash
   https://wishbaby.wishbaby-andriesdb.be
```

![Logo](https://upload.wikimedia.org/wikipedia/commons/7/79/DigitalOcean_logo.png)

## User & Admin credentials

- ADMIN
```bash
  Email: admin@admin.com
  Passw: secret123
```
- GEBUIKER
```bash
  Email: mama@mama.com
  Passw: secret123
  Code Wishlist van mama (for visitor): 12345
```
