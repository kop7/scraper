# Scraper

### Install Docker and Docker-compose

[Install Docker](https://docs.docker.com/v17.09/engine/installation/)

##### Check docker version:

    docker -v

##### Check docker-compose version

    docker-compose -v

### How to setup local

        git clone https://github.com/kop7/scraper.git [project-name] 
        cd [project-name]
        cp .env.example .env   
        docker-compose -f docker-compose.yml up --build

##### First run app:

- run composer `docker-compose exec php composer install`
- run migrations `docker-compose exec php php bin/console doctrine:migrations:migrate`

### How does it work

in terminal run:

```sh
    curl --location --request GET 'localhost/api/v1/search/github/php'
```
- list providers : github, twitter

example:
```
GET localhost/api/v1/search/<provider>/<term>
Body response:
{
    term: <term> : string
    score: <score> : float
    meta: {
        id: <id> : int,
        "name": <name> : string,
        "countAll": <countAll>: int,
        "countNegative": <countNegative>: int,
        "countPositive": <countPositive>: int,
        "created": <created>: int,
        "provider": <provider>: int
    }
}
```

#### How to run test

    docker-compose exec php composer test
        
