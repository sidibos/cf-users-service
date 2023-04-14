# CF Users Service
This service provides users CRUD

## Requirements
You will need to install [Docker](https://www.docker.com/products/docker-desktop/) to run this application using containers.

## Setup
First clone this repos, then from a terminal go to the project directory by running the following command
```shell
$ cd cf-users-service
```

Copy `env` to `.env`

```shell
$ cp env .env
```

Providing Docker is properly installed on your terminal, run the following command

```shell
$ docker-compose up -d
```
This will setup the application and mysql serivice for you.

Then run the migration script to create user table, with the following command

```shell
$ docker exec -it cf-users-serivice-web php spark migrate /bin/bash
```

## Usage
Navigate to this url [http://localhost:8080/](http://localhost:8080/)

Then you can start interacting with the system by creating Users.


## Suggestion
We could impolement a change-password functionality for logged in Users, as for security reason, I didn't include the password field in the User's update UI.
