# Welcome to the technical test for Deliberry

## Install the project

1. Clone the project and go into the root code:

    ```
    ~$ git clone https://github.com/pcabreus/technical_test-Deliberry
    ~$ cd technical_test-Deliberry
    ```
   
2. Run the container and go into the container:

   ```
   ~$ docker-compose up -d
   ~$ docker exec -it deliberry_php bash
   ```
   
3. Install dependencies and configurations:
    
   ```
   :/usr/src/app# symfony composer install
   :/usr/src/app# symfony console doc:migration:migrate
   ```

## Working with the api

API: you can use the swagger docs on deliberry.localhost/api/docs

Init the project with dummy data running:
 
    ```
    :/usr/src/app# symfony console app:init
    ```

## Tests

You can run `./vendor/bin/simple-phpunit` inside of the container in order to run the test
