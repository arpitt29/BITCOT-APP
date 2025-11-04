pipeline {
    agent any

    environment {
        IMAGE_NAME = "php-rds-demo"
        CONTAINER_NAME = "php-rds-app"
    }

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/arpitt29/BITCOT-APP.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                dir("${WORKSPACE}") {
                    sh '''
                    echo "Building Docker image..."
                    docker build -t $IMAGE_NAME .
                    '''
                }
            }
        }

        stage('Stop Old Container') {
            steps {
                sh '''
                if [ "$(docker ps -q -f name=$CONTAINER_NAME)" ]; then
                    echo "Stopping old container..."
                    docker stop $CONTAINER_NAME && docker rm $CONTAINER_NAME
                else
                    echo "No old container found."
                fi
                '''
            }
        }

        stage('Run New Container') {
            steps {
                sh '''
                echo "Running new container..."
                docker run -d -p 80:80 --name $CONTAINER_NAME $IMAGE_NAME
                '''
            }
        }
    }
}
