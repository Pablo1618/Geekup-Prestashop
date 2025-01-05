#!/bin/bash

DOCKERFILE_PATH="./configuration/Dockerfile"

IMAGE_NAME="mrktosiek/geekup-prestashop:1.0"

# Build the Docker image
(
    cd ..
    docker build -t $IMAGE_NAME -f $DOCKERFILE_PATH .
)
# Check if the build was successful
if [ $? -eq 0 ]; then
    echo "Docker image built successfully: $IMAGE_NAME"
else
    echo "Failed to build Docker image"
    exit 1
fi