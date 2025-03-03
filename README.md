
# Cushon Developer Scenario

A simple project for performing and investment use case, as for of the Cushon recruitment process.


## Installation

This project runs on PHP, using the popular Laravel framework With a MySQL backend.

The database schema can be found in the schema folder.

As this is a showcase project, some data entry will be required into the database, as populating all tales is out out scope.

## Features

- Simple login form
- Client account overview
- Ability to invest in funds


## Documentation

Upon launching the application a user will be asked to login before proceeding.
![login](https://github.com/gwalahad/cushontask/blob/main/docimages/login.pngraw=true)

After logging in, the user is redirected to their account overview page.
Here you can see the name of the user logged in, along with the uninvested balance, the type of ISA product they are viewing & any investments should they exist. You can also initiate a new investment from here.
![account](https://github.com/gwalahad/cushontask/blob/main/docimages/account1.png?raw=true)

The new investment screen lists the funds available to the user at this time.
They can specify how much to invest, with a minimum of £1 and a maximum of their unused balance displayed on the previous page.
![investment](https://github.com/gwalahad/cushontask/blob/main/docimages/invest.png?raw=true)

As can be seen, the new investment now shows within the account page.
![final account](https://github.com/gwalahad/cushontask/blob/main/docimages/account2.png?raw=true)


## Roadmap

- Front end improvements to the UI, possibly using a mdoern framework such as react.js or vue.js.

- Migrate to a more modern login system, although this would likely be handled as part of integration into a wider project.


## API Reference

#### Display account home page

```http
  GET /account
```

#### Display new investment page

```http
  POST /invest
```

#### Perform the investment transaction

```http
  POST /investtransact
```

#### Perform a login action

```http
  POST /login
```

