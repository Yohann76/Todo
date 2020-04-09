# TodoList - Yohann Durand 

Welcome to Symfony TodoList by Yohann Durand !

This project is a student project for openclassrooms,
This website is a open-source with a Symfony architecture.

[![Maintainability](https://api.codeclimate.com/v1/badges/f14ebc3c1687483cb36e/maintainability)](https://codeclimate.com/github/Yohann76/TodoList/maintainability)

## Technology 

This architecture proposes a reutilisable code and easy to maintain. It also provides good practice like MVC layout and object oriented

The TodoList application works with the symfony framework ( 5.0.5.

- Symfony
- Docker ( configure your environment)
- Ansible ( deploy with ansible folder)
- CircleCI ( CI/CD )

### Use this project 

-  clone this project on your environment 
-  configure your variable environment
-  run `composer install`
-  run `php bin/console d:d:c`
-  run `php bin/console d:m:m`
-  run `php bin/console d:f:l -n`

-  You can run this project with docker containers ( docker-compose included in this repository )

##### For Docker run :
run this project with docker containers (docker-compose included in this repository )
```
docker-compose up -d
```
## Deployment

##### For Ansible, create your ansible/hosts.ini and run:
```
ansible-playbook ansible/playbook.yml -i ansible/hosts.ini --ask-vault-pass
```

#### This website is available in "todolist.yohanndurand.fr"

## Testing 
For generate a coverage-html
```
php bin/phpunit --coverage-html public/data 
```
Testing Symfony Website
```
php bin/phpunit
```


if you want to modify this project,
the following links you may be useful

1. https://symfony.com/doc/current/index.html#gsc.tab=0
2. https://api-platform.com/
3. https://www.docker.com/
4. https://docs.ansible.com/ansible/latest/index.html
5. https://github.com/Yohann76/TodoList/blob/master/Documentation/Contributing.md

## Other information 

You can see performance in BlackFire : 
https://blackfire.io/profiles/3fcbf96e-442b-4003-9795-46f61c865335/graph

The graphical data model is accessible in the SQL file. You can also find the UML shema in the respective file
License : Free

Standard :
1. PSR2 ( https://www.php-fig.org/psr/psr-2/ )







