pipeline {
  agent any

  environment {
    IMAGE_NAME = "php-app-ultra"
    CONTAINER_NAME = "php-container"
    APP_DIR = "/var/lib/jenkins/workspace/BITCOT-TASK"
  }

  stages {
    stage('Checkout (if using SCM)') {
      steps {
        // If you use SCM, enable this:
        // git branch: 'main', url: 'https://github.com/arpitt29/BITCOT-TASK.git'
        echo "Using files from workspace"
      }
    }

    stage('Build') {
      steps {
        dir("${APP_DIR}") {
          sh "docker build -t ${IMAGE_NAME} ."
        }
      }
    }

    stage('Stop old') {
      steps {
        sh '''
          docker ps -q --filter "name=${CONTAINER_NAME}" | grep -q . && docker stop ${CONTAINER_NAME} && docker rm ${CONTAINER_NAME} || true
        '''
      }
    }

    stage('Run') {
      steps {
        sh "docker run -d -p 8000:8000 --name ${CONTAINER_NAME} ${IMAGE_NAME}"
      }
    }
  }
}
