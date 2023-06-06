# Free2move  Marvel-project

Small project as part of a technical test


## Installing project

- [ ] Clone the project 
    
```
    - ssh : git clone git@github.com:MokhTunisie/test-we-cine.git
    - https : git clone https://github.com/MokhTunisie/test-we-cine.git
```

- [ ] Configure env variables

    - Copy .env.template to .env and configure all variables


- [ ] Build containers and start the project
    - Via docker-compose :
        ```
        1: docker-compose up -d  
        2: docker-compose exec webserver composer install  
        ```
  
    - Via makefile :
      ```
      1: make start
      2: make composer-install
      ```
      
- [ ] Run the project
    - Add vhost to your "hosts" file
      ```
      add "127.0.0.1    test-we-cine.local" to :
       - /etc/hosts                                for Linux and Mac
       - C:\Windows\System32\drivers\etc\hosts     for Windows
      ```
    - Now you can test the project on your browser:
        - http://test-we-cine.local