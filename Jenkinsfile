pipeline {
    agent any

    environment {
        IMAGE_NAME = "php-rds-demo"
    }

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/arpitt29/BITCOT-APP.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t $IMAGE_NAME .'
            }
        }

        stage('Stop Old Container') {
            steps {
                sh '''
                if [ "$(docker ps -q -f name=php-rds-app)" ]; then
                    docker stop php-rds-app && docker rm php-rds-app
                fi
                '''
            }
        }

        stage('Run New Container') {
            steps {
                sh 'docker run -d -p 80:80 --name php-rds-app $IMAGE_NAME'
            }
        }
    }
}
